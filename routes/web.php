<?php

use App\Http\Integrations\IGDB\IGDBConnector;
use Illuminate\Support\Facades\Route;

Route::get( '/', function () {
    return view( 'welcome' );
} );

Route::get( '/test', function () {
    $connector = new IGDBConnector();

    dd(
        $connector,
        $connector->getAuthenticator()
    );

    return 'Test';
} );
