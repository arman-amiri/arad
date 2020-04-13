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
		'uses' => 'Admin\UserController@changeEmail',
	]);
	$router->post('changeEmailSubmit', [
		'as'   => 'change.email.submit',
		'uses' => 'Admin\UserController@changeEmailSubmit',
	]);

	$router->match(['post', 'put'], 'changePassword', [
		'as'   => 'password.change',
		'uses' => 'Admin\UserController@changePassword',
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
