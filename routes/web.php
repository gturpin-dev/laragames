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
            IGDBGameField::ALL
            // IGDBGameField::NAME,
            // IGDBGameField::SUMMARY,
            // IGDBGameField::COVER,
        ],
        search: 'Halo'
    );
    $response = $connector->send( $request );

    dd(
        $response->json(),
        $response->dto()
    );

    return 'Test';
} );
