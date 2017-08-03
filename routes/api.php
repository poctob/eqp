<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/config', 'EquipmentConfigurationController', ['only' => [
    'index','store','show', 'update', 'destroy'
]]);

Route::resource('/category', 'EquipmentCategoryController', ['only' => [
    'index', 'store','show', 'update', 'destroy'
]]);

Route::resource('/status', 'EquipmentStatusController', ['only' => [
    'index', 'store','show', 'update', 'destroy'
]]);

Route::resource('/equipment', 'EquipmentController',  ['only' => [
    'index', 'store','show', 'update', 'destroy'
]]);
