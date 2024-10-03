<?php

declare(strict_types=1);

namespace App\Http\Integrations\IGDB\Services;

use App\Enums\IGDBGameField;

/**
 * Transform typed params to a request body for the IGDB API.
 * The API use plain string body.
 * It separate params with semicolons.
 * It accepts lists of values separated by commas.
 */
final class RequestBodyMaker
{
    /**
     * The fields to be requested from the IGDB API.
     *
     * @var array<IGDBGameField>
     */
    protected array $fields = [];

    /**
     * The search term for the request.
     */
    protected string $search = '';

    /**
     * Make the request body based on the params set.
     *
     * @return string The plain string body for IGDB API
     */
    public function make(): string {
        $body = '';

        if ( ! empty( $this->fields ) ) {
            $fields  = array_map( fn( IGDBGameField $field ) => $field->value, $this->fields );
            $body   .= 'fields ' . implode( ',', $fields ) . ';';
        }

        if ( ! empty( $this->search ) ) {
            $body .= 'search "' . $this->search . '";';
        }

        return $body;
    }

    /**
     * Set the fields of the request
     *
     * @param array<IGDBGameField> $fields
     */
    public function fields( array $fields ): self {
        $this->fields = $fields;
        return $this;
    }

    /**
     * Set the search term for the request
     *
     * @param string $search The search term
     */
    public function search( string $search ): self {
        $this->search = $search;
        return $this;
    }
}
