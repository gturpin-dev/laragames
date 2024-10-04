<?php

namespace App\Data;

use App\Collections\GameDataCollection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\Computed;
use Carbon\CarbonImmutable;
use App\Enums\IGDBPegiRating;
use App\Enums\IGDBGameCategory;
use App\Data\Casts\TimestampToCarbonImmutableCast;
use App\Data\Casts\IGDBPegiRatingCast;
use App\Data\Casts\IGDBImageUrlCleanCast;
use App\Data\Casts\IGDBAlternativeNamesRawToListCast;
use App\Enums\IGDBGameField;

/**
 * @method static GameDataCollection collect(array $items)
 */
class GameData extends Data
{
    public function __construct(
        #[MapInputName(IGDBGameField::ID->value)]
        public readonly int $igdb_id,

        #[MapInputName(IGDBGameField::CHECKSUM->value)]
        public readonly string $uuid,

        public readonly string $name,

        /**
         * The alternatives names of the game.
         *
         * @var array<string>
         */
        #[WithCast(IGDBAlternativeNamesRawToListCast::class)]
        public readonly ?array $alternative_names,

        /**
         * The main cover url of the game.
         */
        #[MapInputName(IGDBGameField::COVER__URL->value)]
        #[WithCast(IGDBImageUrlCleanCast::class)]
        public readonly ?string $cover = null,

        /**
         * The game type, main game, dlc or other categories.
         */
        public readonly IGDBGameCategory $category = IGDBGameCategory::MAIN_GAME,

        /**
         * The other games in the same series or collection.
         *
         * @var array<int> other games ids
         */
        public readonly ?array $bundles = [],

        /**
         * Artworks of the game.
         *
         * @var array<int>
         */
        public readonly ?array $artworks = [], // @TODO maybe implements => need to call /artworks route and get the "url" of item ( maybe try to download images and save in storage | the url is protected by the same authentication as other API requests )

        /**
         * The PEGIs rating.
         *
         * @var array<int>
         */
        #[MapInputName('age_ratings')]
        #[WithCast(IGDBPegiRatingCast::class)]
        public readonly ?IGDBPegiRating $pegi_rating = null,

        #[MapInputName('total_rating')]
        public readonly ?float $rating = null,

        #[MapInputName('total_rating_count')]
        public readonly ?int $rating_count = null,

        #[WithCast(TimestampToCarbonImmutableCast::class)]
        public readonly ?CarbonImmutable $updated_at = null

        // @TODO things to maybe add :
        // collection
        // collections ( check what's those )
        // cover
        // created_at
        // dlcs
        // expanded_games
        // expansions
        // first_release_date
        // forks ?
        // franchise
        // game_engines
        // game_modes
        // genres
        // involved_companies
        // keywords
        // language_supports
        // multiplayer_modes
        // parent_game
        // platforms
        // player_perspectives ?
        // ports ?
        // release_dates
        // remakes
        // remasters
        // screenshots
        // similar_games
        // slug
        // standalone_expansion
        // status
        // storyline
        // summary
        // tags
        // themes
        // url
        // version_parent ?
        // version_title ?
        // videos
        // websites


        // @TODO split the DTOs for DLCs, Main Game etc
    ) {}


    public static function collectArray( array $items ): GameDataCollection {
        return new GameDataCollection( $items );
    }
}
