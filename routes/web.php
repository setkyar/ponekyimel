<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');
    $accessToken = config('laravel-facebook-sdk.facebook_config')['app_id'] . '|' . config('laravel-facebook-sdk.facebook_config')['app_secret'];

    try {
        $response = $fb->get('212390098842654/photos?fields=images&type=uploaded&limit=25', $accessToken)->getDecodedBody();
        
        return $response;

    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }
    
});
