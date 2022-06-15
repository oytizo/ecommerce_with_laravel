<?php

use App\Http\Controllers\Backend\GoogleController;
use App\Http\Controllers\Frontend\AddCart;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/check', function () {
    return view('check');
});

Route::get('/auth/google',[GoogleController::class,'redirectToGoole']);
Route::get('/auth/google/callback',[GoogleController::class,'handleGoogleCallback']);

Route::get('/front',[AddCart::class,'show']);

Route::get('/get/password',function(){
    return view('backend.newpassword');
})->name('newpassword');

Route::post('submit/password',[GoogleController::class,'passwordsubmit'])->name('submitpassword');

Route::get('/admin', function () {
    return view('backend.admindashboard');
})->middleware(['auth','verified'])->name('dashboard');

// Route::get('/', function () {
//     return view('backend.admindashboard');
// })->name('/');

Route::group(['prefix' => '/cart'], function () {
    Route::post('/add', 'App\Http\Controllers\Frontend\AddCart@store')->name('add');
   Route::get('/show/{id}', 'App\Http\Controllers\Frontend\AddCart@edit');
   Route::get('/delete/{id}', 'App\Http\Controllers\Frontend\AddCart@delete');
   Route::get('/viewcart/{id}', 'App\Http\Controllers\Frontend\AddCart@view')->name('view');
});

Route::group(['prefix' => '/admin'], function () {
    Route::group(['prefix' => '/product'], function () {
        Route::get('/create', 'App\Http\Controllers\Backend\ProductController@create')->name('createproduct');
        Route::post('/insert', 'App\Http\Controllers\Backend\ProductController@store')->name('insert');
        Route::get('/manage', 'App\Http\Controllers\Backend\ProductController@index')->name('manage');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ProductController@show')->name('productedit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\ProductController@update')->name('update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\ProductController@delete')->name('delete');
    });

    Route::group(['prefix' => '/category'], function () {
        Route::get('/showcategory', 'App\Http\Controllers\Backend\CategoryController@showcategory')->name('showcategory');
        Route::post('/catinsert', 'App\Http\Controllers\Backend\CategoryController@store')->name('catinsert');
        Route::get('/catmanage', 'App\Http\Controllers\Backend\CategoryController@index')->name('catmanage');
        Route::get('/catedit/{id}', 'App\Http\Controllers\Backend\CategoryController@catedit')->name('catedit');
        Route::post('/catupdate/{id}', 'App\Http\Controllers\Backend\CategoryController@update')->name('catupdate');
        Route::get('/deletecat/{id}', 'App\Http\Controllers\Backend\CategoryController@deletecat')->name('deletecat');
    });

    Route::group(['prefix' => '/subcategory'], function () {
        Route::get('/create', 'App\Http\Controllers\Backend\SubcategoryController@create')->name('subcategorycreate');
        Route::post('/insert', 'App\Http\Controllers\Backend\SubcategoryController@store')->name('subcategoryinsert');
        Route::get('/manage', 'App\Http\Controllers\Backend\SubcategoryController@index')->name('subcategorymanage');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\SubcategoryController@show')->name('subcategoryproductedit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\SubcategoryController@update')->name('subcategoryupdate');
        Route::post('/subupdate/{id}', 'App\Http\Controllers\Backend\SubcategoryController@update')->name('subcatupdate');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\SubcategoryController@delete')->name('subcategorydelete');
    });

    Route::group(['prefix' => '/item'], function () {
        Route::get('/create', 'App\Http\Controllers\Backend\ItemsController@create')->name('item.create');
        Route::post('/insert', 'App\Http\Controllers\Backend\ItemsController@store')->name('item.store');
        Route::get('/manage', 'App\Http\Controllers\Backend\ItemsController@index')->name('item.manage');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ItemsController@show')->name('item.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\ItemsController@update')->name('item.update');
        Route::post('/update/single/{id}', 'App\Http\Controllers\Backend\ItemsController@singleupdate')->name('item.single.update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\ItemsController@delete')->name('item.delete');
        Route::get('/deletesinglepic/{id}', 'App\Http\Controllers\Backend\ItemsController@deletesinglepic')->name('item.deletesinglepic');

    });
});

require __DIR__ . '/auth.php';
