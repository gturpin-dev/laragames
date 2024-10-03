<?php

namespace App\Http\Integrations\IGDB\Requests;

use App\Enums\IGDBGameField;
use App\Http\Integrations\IGDB\Services\RequestBodyMaker;
use Saloon\Contracts\Body\BodyRepository;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasStringBody;

class GetGamesRequest extends Request implements HasBody
{
    use HasStringBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    /**
     * @param array<IGDBGameField> $fields
     */
    public function __construct(
        protected readonly array $fields = [],
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

        return $request_body_maker->make();
    }
}
