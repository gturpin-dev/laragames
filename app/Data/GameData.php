<?php

namespace App\Data;

use App\Enums\IGDBGameCategory;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class GameData extends Data
{
    public function __construct(
        #[MapInputName('id')]
        public readonly int $igdb_id,
        public readonly string $name,

        // public readonly array<int> $alternative_names, // @TODO maybe implements => need to call /alternative_names route and get the "name" of item ( maybe get only the items where comment = "Other" )

        /**
         * Artworks of the game.
         *
         * @var array<int>
         */
        public readonly array $artworks = [], // @TODO maybe implements => need to call /artworks route and get the "url" of item ( maybe try to download images and save in storage | the url is protected by the same authentication as other API requests )

        /**
         * The other games in the same series or collection.
         *
         * @var array<int>
         */
        public readonly array $bundles = [],

        /**
         * The PEGIs rating.
         *
         * @var array<int>
         */
        public readonly array $pegi_ratings = [], // @TODO maybe implements => need to call /age_ratings route and get the "rating" of item

        public readonly float $external_rating = 0.0,
        public readonly int $external_rating_count = 0,

        /**
         * The game type, main game, dlc or other categories.
         */
        public readonly IGDBGameCategory $category = IGDBGameCategory::MAIN_GAME,

        // @TODO things to maybe add :
        // uuid
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
        // rating
        // rating_count
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
        // total_rating
        // total_rating_count ( replace the current external_rating_count )
        // updated_at
        // url
        // version_parent ?
        // version_title ?
        // videos
        // websites


        // @TODO split the DTOs for DLCs, Main Game etc
    ) {}
}
