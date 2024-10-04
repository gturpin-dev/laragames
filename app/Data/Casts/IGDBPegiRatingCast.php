<?php

declare(strict_types=1);

namespace App\Data\Casts;

use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Contracts\BaseData;
use Spatie\LaravelData\Casts\Cast;
use App\Enums\IGDBPegiRating;

class IGDBPegiRatingCast implements Cast
{
    protected const int PEGI_ID = 2;

    /**
     * @template TData of BaseData
     *
     * @param array<array{category: int, rating: int}> $value The Represensation Value of IGDB API
     * @param array<mixed> $properties
     * @param CreationContext<TData> $context
     */
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): ?IGDBPegiRating
    {
        if ( ! is_array( $value ) ) {
            return null;
        }

        return collect( $value )
            ->filter( fn( array $item ) => $item['category'] === self::PEGI_ID )
            ->map( fn ( array $item ) => IGDBPegiRating::tryFrom( $item['rating'] ) )
            ->first();
    }
}
