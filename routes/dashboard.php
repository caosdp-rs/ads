<?php

$routes->group('{locale}/dashboard', ['namespace' => 'App\Controllers\dashboard','filter'=>'auth:web'], function ($routes) {
    
    $routes->get('/', 'DashboardController::index', ['filter' => 'verified','as'=>'dashboard']);


    $routes->group('adverts', ['namespace' => 'App\Controllers\dashboard'], function ($routes) {
    
        $routes->get('my', 'AdvertsUserController::index', ['as'=>'my.adverts']);
        $routes->get('get.all.my.adverts', 'AdvertsUserController::getUserAdverts', ['as'=>'get.all.my.adverts']);
    
    });

});

?>