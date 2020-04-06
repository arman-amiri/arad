<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PageController extends Controller
{
	public function index()
	{
		Auth::logout();
		return view('auth.login');
	}



	public function login()
	{
		return view('auth.login');
	}



	public function auth(Request $r)
	{
		$r->validate([
			'email'    => 'required',
			'password' => 'required',
			// 'g-recaptcha-response' => 'required|captcha',
		]);
		//
		$user = User::where('email', $r->input('email'))
			->where('expired_at', '>', date('Y-m-d H:i:s'))
			->first();
		// dd($user);

		if (!$user)
		{

			return redirect()->back()->with('error', true);
		}

		if (Auth::attempt(['email' => $r->input('email'), 'password' => $r->input('password')]))
		{

			return redirect()->action('Admin\UserController@index');
		}

		return redirect()->back()->with('error', true);
	}
}
