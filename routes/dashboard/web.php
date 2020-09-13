<?php


Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){

  Route::prefix('dashboard')->middleware(['auth'])->name('dashboard.')->group(function(){

      Route::get('/', 'DashboardController@index')->name('index');

			// users routes
			Route::resource('users', 'UserController')->except(['show']);

			// categories routes
			Route::resource('categories', 'CategoryController')->except(['show']);

			// products routes
			Route::resource('products', 'ProductController')->except(['show']);
			Route::get('/test', function(){
			  return view('site.index');
			});
			Route::get('/test1', function(){
			  return view('site.home');
			});
  });
});
