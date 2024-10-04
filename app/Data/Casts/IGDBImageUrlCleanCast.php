<?php

declare(strict_types=1);

namespace App\Data\Casts;

use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Contracts\BaseData;
use Spatie\LaravelData\Casts\Cast;

class IGDBImageUrlCleanCast implements Cast
{
    /**
     * @template TData of BaseData
     *
     * @param array<mixed> $properties
     * @param CreationContext<TData> $context
     */
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
