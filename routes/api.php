<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login','SiteController@login');
Route::apiresource('productos','ApiController');
Route::post('productos/{id}','ApiController@updateforpost');
