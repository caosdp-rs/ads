<?php

$routes->group('{locale}/dashboard', ['namespace' => 'App\Controllers\dashboard','filter'=>'auth:web'], function ($routes) {
    
    $routes->get('/', 'DashboardController::index', ['filter' => 'verified','as'=>'dashboard']);

});

?>