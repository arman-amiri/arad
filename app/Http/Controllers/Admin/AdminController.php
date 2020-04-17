<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

	public function index()
	{
		$records = User::where('level', 'admin')->Paginate(8);

		return view('admin.admins.index')
			->with('records', $records);

	}



	public function add()
	{
		return view('admin.admins.add');
	}



	public function insert(CreateAdminRequest $request)
	{

		$m = new User;

		$m->name       = $request->input('name');
		$m->mobile     = $request->input('mobile');
		$m->active     = $request->input('active');
		$m->expired_at = $request->input('expired_at');
		$m->password   = Hash::make($request->input('password'));
		$m->level      = $request->input('level');

		if ($request->hasFile('avatar'))
		{
			$m->avatar = $request->file('avatar')->store('', 'userAvatar');
		}

		$m->save();

		return redirect()->action('Admin\AdminController@index')->with('inserted', true);
	}



	public function edit($id)
	{
		$record = User::where('level', 'admin')->findOrFail($id);

		return view('admin.admins.edit')
			->with('record', $record);
	}



	public function update(UpdateAdminRequest $request)
	{

		$m = User::where('level', 'admin')->find($request->id);

		$m->name       = $request->input('name');
		$m->mobile     = $request->input('mobile');
		$m->active     = $request->input('active');
		$m->expired_at = $request->input('expired_at');
		$m->level      = $request->input('level');

		if ($request->filled('password'))
		{
			$m->password = Hash::make($request->input('password'));
		}

		if ($request->hasFile('avatar'))
		{
			$address = public_path('images\\avatar' . '\\' . $m->avatar);
			if (file_exists($address))
			{
				unlink($address);
			}
			$m->avatar = $request->file('avatar')->store('', 'userAvatar');

		}

		$m->save();

		return redirect()->back()->with('updated', true);
	}



	public function remove($id)
	{
		$record = User::findOrFail($id);

		return view('admin.admins.delete')
			->with('record', $record);
	}



	public function delete(Request $request)
	{
		$m = User::findOrFail($request->id);


		$m->delete();

		return redirect()->action('Admin\AdminController@index')->with('deleted', true);
	}

}
