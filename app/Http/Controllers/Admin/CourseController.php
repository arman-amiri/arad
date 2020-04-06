<?php

namespace App\Http\Controllers\Admin;


use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CreateCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CourseController extends Controller
{
	public function index()
	{
		$record = Course::paginate(2);

		return view('admin.course.index')
			->with('records', $record);
	}



	public function add()
	{
		return view('admin.course.add');
	}



	/**
	 * @param CreateCourseRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function insert(CreateCourseRequest $request)
	{

		$m               = new Course;
		$m->title        = $request->input('title');
		$m->category_id  = $request->input('category_id');
		$m->price        = $request->input('price');
		$m->teacher_name = $request->input('teacher_name');
		$m->info         = $request->input('info');
		$m->type_holding = $request->input('type_holding');
		$m->banner       = $request->input('banner');
		$m->publish      = $request->input('publish');

		if ($request->hasFile('banner'))
		{
			$m->banner = $request->file('banner')->store('', 'course');
		}

		$m->save();

		return redirect()->action('Admin\CourseController@index')->with('inserted', true);
	}



	public function edit($id)
	{
		$record = Course::findOrFail($id);

		return view('admin.course.edit')
			->with('record', $record);
	}



	public function update(UpdateCourseRequest $request)
	{

		$m = Course::find($request->input('id'));

		$m->category_id  = $request->input('category_id');
		$m->title        = $request->input('title');
		$m->price        = $request->input('price');
		$m->teacher_name = $request->input('teacher_name');
		$m->info         = $request->input('info');
		$m->publish      = $request->input('publish');
		$m->banner       = $request->input('banner') ? $request->input('banner') : $m->banner;

		if ($request->hasFile('banner'))
		{
			$address = public_path('images\\course' . '\\' . $m->banner);
			if (file_exists($address))
			{
				unlink($address);
			}
			$m->banner = $request->file('banner')->store('', 'course');

		}

		$m->save();

		return redirect()->back()->with('updated', true);
	}



	public function remove($id)
	{

		$record = Course::findOrFail($id);
		return view('admin.course.remove')
			->with('record', $record);
	}



	public function delete(Request $r)
	{
		$m = Course::findOrFail($r->id);

		$address = public_path('images\\course' . '\\' . $m->banner);
		if (file_exists($address))
		{
			unlink($address);
		}

		$m->delete();

		return redirect()->action('Admin\CourseController@index')->with('deleted', true);
	}



	public function togglePublished($id)
	{
		$record = Course::findOrFail($id);

		$record->publish = $record->publish === 'Y' ? 'N' : 'Y';

		$record->save();

		return redirect()->back()->with('toggled', true);
	}


}