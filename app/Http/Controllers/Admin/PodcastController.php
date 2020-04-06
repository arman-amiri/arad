<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Podcast\CreatePodcastRequest;
use App\Http\Requests\Podcast\UpdatePodcastRequest;
use App\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PodcastController extends Controller
{
	public function index()
	{
		$record = Podcast::paginate(2);

		return view('admin.podcast.index')
			->with('records', $record);
	}



	public function add()
	{
		return view('admin.podcast.add');
	}



	/**
	 * @param CreatePodcastRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function insert(CreatePodcastRequest $request)
	{

		$m              = new Podcast;
		$m->category_id = $request->input('category_id');
		$m->title       = $request->input('title');
		$m->publish     = $request->input('publish');
		$m->info        = $request->input('info');
		$m->duration    = $request->input('duration');
		$m->banner      = $request->file('banner')->store('', 'podcast-image');
		$m->podcast     = $request->file('podcast')->store('', 'podcast');


		$m->save();

		return redirect()->action('Admin\PodcastController@index')->with('inserted', true);
	}



	public function edit($id)
	{
		$record = Podcast::findOrFail($id);

		return view('admin.podcast.edit')
			->with('record', $record);
	}



	public function update(UpdatePodcastRequest $request)
	{


		$m              = Podcast::find($request->input('id'));
		$m->category_id = $request->input('category_id');
		$m->title       = $request->input('title');
		$m->info        = $request->input('info');
		$m->publish     = $request->input('publish');
		$m->duration    = $request->input('duration');

		if ($request->hasFile('banner'))
		{
			Storage::delete($m->banner, 'podcast');
			$m->banner = $request->file('banner')->store('', 'podcast-image');
		}

		if ($request->hasFile('podcast'))
		{
			Storage::delete($m->podcast, 'podcast');
			$m->podcast = $request->file('podcast')->store('', 'podcast');
		}

		$m->save();

		return redirect()->back()->with('updated', true);
	}



	public function remove($id)
	{

		$record = Podcast::findOrFail($id);
		return view('admin.podcast.remove')
			->with('record', $record);
	}



	public function delete(Request $r)
	{
		$m = Podcast::findOrFail($r->id);

		$m->delete();

		return redirect()->action('Admin\PodcastController@index')->with('deleted', true);
	}



	public function togglePublished($id)
	{
		$record = Podcast::findOrFail($id);

		$record->publish = $record->publish === 'Y' ? 'N' : 'Y';

		$record->save();

		return redirect()->back()->with('toggled', true);
	}


}