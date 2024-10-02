<?php

use Illuminate\Support\Facades\Route;
use App\Http\Integrations\IGDB\Requests\GetGamesRequest;
use App\Http\Integrations\IGDB\IGDBConnector;

Route::get( '/', function () {
    return view( 'welcome' );
} );

Route::get( '/test', function () {
    $connector = new IGDBConnector();
    $request   = new GetGamesRequest();

    dd(
        $connector->send( $request )->json()
    );

    return 'Test';
} );
