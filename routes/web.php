<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

Route::namespace('Admin')->prefix('admin')->middleware('auth', 'verified')->group(function(){
	Route::namespace('User')->prefix('user')->group(function(){
		
		Route::prefix('ad_users')->group(function(){
			Route::post('delmore', 'ADUserController@delMore')->name('ad_users.dellmore');
			Route::post('active', 'ADUserController@active')->name('ad_users.active');
			Route::post('search', 'ADUserController@search')->name('ad_users.search');
		});
		Route::resource('ad_users', 'ADUserController');
		
		Route::resource('ad_users', 'ADRoleController');
	});
	// ENTRUST
	Route::namespace('Entrust')->prefix('entrust')->group(function(){
		Route::resource('ad_roles', 'ADRoleController');
		Route::resource('ad_permissions', 'ADPermissionController');
	});

	Route::namespace('ADCategory')->prefix('category')->group(function(){
		Route::resource('ad_categories', 'ADCategoryController');
		Route::prefix('ad_categories')->group(function(){
			Route::post('active', 'ADCategoryController@active')->name('ad_categories.active');
			Route::post('search', 'ADCategoryController@search')->name('ad_categories.search');
		});
	});
	// datatables
	Route::namespace('Article')->prefix('article')->group(function(){
		Route::prefix('ad_articles')->group(function(){
			Route::get('datatables', 'ADArticleController@data')->name('ad_articles.datatables');
		});
		Route::resource('ad_articles', 'ADArticleController');
	});
	// laravel scout & algolia  fulltext search
	Route::namespace('FullTextSearch')->prefix('full-text-search')->group(function(){
		Route::get('search', 'ADFtsController@search')->name('ad_fts.search');
		Route::post('search', 'ADFtsController@search')->name('ad_fts.search');
		// ajax search
		Route::get('', 'ADFtsController@ajax')->name('ad_fts.ajax');
		// add
		Route::get('create', 'ADFtsController@create')->name('ad_fts.create');
		Route::post('store', 'ADFtsController@store')->name('ad_fts.store');
	});
	
});


