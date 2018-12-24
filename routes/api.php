<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('test', function (){
//     return response([1,2,3,4],200);
// });



Route::post('/login','AuthController@login');
Route::post('/register','AuthController@register');




Route::middleware('auth:api')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout','AuthController@logout');
    Route::get('/product','ProductController@index');
Route::post('/product','ProductController@store');

});
//===================rutas de categoria============================
Route::get('/category','CategoryController@index');
Route::post('/category','CategoryController@store');
Route::patch('/category/{category}','CategoryController@update');
Route::delete('/category/{category}', 'CategoryController@destroy');
Route::post('/addParent', 'CategoryController@addParent');
Route::get('/category/{category}','CategoryController@byId');

//==================================================================

//====================ruta de productos=============================

Route::patch('/product/{category}','ProductController@update');
Route::delete('/product/{category}', 'ProductController@destroy');

//==================================================================

//====================ruta de attributos============================
Route::post('/attribute','AttributeController@store');



//==================================================================

//======================ruta de valores=============================
Route::get('/value','ValueController@index');
Route::post('/value','ValueController@store');


//====================ruta de blend attribute value==========================
Route::post('/blendAttributeValue','BlendAttributeValueController@store');


//=========================================================================

//====================ruta de attributo valores=============================
Route::post('/attributeValue','AttributeValueController@store');


//=========================================================================

//====================ruta de estados de producto==========================
Route::get('/statusProduct','StatusProductController@index');


