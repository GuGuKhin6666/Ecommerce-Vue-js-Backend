<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SaleItemController;
use App\Http\Controllers\BlogTopicController;
use App\Http\Controllers\TrendPostController;
use App\Http\Controllers\BlogTagpostController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\HotItemController;
use App\Models\BlogPost;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    //Profile
    Route::get('dashboard',[ProfileController::class,'index'])->name('dashboard#page');
    Route::post('updateprofile',[ProfileController::class,'updateprofile'])->name('update#profile');
    Route::get('changepassword',[ProfileController::class,'changepassword'])->name('change#password');
    Route::post('passwordupdate',[ProfileController::class,'passwordupdate'])->name('update#password');
    Route::post('itemdelete/{id}',[ProfileController::class,'itemdelete'])->name('item#delete');

    //List
    Route::get('dashboard/list',[ListController::class,'index'])->name('list#page');
    Route::post('serachkey',[ListController::class,'searchkey'])->name('search#key');

    //Category
    Route::get('dashboard/category',[CategoryController::class,'index'])->name('category#page');
    Route::post('createcategory',[CategoryController::class,'createcategory'])->name('create#category');
    Route::get('deletecategory/{id}',[CategoryController::class,'deletecategory'])->name('delete#category');
    Route::get('searchkeypage',[CategoryController::class,'searchkey'])->name('searchkey#page');
    Route::get('editcategory/{id}',[CategoryController::class,'editcategory'])->name('edit#category');
    Route::post('updatecategory/{id}',[CategoryController::class,'updatecategory'])->name('update#category');

    //Post
    Route::get('dashboard/post',[PostController::class,'index'])->name('post#page');
    Route::post('createpost',[PostController::class,'createpost'])->name('create#post');
    Route::get('postdelete/{id}',[PostController::class,'postdelete'])->name('post#delete');
    Route::get('editpost/{id}',[PostController::class,'editpost'])->name('edit#post');
    Route::post('postupdate/{id}',[PostController::class,'postupdate'])->name('post#update');

    //Trend_psot
    Route::get('dashboard/trendpost',[TrendPostController::class,'index'])->name('trendpost#page');
    Route::post('createtrendpost',[TrendPostController::class,'createtrendpost'])->name('create#trendpost');
    Route::get('edittrendpost/{id}',[TrendPostController::class,'edittrendpost'])->name('edit#trendpost');
    Route::get('trendpostdelete/{id}',[TrendPostController::class,'trendpostdelete'])->name('trendpost#delete');
    Route::post('trendpostupdate/{id}',[TrendPostController::class,'trendpostupdate'])->name('trendpost#update');

    // Sale
    Route::get('dashboard/salepage',[SaleItemController::class,'salepage'])->name('sale#page');
    Route::post('salecreate',[SaleItemController::class,'salecreate'])->name('sale#create');
    Route::get('saleedit/{id}',[SaleItemController::class,'editsale'])->name('edit#page');
    Route::post('updatesale/{id}',[SaleItemController::class,'updatesale'])->name('update#sale');
    Route::get('saledelete/{id}',[SaleItemController::class,'saledelete'])->name('sale#delete');

    //Brands
    Route::get('dashboard/brandpage',[BrandController::class,'brandpage'])->name('brand#page');
    Route::post('createbrand',[BrandController::class,'createbrand'])->name('create#brand');
    Route::get('editbrand/{id}',[BrandController::class,'editbrand'])->name('edit#brand');
    Route::post('updatebrand/{id}',[BrandController::class,'updatebrand'])->name('update#brand');
    Route::get('deletebrand/{id}',[BrandController::class,'deletebrand'])->name('delete#brand');

    //Availability
    Route::get('dashboard/availability',[AvailabilityController::class,'avapage'])->name('ava#page');
    Route::post('createava',[AvailabilityController::class,'createava'])->name('create#ava');
    Route::get('editava/{id}',[AvailabilityController::class,'editava'])->name('edit#ava');
    Route::post('updateava/{id}',[AvailabilityController::class,'updateava'])->name('update#ava');
    Route::get('deleteava/{id}',[AvailabilityController::class,'deleteava'])->name('delete#ava');

    //Cart
    Route::get('dashboard/cart',[CartController::class,'cartpage'])->name('cart#page');
    Route::post('createcart',[CartController::class,'createcart'])->name('create#cart');
    Route::get('editcart/{id}',[CartController::class,'editcart'])->name('edit#cart');
    Route::post('updatecart/{id}',[CartController::class,'updatecart'])->name('update#cart');
    Route::get('deletecart/{id}',[CartController::class,'deletecart'])->name('delete#cart');

    //Blog Cagtegory
    Route::get('dashboard/blogcategory',[BlogCategoryController::class,'blogcategory'])->name('blog#category');
    Route::post('createblogcategory',[BlogCategoryController::class,'createblogcategory'])->name('create#blogcategory');
    Route::get('editblogcategory/{id}',[BlogCategoryController::class,'editblogcategory'])->name('edit#blogcategory');
    Route::post('updateblogcategory/{id}',[BlogCategoryController::class,'updateblogcategory'])->name('update#blogcategory');
    Route::get('deleteblogcategory/{id}',[BlogCategoryController::class,'deleteblogcategory'])->name('delete#blogcategory');

    //BLog Topic
     Route::get('dashboard/blogtopic',[BlogTopicController::class,'blogtopic'])->name('blog#topic');
     Route::post('createblogtopic',[BlogTopicController::class,'createblogtopic'])->name('create#blogtopic');
     Route::get('editblogtopic/{id}',[BlogTopicController::class,'editblogtopic'])->name('edit#blogtopic');
     Route::post('updateblogtopic/{id}',[BlogTopicController::class,'updateblogtopic'])->name('update#blogtopic');
     Route::get('deleteblogtopic/{id}',[BlogTopicController::class,'deleteblogtopic'])->name('delete#blogtopic');

     //BLog Tag post
     Route::get('dashboard/blogtagpost',[BlogTagpostController::class,'blogtagpost'])->name('blog#tagpost');
     Route::post('createblogtagpost',[BlogTagpostController::class,'createblogtagpost'])->name('create#blogtagpost');
     Route::get('editblogtagpost/{id}',[BlogTagpostController::class,'editblogtagpost'])->name('edit#blogtagpost');
     Route::post('updateblogtagpost/{id}',[BlogTagpostController::class,'updateblogtagpost'])->name('update#blogtagpost');
     Route::get('deleteblogtagpost/{id}',[BlogTagpostController::class,'deleteblogtagpost'])->name('delete#blogtagpost');

     //Blog Post
     Route::get('dashboard/blogpost',[BlogPostController::class,'blogpost'])->name('blog#post');
     Route::post('createblogpost',[BlogPostController::class,'createblogpost'])->name('create#blogpost');
     Route::get('editblogpost/{id}',[BlogPostController::class, 'editblogpost'])->name('edit#blogpost');
     Route::post('updateblogpost/{id}',[BlogPostController::class, 'updateblogpost'])->name('update#blogpost');

      //Hot Item
    Route::get('dashboard/hotitem',[HotItemController::class,'hotitempage'])->name('hotitem#page');
    Route::post('createhotitem',[HotItemController::class,'createhotitem'])->name('create#hotitem');
    Route::get('edithotitem/{id}',[HotItemController::class,'edithotitem'])->name('edit#hotitem');
    Route::post('updatehotitem/{id}',[HotItemController::class,'updatehotitem'])->name('update#hotitem');
    Route::get('deletehotitem/{id}',[HotItemController::class,'deletehotitem'])->name('delete#hotitem');
});