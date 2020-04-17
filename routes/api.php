<?php

use Illuminate\Http\Request;


/**
 * روت های مربوط به auth رو نگهداری میکنه
 */


Route::group([], function($router)
{
	$router->group(['namespace' => '\Laravel\Passport\Http\Controllers'], function($router)
	{
		$router->post('login', [
			'as'         => 'login',
			'middleware' => ['throttle'],
			'uses'       => 'AccessTokenController@issueToken',
		]);
	});


	$router->post('register', [
		'as'   => 'user.register',
		'uses' => 'Auth\authController@register',
	]);
	$router->post('registerVerify', [

		'as'   => 'user.register.verify',
		'uses' => 'Auth\authController@registerVerify',
	]);
	$router->post('resendVerificationCode', [

		'as'   => 'user.register.resend.verification.code',
		'uses' => 'Auth\authController@resendVerificationCode',
	]);
});


/**
 * روت های مربوط به user رو نگهداری میکنه
 */
Route::group(['middleware' => 'auth:api'], function($router)
{
	$router->post('changeEmail', [
		'as'   => 'change.email',
		'uses' => 'Api\UserController@changeEmail',
	]);
	$router->post('changeEmailSubmit', [
		'as'   => 'change.email.submit',
		'uses' => 'Api\UserController@changeEmailSubmit',
	]);

	$router->match(['post', 'put'], 'changePassword', [
		'as'   => 'password.change',
		'uses' => 'Api\UserController@changePassword',
	]);
});


/**
 * روت های ویدیو
 */
Route::group(['middleware' => 'auth:api', 'prefix' => '/video'], function($router)
{
	$router->post('/video', [
		'as'   => 'video.upload',
		'uses' => 'Admin\VideoController@upload',
	]);
});


Route::prefix('home')->group(function()
{
	Route::get('slides', 'Api\HomeController@slide');
	Route::get('courses', 'Api\HomeController@course');
	Route::get('courses/{id}', 'Api\HomeController@theproduct');
});

Route::prefix('zarinpal')->group(function()
{
	Route::get('payment', 'Api\ZarinpalController@payment');
	Route::get('check', 'Api\ZarinpalController@check');

});