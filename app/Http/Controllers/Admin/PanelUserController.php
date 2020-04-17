<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PanelUser\CreateUserRequest;
use App\Http\Requests\PanelUser\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class PanelUserController extends Controller
{
	public function index()
	{
		$records = User::where('level', 'user')->Paginate(8);

		return view('admin.users.index')
			->with('records', $records);

	}



	public function add()
	{
		return view('admin.users.add');
	}



	public function insert(CreateUserRequest $request)
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

		return redirect()->action('Admin\PanelUserController@index')->with('inserted', true);
	}



	public function edit($id)
	{
		$record = User::where('level', 'user')->findOrFail($id);

		return view('admin.users.edit')
			->with('record', $record);
	}



	public function update(UpdateUserRequest $request)
	{

		$m = User::where('level', 'user')->find($request->id);

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

		return view('admin.users.delete')
			->with('record', $record);
	}



	public function delete(Request $request)
	{
		$m = User::findOrFail($request->id);


		$m->delete();

		return redirect()->action('Admin\PanelUserController@index')->with('deleted', true);
	}
}
