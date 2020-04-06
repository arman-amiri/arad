<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ChangeEmailRequest;
use App\Http\Requests\User\ChangeEmailSubmitRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Services\UserService;
use App\User;


class UserController extends Controller
{


	public function index()
	{
		$records = User::Paginate(10);

		return view('admin.users.index')
			->with('records', $records);

	}

	public function add()
	{
		return view('admin.users.add');
	}


	/**
	 *  تغییر ایمیل کاربر
	 * @param ChangeEmailRequest $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
	public function changeEmail(ChangeEmailRequest $request)
	{
		return UserService::ChangeEmail($request);
	}


	/**
	 * تایید تغییر ایمیل کاربر
	 * @param ChangeEmailSubmitRequest $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
	public function changeEmailSubmit(ChangeEmailSubmitRequest $request)
	{
		return UserService::changeEmailSubmit($request);
	}


	public function changePassword(ChangePasswordRequest $request)
	{

		return UserService::changePassword($request);
	}

}