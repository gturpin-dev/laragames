<?php

namespace App\Http\Integrations\IGDB\Requests\Auth;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\Response;
use Saloon\Http\SoloRequest;
use Saloon\Traits\Body\HasJsonBody;

class GetAccessTokenRequest extends SoloRequest implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        protected readonly OAuthConfig $oauth_config
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return $this->oauth_config->getTokenEndpoint();
    }

    /**
     * @return array<string, string>
     */
    protected function defaultBody(): array
    {
        return [
            'client_id'     => $this->oauth_config->getClientId(),
            'client_secret' => $this->oauth_config->getClientSecret(),
            'grant_type'    => 'client_credentials',
        ];
    }

    public function createDtoFromResponse( Response $response ): AccessTokenAuthenticator
    {
        $data = $response->json();

        return new AccessTokenAuthenticator(
            accessToken: data_get( $data, 'access_token' ),
            expiresAt  : now()->addSeconds( data_get( $data, 'expires_in', 0 ) )->toDateTimeImmutable()
        );
    }
}
