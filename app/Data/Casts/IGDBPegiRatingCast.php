<?php

declare(strict_types=1);

namespace App\Data\Casts;

use App\Enums\IGDBPegiRating;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Creation\CreationContext;

class IGDBPegiRatingCast implements Cast
{
    protected const int PEGI_ID = 2;

    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): mixed
    {
        if ( ! is_array( $value ) ) {
            return null;
        }

        return collect( $value )
            ->filter( fn( array $item ) => ($item['category'] ?? 0) === self::PEGI_ID )
            ->map( fn ( array $item ) => IGDBPegiRating::tryFrom( $item['rating'] ?? 0 ) )
            ->first();
    }
}
