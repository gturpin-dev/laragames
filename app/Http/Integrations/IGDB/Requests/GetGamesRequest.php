<?php

namespace App\Http\Integrations\IGDB\Requests;

use Saloon\Traits\Body\HasStringBody;
use Saloon\Http\Response;
use Saloon\Http\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Contracts\Body\BodyRepository;
use App\Http\Integrations\IGDB\Services\RequestBodyMaker;
use App\Enums\IGDBGameField;
use App\Data\GameData;
use App\Collections\GameDataCollection;

class GetGamesRequest extends Request implements HasBody
{
    use HasStringBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    /**
     * @param array<IGDBGameField> $fields The fields to be returned from the request
     */
    public function __construct(
        protected readonly array $fields  = [],
        protected readonly string $search = '',
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/games';
    }

    protected function defaultBody(): ?string
    {
        $request_body_maker = new RequestBodyMaker();
        $request_body_maker->fields( $this->fields );
        $request_body_maker->search( $this->search );

        return $request_body_maker->make();
    }

    public function createDtoFromResponse(Response $response): GameDataCollection
    {
        return GameData::collect( $response->json() );
    }
}
