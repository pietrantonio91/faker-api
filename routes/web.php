<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'api', 'namespace' => 'Api'], function() use ($router) {
    $router->group(['prefix' => 'v1', 'namespace' => 'V1'], function() use ($router) {
        $router->get('persons/', 'PersonsController@index');
        $router->get('addresses/', 'AddressesController@index');
        $router->get('users/', 'UsersController@index');
        $router->get('products/', 'ProductsController@index');
        $router->get('companies/', 'CompaniesController@index');
        $router->get('images/', 'ImagesController@index');
        $router->get('places/', 'PlacesController@index');
        $router->get('credit_cards/', 'CreditCardsController@index');
        $router->get('books/', 'BooksController@index');
        $router->get('texts/', 'TextsController@index');
        // Custom sarà l'unico particolare che accetta anche parametri senza _
        $router->get('custom/', 'CustomController@index');

        // Non capisco bene come mostrarli
        // $router->get('emojis/', 'EmojisController@index');
        /**
         * Lista risorse da creare:
         * deals?
         * pokemon?
         * superhero?
         * colors?
         */
    });
});

$router->group(['middleware' => 'locale'], function() use ($router) {
    $router->get('/', 'Frontend\\HomeController@index');
    $router->get('/fake-data-csv', 'Frontend\\DownloadController@index');
    $router->post('/download', 'Frontend\\DownloadController@download');
});
$router->group(['prefix' => 'en', 'middleware' => 'locale'], function() use ($router) {
    $router->get('/', 'Frontend\\HomeController@index');
    $router->get('/fake-data-csv', 'Frontend\\DownloadController@index');
    $router->post('/download', 'Frontend\\DownloadController@download');
});
$router->group(['prefix' => 'it', 'middleware' => 'locale'], function() use ($router) {
    $router->get('/', 'Frontend\\HomeController@index');
    $router->get('/fake-data-csv', 'Frontend\\DownloadController@index');
    $router->post('/download', 'Frontend\\DownloadController@download');
});
