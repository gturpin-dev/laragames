<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * The PEGI Rating of a game from IGDB ids.
 */
enum IGDBPegiRating: int
{
    case THREE    = 1;
    case SEVEN    = 2;
    case TWELVE   = 3;
    case SIXTEEN  = 4;
    case EIGHTEEN = 5;
}
