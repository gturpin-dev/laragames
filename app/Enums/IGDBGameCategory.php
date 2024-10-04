<?php

declare(strict_types=1);

namespace App\Enums;

use App\Enums\Metadata\Label;
use ArchTech\Enums\Meta\Meta;
use ArchTech\Enums\Metadata;

#[Meta( Label::class )]
enum IGDBGameCategory: int
{
    use Metadata;

    #[Label( 'Main Game' )]
    case MAIN_GAME = 0;

    #[Label( 'DLC/Addon' )]
    case DLC_ADDON = 1;

    #[Label( 'Expansion' )]
    case EXPANSION = 2;

    #[Label( 'Bundle' )]
    case BUNDLE = 3;

    #[Label( 'Standalone Expansion' )]
    case STANDALONE_EXPANSION = 4;

    #[Label( 'Mod' )]
    case MOD = 5;

    #[Label( 'Episode' )]
    case EPISODE = 6;

    #[Label( 'Season' )]
    case SEASON = 7;

    #[Label( 'Remake' )]
    case REMAKE = 8;

    #[Label( 'Remaster' )]
    case REMASTER = 9;

    #[Label( 'Expanded Game' )]
    case EXPANDED_GAME = 10;

    #[Label( 'Port' )]
    case PORT = 11;

    #[Label( 'Fork' )]
    case FORK = 12;

    #[Label( 'Pack' )]
    case PACK = 13;

    #[Label( 'Update' )]
    case UPDATE = 14;

    public static function default(): self
    {
        return self::MAIN_GAME;
    }
}
