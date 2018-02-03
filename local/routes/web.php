<?php

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
Route::get('test', function() {
	return view('test');
});

Route::get('/', 'HomeController@getHome');

Route::get('login', 'LoginController@getLogin')->name('login')->middleware('guest');
Route::post('login', 'LoginController@postLogin')->name('postLogin');
Route::get('login/facebook', 'LoginController@redirectToProvider')->name('login_with_facebook');
Route::get('login/facebook/callback', 'LoginController@handleProviderCallback');
Route::get('register', 'LoginController@getRegister')->name('register')->middleware('guest');
Route::post('register', 'LoginController@postRegister')->name('postRegister');
Route::get('logout', 'LoginController@getLogout')->name('logout');

Route::get('home', 'HomeController@getHome')->name('home');
Route::get('search', 'HomeController@seach')->name('search');
Route::get('search/ajax', 'HomeController@seachAjax')->name('searchAjax');
Route::get('about', 'HomeController@getAbout')->name('about');

Route::get('list/ajax', 'HomeController@getListPostAjax')->name('pages.listPost.ajax');

// Get list post by category
Route::get('list/category/{idCate}', 'HomeController@getListPostByCate')->name('pages.listPost.bycate');
// Get list post by category in ajax
Route::get('list/category/ajax/{idCate}', 'HomeController@getListPostByCateAjax')->name('pages.listPost.bycateAjax');

// Get list post by ChuDe
Route::get('list/chude/{idChuDe}', 'HomeController@getListPostByChuDe')->name('pages.listPost.byChuDe');
// Get list post by chude in ajax
Route::get('list/chude/ajax/{idChuDe}', 'HomeController@getListPostByChuDeAjax')->name('pages.listPost.byChuDeAjax');

Route::group(['prefix' => 'user'], function() {
	// Get information of user has ID
	Route::get('info/{id}', 'HomeController@getInfoUser')->name('pages.user.info');
	Route::get('edit/password', 'HomeController@getEditPasswordUser')->name('pages.user.edit.password');
	Route::post('edit/password', 'HomeController@postEditPasswordUser')->name('pages.user.edit.password');
	Route::get('edit/info', 'HomeController@getEditInfoUser')->name('pages.user.edit.info');
	Route::post('edit/info', 'HomeController@postEditInfoUser')->name('pages.user.edit.info');
});

// Home route...
Route::get('post/detail/{id}', 'PostController@getDetailPost')->name('post.detail');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('home', 'Admin\AdminController@getHomeAmin')->name('admin.home');
	Route::group(['prefix' => 'user'], function() {

		// List user
		Route::get('list', 'Admin\AdminController@getListUser')->name('admin.user.list');
		Route::get('list/ajax',	'Admin\AdminController@getListUserAjax')->name('admin.user.list.ajax');

		// Set Admin
		Route::get('setadmin/{id}', 'Admin\AdminController@getSetAdmin')->name('admin.user.setadmin');

		// Cancel Admin
		Route::get('canceladmin/{id}', 'Admin\AdminController@getCancelAdmin')->name('admin.user.cancelAdmin');

		// Delete user
		Route::get('delete/{id}', 'Admin\AdminController@getDelete')->name('admin.user.delete');

		// Edit user
		Route::get('edit/{id}', 'Admin\AdminController@getEditUser')->name('admin.user.edit');
		Route::post('edit/{id}', 'Admin\AdminController@postEditUser')->name('admin.user.postEdit');
	});


	Route::group(['prefix' => 'post'], function() {

		// List post
		Route::get('list', 'PostController@getListPost')->name('admin.post.list');
		Route::get('list/ajax', 'PostController@getListPostAjax')->name('admin.post.list.ajax');

		// Add post
		Route::get('add', 'PostController@getAddPost')->name('admin.post.add');
		Route::post('add', 'PostController@postAddPost')->name('admin.post.add');

		// Edit
		Route::get('edit/{id}', 'PostController@getEditPost')->name('admin.post.edit');
		Route::post('edit/{id}', 'PostController@postEditPost')->name('admin.post.edit');

		// Delete
		Route::get('delete/{id}', 'PostController@getDeletePost')->name('admin.post.delete');
	});

	Route::group(['prefix' => 'category'], function() {
		Route::get('list', 'CategoryController@getListCate')->name('admin.cate.list');

		Route::get('add', 'CategoryController@getAddCate')->name('admin.cate.add');
		Route::post('add', 'CategoryController@postAddCate')->name('admin.cate.add');

		Route::get('edit/{id}', 'CategoryController@getEditCate')->name('admin.cate.edit');
		Route::post('edit/{id}', 'CategoryController@postEditCate')->name('admin.cate.edit');

		Route::get('delete/{id}', 'CategoryController@getDeleteCate')->name('admin.cate.delete');
	});

	Route::group(['prefix' => 'chude'], function() {
		Route::get('list', 'ChuDeController@getListChuDe')->name('admin.chude.list');

		Route::get('add', 'ChuDeController@getAddChuDe')->name('admin.chude.add');
		Route::post('add', 'ChuDeController@postAddChuDe')->name('admin.chude.add');

		Route::get('edit/{id}', 'ChuDeController@getEditChuDe')->name('admin.chude.edit');
		Route::post('edit/{id}', 'ChuDeController@postEditChuDe')->name('admin.chude.edit');

		Route::get('delete/{id}', 'ChuDeController@getDeleteChuDe')->name('admin.chude.delete');
	});

	Route::group(['prefix' => 'ajax'], function() {
		Route::get('chude/{idCate}', 'AjaxController@getChuDe')->name('admin.ajax.chude');
		Route::get('name-none-accent', 'AjaxController@getSlug')->name('admin.ajax.name_none_accent');
	});
});

Route::group(['prefix' => 'ajax'], function() {
	Route::get('check', 'AjaxController@checkUser');
});