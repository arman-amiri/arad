<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\slide\CreateRequest;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class SlideController extends Controller
{
	public function index()
	{
		$record = Slide::paginate(2);

		return view('admin.slide.index')
			->with('records', $record);
	}



	public function add()
	{
		return view('admin.slide.add');
	}



	/**
	 * @param CreateRequest $r
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function insert(CreateRequest $r)
	{


		$m            = new Slide;
		$m->title     = $r->input('title');
		$m->link      = $r->input('link');
		$m->published = $r->input('published');
		// $m->expiredAt = $r->input('expiredAt');


		if ($r->hasFile('image'))
		{
			$m->image = $r->file('image')->store('', 'slide');
		}

		$m->save();


		return redirect()->action('Admin\SlideController@index')->with('inserted', true);
	}



	public function edit($id)
	{
		$record = Slide::findOrFail($id);

		return view('admin.slide.edit')
			->with('record', $record);
	}



	public function update(Request $r)
	{
		$r->validate([
			'id'        => 'required|exists:slide,id',
			'title'     => 'required|max:255',
			'link'      => 'required|max:1000',
			'published' => 'required|in:Y,N',
			// 'expiredAt' => 'required|date',
			'image'     => 'nullable',
		]);

		$m = Slide::find($r->input('id'));

		$m->title     = $r->input('title');
		$m->link      = $r->input('link');
		$m->published = $r->input('published');
		// $m->expiredAt = $r->input('expiredAt');

		if ($r->hasFile('image'))
		{
			Storage::delete($m->image, 'slide');
			$m->image = $r->file('image')->store('', 'slide');

		}

		$m->save();

		return redirect()->back()->with('updated', true);
	}



	public function remove($id)
	{

		$record = Slide::findOrFail($id);
		return view('admin.slide.remove')
			->with('record', $record);
	}



	public function delete(Request $r)
	{
		$m = Slide::findOrFail($r->id);

		/* $m->comments()->delete();*/

		$m->delete();

		return redirect()->action('Admin\SlideController@index')->with('deleted', true);
	}



	/*public function comments($id)
	{
		$record = Product::findOrFail($id);

		return view('admin.product.comments')
			->with('record', $record);
	}*/


	public function togglePublished($id)
	{
		$record = Slide::findOrFail($id);

		$record->published = $record->published === 'Y' ? 'N' : 'Y';

		$record->save();

		return redirect()->back()->with('toggled', true);
	}


	//    public function togglePublished($id)
	//    {
	//        $record = Post::findOrFail($id);
	//
	//        $record->published = $record->published === 'Y' ? 'N' : 'Y';
	//
	//        $record->save();
	//
	//        return redirect()->back()->with('toggled', true);
	//    }


}