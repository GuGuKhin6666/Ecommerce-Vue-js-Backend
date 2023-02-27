<?php

use App\Http\Controllers\Api\AvailabilityController;
use App\Http\Controllers\Api\BlogCategoryController;
use App\Http\Controllers\Api\BlogPostController;
use App\Http\Controllers\Api\BlogtagpostController;
use App\Http\Controllers\Api\BlogTopicController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\HotItemController;
use App\Http\Controllers\Api\OrderListController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\PriceController;
use App\Http\Controllers\Api\SaleItemController;
use App\Http\Controllers\Api\TrendPostController;
use App\Http\Controllers\CashTotalController;
use App\Models\BlogPost;
use App\Models\CashTotal;
use App\Models\HotItem;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Trend Post
Route::get('trendpost',[TrendPostController::class,'trendpost']);

//Post 
Route::get('post',[PostController::class,'postdata']);

//Sale 
Route::get('sale',[SaleItemController::class,'saleitem']);

//Cart
Route::get('cart',[CartController::class,'cartdata']);
Route::post('searchcategory',[CartController::class,'searchcategory']);

//Search Key
Route::post('searchkeycart',[CartController::class,'searchkeycart']);

//Shop Card
Route::post('shopcart',[CartController::class,'shopcart']);
Route::post('delid',[CartController::class,'delid']);

//Detail data
Route::post('detaildata',[CartController::class,'detaildata']);


//Category
Route::get('category',[CategoryController::class,'categorydata']);

//get Countdata
Route::get('getcount',[OrderListController::class,'getcount']);

//Brand
Route::get('brand',[BrandController::class,'branddata']);
Route::post('searchbrand',[BrandController::class,'searchbrand']);

//Availability
Route::get('availability',[AvailabilityController::class,'avadata']);
Route::post('searchcondition',[AvailabilityController::class,'searchcondition']);

//low to high
Route::post('lowtohigh',[PriceController::class,'lowtohigh']);
Route::post('hightolow',[PriceController::class,'hightolow']);

//blog post
Route::get('blogpost',[BlogPostController::class,'blogpost']);

//Blog Tag post
Route::get('tagpost',[BlogtagpostController::class,'tagpost']);

//BLog Category
Route::get('blogcategory',[BlogCategoryController::class,'blogcategory']);

//BLog Topic
Route::get('blogtopic',[BlogTopicController::class,'blogtopic']);

//Search BLog Category
Route::post('searchblogcategory',[BlogCategoryController::class,'searchblogcategory']);

//Search Topic
Route::post('searchtopic',[BlogTopicController::class,'searchtopic']);

//Search Tag post
Route::post('searchtagpost',[BlogtagpostController::class,'searchtagpost']);

//Search Key
Route::post('searchkeyblog',[BlogPostController::class,'searchkeyblog']);

//Get BLog Data
Route::post('getblogpage',[BlogPostController::class,'getblogpage']);

//Get Hot Data
Route::get('hotdata',[HotItemController::class,'hotdata']);

//Check Condition
Route::post('checkcondition',[HotItemController::class,'checkcondition']);

//Search Hot Item Category Id
Route::post('searchcategoryid',[HotItemController::class,'searchcategoryid']);

//Detail Hot item
Route::post('detailhotitem',[HotItemController::class,'detailhotitem']);

//Detail Cart 
Route::post('detailcard',[HotItemController::class,'detailcard']);

//Double Detail Cart
Route::post('zoomdata',[HotItemController::class,'zoomdata']);

//Cash Total
Route::post('cashtotal',[CashTotalController::class,'cashtotalsum'])->name('cash#total');