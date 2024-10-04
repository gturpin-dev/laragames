<?php

declare(strict_types=1);

namespace App\Data\Casts;

use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Contracts\BaseData;
use Spatie\LaravelData\Casts\Cast;

/**
 * Cast a raw array of IGDB alternative names to a list of names.
 * Exclude unneeded values like alternative name for other languages.
 * Include all alternative names that have no comment because they are the main names.
 */
class IGDBAlternativeNamesRawToListCast implements Cast
{
    protected const array TYPE_WHITELIST = [
        'Other',
        'Other Alias',
        'Acronym',
    ];

    /**
     * @template TData of BaseData
     *
     * @param array<array{name: string, comment?: string}> $value The Represensation Value of IGDB API
     * @param array<mixed> $properties
     * @param CreationContext<TData> $context
     */
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): mixed
    {
        if ( ! is_array( $value ) ) {
            return [];
        }

        return collect( $value )
            ->filter( fn ( array $alternative_names ) => ! isset( $alternative_names['comment'] ) || in_array( $alternative_names['comment'], self::TYPE_WHITELIST ) )
            ->map( fn ( array $alternative_names ) => $alternative_names['name'] )
            ->filter()
            ->unique()
            ->values()
            ->all();
    }
}
