<?php

$routes->group('manager', ['namespace' => 'App\Controllers\Manager'], function ($routes) {
    $routes->get('/','ManagerController::index',['as'=>'manager']);
    
    $routes->group('categories', function ($routes) {
        $routes->get('/','CategoriesController::index',['as'=>'categories']);
        $routes->get('get-all','CategoriesController::getAllCategories',['as'=>'categories.get.all']);
        $routes->get('get-info','CategoriesController::getCategoryInfo',['as'=>'categories.get.info']);
        $routes->post('create','CategoriesController::create',['as'=>'categories.create']);
        $routes->put('update','CategoriesController::update',['as'=>'categories.update']);
        
    });
});
