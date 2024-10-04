<?php

declare(strict_types=1);

namespace App\Data\Casts;

use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class IGDBImageUrlCleanCast implements Cast
{
    public function cast( DataProperty $property, mixed $value, array $properties, CreationContext $context ): mixed
    {
        if ( ! is_string( $value ) ) {
            return null;
        }

        return str( $value )
            ->replace( 't_thumb', 't_720p' )
            ->prepend( 'https:' );
    }
}
