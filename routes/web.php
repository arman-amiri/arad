<?php


use Illuminate\Support\Facades\Route;


Route::middleware('auth')->prefix('admin')->group(function()
{
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

	Route::prefix('users')->group(function()
	{
		Route::prefix('user')->group(function()
		{
			Route::get('index', 'Admin\PanelUserController@index');
			Route::get('add', 'Admin\PanelUserController@add');
			Route::Post('insert', 'Admin\PanelUserController@insert');
			Route::get('edit/{id}', 'Admin\PanelUserController@edit');
			Route::post('update', 'Admin\PanelUserController@update');
			Route::get('remove/{id}', 'Admin\PanelUserController@remove');
			Route::post('delete', 'Admin\PanelUserController@delete');
		});

		Route::prefix('admins')->group(function()
		{
			Route::get('index', 'Admin\AdminController@index');
			Route::get('add', 'Admin\AdminController@add');
			Route::Post('insert', 'Admin\AdminController@insert');
			Route::get('edit/{id}', 'Admin\AdminController@edit');
			Route::post('update', 'Admin\AdminController@update');
			Route::get('remove/{id}', 'Admin\AdminController@remove');
			Route::post('delete', 'Admin\AdminController@delete');
		});
	});

	Route::prefix('financial')->group(function()
	{

			Route::get('successful', 'Admin\FinancialTransactionsController@successful');
			Route::get('unsuccessful', 'Admin\FinancialTransactionsController@unsuccessful');
			Route::get('remove/{id}', 'Admin\FinancialTransactionsController@remove');
			Route::post('delete', 'Admin\FinancialTransactionsController@delete');

	});


});


Route::group(['middleware' => ['auth:web']], function()
{
	Route::post('payment', 'ZarinPal\PaymentController@payment');
	Route::get('check', 'ZarinPal\PaymentController@check');
});

Route::get('/', 'Admin\PageController@index');
Route::get('login', 'Admin\PageController@login')->name('login');
Route::post('auth', 'Admin\PageController@auth')->name('auth');
Route::get('logout', 'Admin\PageController@logout');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']],
	function()
	{
		\UniSharp\LaravelFilemanager\Lfm::routes();
	});

