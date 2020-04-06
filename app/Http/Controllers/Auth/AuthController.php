<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\UserAlreadyRegisteredException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\RegisterVerifyRequest;
use App\Http\Requests\Auth\ResendVerificationCodeRequest;
use App\Services\UserService;


class AuthController extends Controller
{
	/**
	 * ثبت نام کاربر
	 * @param RegisterRequest $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
	 * @throws UserAlreadyRegisteredException
	 */
	public function register(RegisterRequest $request)
	{

		return UserService::register($request);

	}



	/**
	 * تایید کد فعال سازی کاربر
	 * @param RegisterVerifyRequest $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
	public function registerVerify(RegisterVerifyRequest $request)
	{
		return UserService::registerVerify($request);
	}



	/**
	 * ارسال مجدد کد فعال سازی به کاربر
	 * @param ResendVerificationCodeRequest $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
	public function resendVerificationCode(ResendVerificationCodeRequest $request)
	{
		return UserService::resendVerificationCode($request);

	}
}
