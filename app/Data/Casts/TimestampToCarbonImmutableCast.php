<?php

declare(strict_types=1);

namespace App\Data\Casts;

use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Contracts\BaseData;
use Spatie\LaravelData\Casts\Cast;
use Carbon\CarbonImmutable;

class TimestampToCarbonImmutableCast implements Cast
{
    /**
     * @template TData of BaseData
     *
     * @param array<mixed> $properties
     * @param CreationContext<TData> $context
     */
    public function cast( DataProperty $property, mixed $value, array $properties, CreationContext $context ): ?CarbonImmutable
    {
        try {
            return CarbonImmutable::createFromTimestamp( $value );
        } catch ( \Throwable $e ) {
            return null;
        }
    }
}
