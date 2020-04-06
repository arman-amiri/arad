<?php

namespace App\Http\Controllers\Admin;


use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
	public function index()
	{
		$record = Category::paginate(4);

		return view('admin.category.index')
			->with('records', $record);
	}



	public function add()
	{
		return view('admin.category.add');
	}



	/**
	 * @param CreateCategoryRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function insert(CreateCategoryRequest $request)
	{


		$m         = new Category;
		$m->title  = $request->input('title');
		$m->banner = $request->file('banner');


		if ($request->hasFile('banner'))
		{
			$m->banner = $request->file('banner')->store('', 'category');
		}

		$m->save();


		return redirect()->action('Admin\CategoryController@index')->with('inserted', true);
	}



	public function edit($id)
	{
		$record = Category::findOrFail($id);

		return view('admin.category.edit')
			->with('record', $record);
	}



	public function update(UpdateCategoryRequest $request)
	{


		$m        = Category::find($request->input('id'));
		$m->title = $request->input('title');

		if ($request->hasFile('banner'))
		{
			$address = public_path('images\\category' . '\\' . $m->banner);
			if (file_exists($address))
			{
				unlink($address);
			}
			$m->banner = $request->file('banner')->store('', 'category');

		}
		$m->save();

		return redirect()->back()->with('updated', true);
	}



	public function remove($id)
	{

		$record = Category::findOrFail($id);
		return view('admin.category.remove')
			->with('record', $record);
	}



	public function delete(Request $request)
	{

		$m = Category::findOrFail($request->id);

		$address = public_path('images\\category' . '\\' . $m->banner);
		if (file_exists($address))
		{
			unlink($address);
		}


		$m->delete();

		return redirect()->action('Admin\CategoryController@index')->with('deleted', true);
	}


}