<?php


use Illuminate\Support\Facades\Route;


Route::middleware('auth')->prefix('admin')->group(function()
{
	Route::prefix('users')->group(function()
	{
		Route::get('index', 'Admin\UserController@index');
		Route::get('add', 'Admin\UserController@add');
		Route::Post('insert', 'Admin\UserController@insert');
		Route::get('edit/{id}', 'Admin\UserController@edit');
		Route::post('update', 'Admin\UserController@update');
		Route::get('remove/{id}', 'Admin\UserController@remove');
		Route::post('delete', 'Admin\UserController@delete');
	});

	Route::prefix('home')->group(function()
	{
		Route::prefix('categories')->group(function()
		{
			Route::get('index', 'Admin\CategoryController@index');
			Route::get('add', 'Admin\CategoryController@add');
			Route::post('insert', 'Admin\CategoryController@insert');
			Route::get('edit/{id}', 'Admin\CategoryController@edit');
			Route::post('update', 'Admin\CategoryController@update');
			Route::get('remove/{id}', 'Admin\CategoryController@remove');
			Route::post('delete', 'Admin\CategoryController@delete');
			Route::get('deleteImage', 'Admin\CategoryController@deleteImage');
			Route::get('togglePublished/{id}', 'Admin\CategoryController@togglePublished');
		});

		Route::prefix('courses')->group(function()
		{
			Route::get('index', 'Admin\CourseController@index');
			Route::get('add', 'Admin\CourseController@add');
			Route::post('insert', 'Admin\CourseController@insert');
			Route::get('edit/{id}', 'Admin\CourseController@edit');
			Route::post('update', 'Admin\CourseController@update');
			Route::get('remove/{id}', 'Admin\CourseController@remove');
			Route::post('delete', 'Admin\CourseController@delete');
			Route::get('deleteImage', 'Admin\CourseController@deleteImage');
			Route::get('togglePublished/{id}', 'Admin\CourseController@togglePublished');
		});

		Route::prefix('videos')->group(function()
		{
			Route::get('index', 'Admin\VideoController@index');
			Route::get('add', 'Admin\VideoController@add');
			Route::post('insert', 'Admin\VideoController@insert');
			Route::get('edit/{id}', 'Admin\VideoController@edit');
			Route::post('update', 'Admin\VideoController@update');
			Route::get('remove/{id}', 'Admin\VideoController@remove');
			Route::post('delete', 'Admin\VideoController@delete');
			Route::get('deleteImage', 'Admin\VideoController@deleteImage');
			Route::get('togglePublished/{id}', 'Admin\VideoController@togglePublished');
		});

		Route::prefix('podcasts')->group(function()
		{
			Route::get('index', 'Admin\PodcastController@index');
			Route::get('add', 'Admin\PodcastController@add');
			Route::post('insert', 'Admin\PodcastController@insert');
			Route::get('edit/{id}', 'Admin\PodcastController@edit');
			Route::post('update', 'Admin\PodcastController@update');
			Route::get('remove/{id}', 'Admin\PodcastController@remove');
			Route::post('delete', 'Admin\PodcastController@delete');
			Route::get('deleteImage', 'Admin\PodcastController@deleteImage');
			Route::get('togglePublished/{id}', 'Admin\PodcastController@togglePublished');
		});

		Route::prefix('articles')->group(function()
		{
			Route::get('index', 'Admin\ArticleController@index');
			Route::get('add', 'Admin\ArticleController@add');
			Route::post('insert', 'Admin\ArticleController@insert');
			Route::get('edit/{id}', 'Admin\ArticleController@edit');
			Route::post('update', 'Admin\ArticleController@update');
			Route::get('remove/{id}', 'Admin\ArticleController@remove');
			Route::post('delete', 'Admin\ArticleController@delete');
			Route::get('deleteImage', 'Admin\ArticleController@deleteImage');
			Route::get('togglePublished/{id}', 'Admin\ArticleController@togglePublished');
		});

		Route::prefix('slides')->group(function()
		{
			Route::get('index', 'Admin\SlideController@index');
			Route::get('add', 'Admin\SlideController@add');
			Route::post('insert', 'Admin\SlideController@insert');
			Route::get('edit/{id}', 'Admin\SlideController@edit');
			Route::post('update', 'Admin\SlideController@update');
			Route::get('remove/{id}', 'Admin\SlideController@remove');
			Route::post('delete', 'Admin\SlideController@delete');
			Route::get('deleteImage', 'Admin\SlideController@deleteImage');
			Route::get('togglePublished/{id}', 'Admin\SlideController@togglePublished');
		});
	});
});



Route::get('/', 'Admin\PageController@index');
Route::get('login', 'Admin\PageController@login')->name('login');
Route::post('auth', 'Admin\PageController@auth')->name('auth');
Route::get('logout', 'Admin\PageController@logout');