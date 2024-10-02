<?php

namespace App\Http\Integrations\IGDB;

use App\Http\Integrations\IGDB\Requests\Auth\GetAccessTokenRequest;
use Illuminate\Support\Facades\Cache;
use Saloon\Contracts\Authenticator;
use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class IGDBConnector extends Connector
{
    use AcceptsJson;

    public function __construct(
        protected ?AccessTokenAuthenticator $access_token_authenticator = null
    ) {
        $this->access_token_authenticator ??= $this->getAccessTokenAuthenticator();
    }

    /**
     * The Base URL of the API.
     */
    public function resolveBaseUrl(): string
    {
        return 'https://api.igdb.com/v4';
    }

    protected function defaultAuth(): ?Authenticator
    {
        return new TokenAuthenticator( $this->access_token_authenticator->getAccessToken() );
    }

    /**
     * Generate an authenticator with OAuth config.
     * As this API does not use the Authorization Code Grant.
     *
     * @return AccessTokenAuthenticator
     */
    protected function generateAccessTokenAuthenticator(): AccessTokenAuthenticator {
        return (new GetAccessTokenRequest( $this->defaultOauthConfig() ))
            ->send()
            ->dtoOrFail();
    }

    /**
     * Retrieve the access token authenticator from the session.
     * If it does not exist Or it has expired, generate a new one and store it in the session.
     *
     * @return AccessTokenAuthenticator
     */
    protected function getAccessTokenAuthenticator(): AccessTokenAuthenticator {
        $authenticator = Cache::get( 'igdb_authenticator' );

        if ( ! is_null( $authenticator ) ) {
            $authenticator = AccessTokenAuthenticator::unserialize( $authenticator );
        }

        if ( is_null( $authenticator ) || ( $authenticator instanceof AccessTokenAuthenticator && $authenticator->hasExpired() ) ) {
            $authenticator = $this->generateAccessTokenAuthenticator();
            Cache::put( 'igdb_authenticator', $authenticator->serialize(), ttl: $authenticator->getExpiresAt() );
        }

        return $authenticator;
    }

    /**
     * The OAuth2 configuration
     */
    protected function defaultOauthConfig(): OAuthConfig
    {
        return OAuthConfig::make()
            ->setClientId( config( 'services.igdb.client_id' ) )
            ->setClientSecret( config( 'services.igdb.client_secret' ) )
            // ->setRedirectUri( config( 'services.igdb.redirect_uri' ) )
            ->setDefaultScopes( [] )
            // ->setAuthorizeEndpoint( '' )
            ->setTokenEndpoint( config( 'services.igdb.token_endpoint' ) );
    }
}
