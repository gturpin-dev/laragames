<?php

declare(strict_types=1);

namespace App\Data\Casts;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Creation\CreationContext;

class TimestampToCarbonImmutableCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): mixed
    {
        try {
            return CarbonImmutable::createFromTimestamp( $value );
        } catch ( \Throwable $e ) {
            return null;
        }
    }
}
