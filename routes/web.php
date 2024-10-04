<?php

use App\Enums\IGDBGameField;
use App\Http\Integrations\IGDB\IGDBConnector;
use App\Http\Integrations\IGDB\Requests\GetGamesRequest;
use Illuminate\Support\Facades\Route;

Route::get( '/', function () {
    return view( 'welcome' );
} );

Route::get( '/test', function () {
    $connector = new IGDBConnector;
    $request   = new GetGamesRequest(
        fields: [
            // IGDBGameField::ALL,
            IGDBGameField::ID,
            IGDBGameField::CHECKSUM,
            IGDBGameField::NAME,
            IGDBGameField::ALTERNATIVE_NAMES__NAME,
            IGDBGameField::ALTERNATIVE_NAMES__COMMENT,
            IGDBGameField::COVER__URL,
            IGDBGameField::CATEGORY,
            IGDBGameField::BUNDLES,
            IGDBGameField::ARTWORKS,
            IGDBGameField::AGE_RATINGS__CATEGORY,
            IGDBGameField::AGE_RATINGS__RATING,
            IGDBGameField::TOTAL_RATING,
            IGDBGameField::TOTAL_RATING_COUNT,
            IGDBGameField::UPDATED_AT,
        ],
        search: 'Halo'
    );
    $response = $connector->send( $request );

    dd(
        $response->dto()
    );

    return 'Test';
} );
