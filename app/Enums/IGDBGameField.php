<?php

namespace App\Enums;

use ArchTech\Enums\InvokableCases;

/**
 * Represents the fields that can be requested from the IGDB API for a game.
 *
 * @see https://api-docs.igdb.com/?shell#game
 */
enum IGDBGameField: string
{
    use InvokableCases;

    case ALL                        = '*';                          // Should only be used alone and for debug purposes
    case ID                         = 'id';
    case AGE_RATINGS                = 'age_ratings';                // The PEGI rating
    case AGE_RATINGS__CATEGORY      = 'age_ratings.category';       // The PEGI rating name
    case AGE_RATINGS__RATING        = 'age_ratings.rating';         // The PEGI rating age
    case AGGREGATED_RATING          = 'aggregated_rating';          // Rating based on external critic scores
    case AGGREGATED_RATING_COUNT    = 'aggregated_rating_count';    // Number of external critic scores
    case ALTERNATIVE_NAMES          = 'alternative_names';          // Alternative names for this game
    case ALTERNATIVE_NAMES__NAME    = 'alternative_names.name';
    case ALTERNATIVE_NAMES__COMMENT = 'alternative_names.comment';
    case ARTWORKS                   = 'artworks';                   // Artworks of this game
    case BUNDLES                    = 'bundles';                    // The bundles this game is a part of
    case CATEGORY                   = 'category';                   // The category of this game
    case CHECKSUM                   = 'checksum';                   // Hash of the object
    case COLLECTION                 = 'collection';                 // [Deprecated - To be removed] The series the game belongs to
    case COLLECTIONS                = 'collections';                // The collections that this game is in.
    case COVER                      = 'cover';                      // The cover of this game
    case COVER__URL                 = 'cover.url';                  // The URL of the cover image
    case CREATED_AT                 = 'created_at';                 // Date this was initially added to the IGDB database
    case DLCS                       = 'dlcs';                       // DLCs for this game
    case EXPANDED_GAMES             = 'expanded_games';             // Expanded games of this game
    case EXPANSIONS                 = 'expansions';                 // Expansions of this game
    case EXTERNAL_GAMES             = 'external_games';             // External IDs this game has on other services
    case FIRST_RELEASE_DATE         = 'first_release_date';         // The first release date for this game
    case FOLLOWS                    = 'follows';                    // [Deprecated - To be removed] Number of people following a game
    case FORKS                      = 'forks';                      // Forks of this game
    case FRANCHISE                  = 'franchise';                  // The main franchise
    case FRANCHISES                 = 'franchises';                 // Other franchises the game belongs to
    case GAME_ENGINES               = 'game_engines';               // The game engine used in this game
    case GAME_LOCALIZATIONS         = 'game_localizations';         // Supported game localizations for this game. A region can have at most one game localization for a given game
    case GAME_MODES                 = 'game_modes';                 // Modes of gameplay
    case GENRES                     = 'genres';                     // Genres of the game
    case HYPES                      = 'hypes';                      // Number of follows a game gets before release
    case INVOLVED_COMPANIES         = 'involved_companies';         // Companies who developed this game
    case KEYWORDS                   = 'keywords';                   // Associated keywords
    case LANGUAGE_SUPPORTS          = 'language_supports';          // Supported Languages for this game
    case MULTIPLAYER_MODES          = 'multiplayer_modes';          // Multiplayer modes for this game
    case NAME                       = 'name';                       // Name of the game
    case PARENT_GAME                = 'parent_game';                // If a DLC, expansion or part of a bundle, this is the main game or bundle
    case PLATFORMS                  = 'platforms';                  // Platforms this game was released on
    case PLAYER_PERSPECTIVES        = 'player_perspectives';        // The main perspective of the player
    case PORTS                      = 'ports';                      // Ports of this game
    case RATING                     = 'rating';                     // Average IGDB user rating
    case RATING_COUNT               = 'rating_count';               // Total number of IGDB user ratings
    case RELEASE_DATES              = 'release_dates';              // Release dates of this game
    case REMAKES                    = 'remakes';                    // Remakes of this game
    case REMASTERS                  = 'remasters';                  // Remasters of this game
    case SCREENSHOTS                = 'screenshots';                // Screenshots of this game
    case SIMILAR_GAMES              = 'similar_games';              // Similar games
    case SLUG                       = 'slug';                       // A url-safe, unique, lower-case version of the name
    case STANDALONE_EXPANSIONS      = 'standalone_expansions';      // Standalone expansions of this game
    case STATUS                     = 'status';                     // The status of the games release
    case STORYLINE                  = 'storyline';                  // A short description of a games story
    case SUMMARY                    = 'summary';                    // A description of the game
    case TAGS                       = 'tags';                       // Related entities in the IGDB API
    case THEMES                     = 'themes';                     // Themes of the game
    case TOTAL_RATING               = 'total_rating';               // Average rating based on both IGDB user and external critic scores
    case TOTAL_RATING_COUNT         = 'total_rating_count';         // Total number of user and external critic scores
    case UPDATED_AT                 = 'updated_at';                 // The last date this entry was updated in the IGDB database
    case URL                        = 'url';                        // The website address (URL) of the item
    case VERSION_PARENT             = 'version_parent';             // If a version, this is the main game
    case VERSION_TITLE              = 'version_title';              // Title of this version (i.e Gold edition)
    case VIDEOS                     = 'videos';                     // Videos of this game
    case WEBSITES                   = 'websites';                   // Websites associated with this game
}
