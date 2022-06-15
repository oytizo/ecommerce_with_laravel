Route::get('/', function () {
    return view('backend.admindashboard');
})->name('/');

Route::group(['prefix'=>'admin'],function(){
Route::group(['prefix'=>'product'],function(){
    Route::get('/create','App\Http\Controllers\Backend\ProductController@create')->name('createproduct');
    Route::post('/insert','App\Http\Controllers\Backend\ProductController@store')->name('insert');
    Route::get('/manage','App\Http\Controllers\Backend\ProductController@index')->name('manage');
    Route::get('/edit/{id}','App\Http\Controllers\Backend\ProductController@show')->name('productedit');
    Route::post('/update/{id}','App\Http\Controllers\Backend\ProductController@update')->name('update');
    Route::get('/delete/{id}','App\Http\Controllers\Backend\ProductController@delete')->name('delete');

});

Route::group(['prefix'=>'category'],function(){
    Route::get('/showcategory','App\Http\Controllers\Backend\CategoryController@showcategory')->name('showcategory');
    Route::post('/catinsert','App\Http\Controllers\Backend\CategoryController@store')->name('catinsert');
    Route::get('/catmanage','App\Http\Controllers\Backend\CategoryController@index')->name('catmanage');
    Route::get('/catedit/{id}','App\Http\Controllers\Backend\CategoryController@catedit')->name('catedit');
    Route::post('/catupdate/{id}','App\Http\Controllers\Backend\CategoryController@update')->name('catupdate');
    Route::get('/deletecat/{id}','App\Http\Controllers\Backend\CategoryController@deletecat')->name('deletecat');

});
})