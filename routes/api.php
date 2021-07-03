<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/products', function() {
//     return Product::all();
// });

// Route::get('/products/{id}', function($id) {
//     $product = Product::with('category')
//         ->select('product_name',
//         'price',
//         'description',
//         'category',
//         'image_url',
//         'price',
//         'sold',
//         'stock',
//         'rating'
//         )->where(['id' => $id])->get();

//     return response()->json($product);
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('profile', 'AuthController@userProfile');
    Route::get('cart', 'CartController@index');
});

// Route::middleware('auth:api')->get('/products', [ProductController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);



// Route::get('/cart', [CartController::class, 'index']);

Route::post('/cart', [CartController::class, 'store']);