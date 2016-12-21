<?php

Route::group(['middleware' => 'guest'], function () {

    Route::get('/redirect', function () {
        $query = http_build_query([
            'client_id' => env('CONNECT_CLIENT_ID'),
            'redirect_uri' => env('CONNECT_CLIENT').'/callback',
            'response_type' => 'code',
            'scope' => '*'
        ]);
        return redirect(env('CONNECT_SERVER').'/oauth/authorize?' . $query);
    });

});