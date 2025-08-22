<?php

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;




// FRONTEND ROUTE::::::;;;\
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact',[HomeController::class, 'contact'])->name('contact');
Route::get('/buy', [HomeController::class, 'buy'])->name('buy');
Route::get('/typed-property/{type?}', [HomeController::class, 'typedProperty'])->name('typed-property');
Route::get('/rent', [HomeController::class, 'rent'])->name('rent');
//Route::get('/villa', [HomeController::class, 'villa'])->name('villa');
Route::get('/category-properties/{propertyType}', [HomeController::class, 'categoryProperties'])->name('category-properties');
Route::get('/landproperty', [HomeController::class, 'landproperty'])->name('landproperty');
//Route::get('/land', [HomeController::class, 'land'])->name('land');
//Route::get('/commercial', [HomeController::class, 'commercial'])->name('commercial');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/detail/{property}', [HomeController::class, 'detail'])->name('detail');
Route::get('/term', [HomeController::class, 'term'])->name('term');
Route::get('privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/refund', [HomeController::class, 'refund'])->name('refund');
Route::get('/disclaimer', [HomeController::class, 'disclaimer'])->name('disclaimer');

Route::post('contact/save', [HomeController::class, 'contactSave'])->name('contact.save');





Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth','verified'])->name('dashboard');



// Routes that require authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Permission Routes
    Route::get('permission/index',[PermissionController::class,'index'])->name('permission.index');
    Route::get('permission/create',[PermissionController::class,'create'])->name('permission.create');
    Route::post('permission/store',[PermissionController::class,'store'])->name('permission.store');
    Route::get('permission/edit/{permission}',[PermissionController::class,'edit'])->name('permission.edit');
    Route::post('permission/update/{permission}',[PermissionController::class,'update'])->name('permission.update');
    Route::get('permission/delete/{permission}',[PermissionController::class,'delete'])->name('permission.delete');

    // Role Routes
    Route::get('role/index',[RoleController::class,'index'])->name('role.index');
    Route::get('role/create',[RoleController::class,'create'])->name('role.create');
    Route::post('role/store',[RoleController::class,'store'])->name('role.store');
    Route::get('role/edit/{role}',[RoleController::class,'edit'])->name('role.edit');
    Route::post('role/update/{role}',[RoleController::class,'update'])->name('role.update');
    Route::get('role/delete/{role}',[RoleController::class,'delete'])->name('role.delete');

    // User Routes
    Route::get('user/index',[UserController::class,'index'])->name('user.index');
    Route::get('user/create',[UserController::class,'create'])->name('user.create');
    Route::post('user/store',[UserController::class,'store'])->name('user.store');
    Route::get('user/edit/{user}',[UserController::class,'edit'])->name('user.edit');
    Route::post('user/update/{user}',[UserController::class,'update'])->name('user.update');
    Route::get('user/delete/{user}',[UserController::class,'delete'])->name('user.delete');
    Route::get('/user/permissions/{user}', [UserController::class, 'assignPermissionForm'])->name('user.permission.form');
    Route::post('/user/permissions/{user}', [UserController::class, 'assignPermissionToUser'])->name('user.assign-permission');


    Route::controller(\App\Http\Controllers\PropertyTypeController::class)->prefix('property-types')->name('property-types.')->group(function(){
       Route::get('/', 'index')->name('index');
       Route::get('create', 'create')->name('create');
       Route::post('store', 'store')->name('store');
       Route::get('edit/{propertyType}', 'edit')->name('edit');
       Route::post('update/{propertyType}', 'update')->name('update');
       Route::post('destroy/{propertyType}', 'destroy')->name('destroy');
    });


    Route::controller(\App\Http\Controllers\CityController::class)->prefix('cities')->name('cities.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{city}', 'edit')->name('edit');
        Route::post('update/{city}', 'update')->name('update');
        Route::post('destroy/{city}', 'destroy')->name('destroy');
    });

    Route::controller(\App\Http\Controllers\PropertyController::class)->prefix('properties')->name('properties.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{property}', 'edit')->name('edit');
        Route::get('show/{property}', 'show')->name('show');
        Route::post('update/{property}', 'update')->name('update');
        Route::post('destroy/{property}', 'destroy')->name('destroy');
    });

    Route::controller(\App\Http\Controllers\AmenityController::class)->prefix('amenities')->name('amenities.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{amenity}', 'edit')->name('edit');
        Route::post('update/{amenity}', 'update')->name('update');
        Route::post('destroy/{amenity}', 'destroy')->name('destroy');
    });

    Route::controller(\App\Http\Controllers\EnquiryController::class)->prefix('enquiries')->name('enquiries.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('status/{enquiry}', 'status')->name('status');
        Route::post('destroy/{amenity}', 'destroy')->name('destroy');
    });


    Route::resource('lands', LandController::class);
    Route::controller(LandController::class)->prefix('lands')->name('lands.')->group(function () {
        Route::post('publish/{land}','publish')->name('publish');
        Route::post('unpublish/{land}','unpublish')->name('unpublish');
        Route::post('visibility/{land}','setVisibility')->name('visibility');
        Route::post('restore/{id}','restore')->name('restore');
        Route::delete('force/{id}','forceDelete')->name('forceDelete');
    });


});

require __DIR__.'/auth.php';
