<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contacts', 'HomeController@contacts')->name('contacts');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/company/profile/edit', 'CompaniesController@edit')->name('company.profile.edit');
    Route::post('/company/profile/update', 'CompaniesController@update')->name('company.profile.update');
    Route::get('/companies/{id}/show', 'CompaniesController@show')->name('companies.show');

    Route::get('/offer/add', 'OfferController@add')->name('offer.add');
    Route::get('/offer/{id}/edit', 'OfferController@edit')->name('offer.edit');
    Route::post('/offer/{id}/update', 'OfferController@store')->name('offer.update');
    Route::post('/offer/store', 'OfferController@store')->name('offer.store');
    Route::get('/offer/{id}/published', 'OfferController@published')->name('offer.published');
    Route::get('/offer/{id}/order', 'OfferController@order')->name('offer.order');

    Route::get('/chat/{id}', 'ChatController@index')->name('chat.index');
    Route::post('/chat/{id}/send', 'ChatController@send')->name('chat.send');
    Route::post('/chat/read', 'ChatController@read')->name('chat.read');

    Route::post('/upload', 'DropzoneController@upload')->name('dropzone.upload');
});

Route::get('/company/profile', 'CompaniesController@profile')->name('company.profile');

Route::get('/offers', 'OfferController@index')->name('offers');
Route::get('/offers/search', 'OfferController@search')->name('offers.search'); // test
Route::post('/offers/{id}', 'OfferController@subcategories')->name('offers.subcategories');
Route::get('/offer/{id}', 'OfferController@show')->name('offer.show');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {//, 'middleware' => 'admin'

    Route::get('/', 'DashboardController@index')->name('admin');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/offers', 'OffersController@index')->name('offers');

    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/user/{id}', 'UsersController@show')->name('users.show');

    Route::get('/companies', 'CompaniesController@index')->name('companies');
    Route::get('/company/{id}', 'CompaniesController@show')->name('company.show');

    Route::get('/services', 'ServicesController@index')->name('services');
    Route::get('/service/add', 'ServicesController@add')->name('service.add');
    Route::post('/service/store', 'ServicesController@store')->name('service.store');

    Route::resource('categories', 'CategoriesController')
        ->parameters([
        'categories' => 'id'
    ]);
//        ->only('show', 'update', 'destroy');
//    Route::name('categories.')
//        ->prefix('categories')
//        ->group(function () {
//            Route::get('{id}', 'CategoriesController@show')->name('show');
//            Route::put('{id}', 'CategoriesController@update')->name('update');
//            Route::delete('{id}', 'CategoriesController@destroy')->name('destroy');
//        });

//    Route::get('/categories', 'CategoriesController@index')->name('categories');
//    Route::get('/category/add', 'CategoriesController@add')->name('category.add');
//    Route::post('/category/store', 'CategoriesController@store')->name('category.store');
//    Route::put('/category/{id}/update', 'CategoriesController@update')->name('category.update');
//    Route::delete('/category/{id}/destroy', 'CategoriesController@destroy')->name('category.destroy');
//    Route::get('/category/{id}', 'CategoriesController@show')->name('category.show');
});

Auth::routes();
