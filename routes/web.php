<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::get('/', [FrontController::class, 'getHome'])->name('home');
    Route::get('/user/restaurantslist', [RestaurantController::class, 'restaurantsList'])->name('restaurants.list');
    Route::get('/user/restaurantsearch', [RestaurantController::class, 'restaurantsSearch'])->name('restaurants.search');
    Route::get('/user/restaurantdetails/{id}', [RestaurantController::class, 'showDetails'])->name('restaurant.details');
    Route::get('/user/login', [AuthController::class, 'authentication'])->name('user.login');
    Route::post('/user/login', [AuthController::class, 'login'])->name('user.login');
    Route::get('/user/logout', [AuthController::class, 'logout'])->name('user.logout');
    Route::get('/user/register', [AuthController::class, 'registration'])->name('user.register');
    Route::post('/user/register', [AuthController::class, 'register'])->name('user.register');
    Route::get('/user/accessdenied', [AuthController::class, 'accessdenied'])->name('user.accessdenied');
    Route::get('/pageNotFound', [AuthController::class, 'pageNotFound'])->name('pagenotfound');


Route::middleware(['authOwner'])->group( function() {
    Route::post('/owner/createrestaurant/{id}', [OwnerController::class, 'createRestaurant'])->name('owner.createrestaurant');
    Route::get('/owner/ownerprofile',[OwnerController::class, 'myProfile'])->name('owner.myprofile');
    Route::get('/owner/settings/{id}', [OwnerController::class, 'settings'])->name('owner.settings');
    Route::get('/owner/receivedreviews/{id}', [OwnerController::class, 'receivedReviews'])->name('owner.receivedreviews');
    Route::get('/owner/restaurantinfo/{id}', [OwnerController::class, 'restaurantInfo'])->name('owner.restaurantinfo');
    Route::get('/owner/update/{id}', [OwnerController::class, 'updateProfile'])->name('owner.update');
    Route::put('/owner/update/{id}', [OwnerController::class, 'updateProfile'])->name('owner.update');
    Route::get('/owner/passwordupdate/{id}', [OwnerController::class, 'passwordUpdate'])->name('owner.passwordupdate');
    Route::put('/owner/passwordupdate/{id}', [OwnerController::class, 'passwordUpdate'])->name('owner.passwordupdate');
    Route::get('/owner/deleteaccount/{id}',[OwnerController::class, 'goToDelete'])->name('owner.deleteaccount');
    Route::get('/owner/delete/{id}', [OwnerController::class, 'destroy'])->name('owner.delete');
    Route::get('/owner/restaurantupdate/{id}', [OwnerController::class, 'updateRestaurant'])->name('owner.restaurantupdate');
    Route::put('/owner/restaurantupdate/{id}', [OwnerController::class, 'updateRestaurant'])->name('owner.restaurantupdate');
 
});


Route::middleware(['authCustomer'])->group( function() {
    Route::get('/customer/myreviews/{id}', [CustomerController::class, 'myReviews'])->name('customer.myreviews');
    Route::get('/customer/favoriteRestaurants/{id}', [RestaurantController::class, 'favoriteRestaurants'])->name('customer.favoriterestaurants');
    Route::get('/restaurant/toggle-favorite/{id}', [RestaurantController::class, 'toggleFavorite'])->name('customer.favoritetoggle');
    Route::post('/restaurant/toggle-favorite/{id}', [RestaurantController::class, 'toggleFavorite'])->name('customer.favoritetoggle');
    Route::get('/customer/modifyreview/{id}/{review_id}', [CustomerController::class, 'modifyReview'])->name('customer.modifyreview');
    Route::get('/customer/deletereview/{id}/{review_id}', [CustomerController::class, 'goToDeleteReview'])->name('customer.deletereview');
    Route::get('/customer/destroyreview/{id}/{review_id}', [CustomerController::class, 'destroyReview'])->name('customer.destroyreview');
    Route::get('/customer/customerprofile',[CustomerController::class, 'myProfile'])->name('customer.myprofile');
    Route::get('/customer/settings/{id}', [CustomerController::class, 'settings'])->name('customer.settings');
    Route::get('/customer/update/{id}', [CustomerController::class, 'updateProfile'])->name('customer.update');
    Route::put('/customer/update/{id}', [CustomerController::class, 'updateProfile'])->name('customer.update');
    Route::get('/customer/passwordupdate/{id}', [CustomerController::class, 'passwordUpdate'])->name('customer.passwordupdate');
    Route::put('/customer/passwordupdate/{id}', [CustomerController::class, 'passwordUpdate'])->name('customer.passwordupdate');
    Route::get('/customer/deleteaccount/{id}',[CustomerController::class, 'goToDelete'])->name('customer.deleteaccount');
    Route::get('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
    Route::get('/customer/writereview/{id}', [CustomerController::class, 'writeReview'])->name('customer.writereview');
    Route::get('/customer/reviewsubmit/{id}', [CustomerController::class, 'reviewSubmit'])->name('review.submit');
    Route::post('/customer/reviewsubmit/{id}', [CustomerController::class, 'reviewSubmit'])->name('review.submit');
    Route::get('/customer/modifiedreviewsubmit/{id}/{review_id}', [CustomerController::class, 'modifiedReviewSubmit'])->name('modifiedreview.submit');
    Route::post('/customer/modifiedreviewsubmit/{id}/{review_id}', [CustomerController::class, 'modifiedReviewSubmit'])->name('modifiedreview.submit');
    Route::put('/customer/modifiedreviewsubmit/{id}/{review_id}', [CustomerController::class, 'modifiedReviewSubmit'])->name('modifiedreview.submit');

});
