<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Video\UpdateVideoRequest;
use App\Http\Requests\Video\UploadVideoRequest;
use App\Video;
use FFM;
use FFMpeg\Filters\Audio\CustomFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Pbmedia\LaravelFFMpeg\FFMpegFacade;
use Pbmedia\LaravelFFMpeg\Media;


class VideoController extends Controller
{


	public function index()
	{
		$record = Video::paginate();
		return view('admin.video.index')
			->with('records', $record);
	}



	public function add()
	{
		return view('admin.video.add');
	}



	public function insert(UploadVideoRequest $request)
	{
		$m              = new Video;
		$m->category_id = $request->input('category_id');
		$m->course_id   = $request->input('course_id');
		$m->user_id     = $request->input('user_id');
		$m->title       = $request->input('title');
		$m->info        = $request->input('info');
		$m->publish     = $request->input('publish');
		$m->duration    = $request->input('duration');
		$m->slug        = '123456';
		$m->video       = $request->file('video')->store('', 'videos');

		if ($request->hasFile('banner'))
		{
			$m->banner = $request->file('banner')->store("{$m->id}", 'video-image');
		}
		$m->save();

		$slug    = uniqueId($m->id);
		$m->slug = $slug;


		/** @var Media $video */
		$video       = FFMpegFacade::fromDisk('videos')->open($m->video);
		$m->duration = $video->getDurationInSeconds();

		$m->save();

		return redirect()->action('Admin\VideoController@index')->with('inserted', true);
	}



	public function edit($id)
	{
		$record = Video::findOrFail($id);

		return view('admin.video.edit')
			->with('record', $record);
	}



	public function update(UpdateVideoRequest $request)
	{


		$m              = Video::find($request->input('id'));
		$m->category_id = $request->input('category_id');
		$m->course_id   = $request->input('course_id');
		$m->user_id     = $request->input('user_id');
		$m->title       = $request->input('title');
		$m->info        = $request->input('info');
		$m->publish     = $request->input('publish');


		if ($request->hasFile('banner'))
		{
			$address = public_path('images\\videos' . '\\' . $m->banner);

			if (file_exists($address))
			{
				unlink($address);
			}
			$m->banner = $request->file('banner')->store('', 'video-image');
		}

		if ($request->hasFile('video'))
		{
			$address = public_path('videos' . '\\' . $m->video);

			if (file_exists($address))
			{
				unlink($address);
			}
			$m->video = $request->file('video')->store('', 'videos');
		}

		$video       = FFMpegFacade::fromDisk('videos')->open($m->video);
		$m->duration = $video->getDurationInSeconds();


		$m->save();
		return redirect()->back()->with('updated', true);
	}



	public function remove($id)
	{

		$record = Video::findOrFail($id);
		return view('admin.video.remove')
			->with('record', $record);
	}



	public function delete(Request $r)
	{
		$m = Video::findOrFail($r->id);


		$address  = public_path('images\\videos' . '\\' . $m->banner);
		$address1 = public_path('videos' . '\\' . $m->video);

		if (file_exists($address))
		{
			unlink($address);
		}
		if (file_exists($address1))
		{
			unlink($address1);
		}


		$m->delete();

		return redirect()->action('Admin\VideoController@index')->with('deleted', true);
	}



	public function togglePublished($id)
	{
		$record = Video::findOrFail($id);

		$record->publish = $record->publish === 'Y' ? 'N' : 'Y';

		$record->save();

		return redirect()->back()->with('toggled', true);
	}

}
