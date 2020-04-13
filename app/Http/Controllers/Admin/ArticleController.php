<?php

namespace App\Http\Controllers\Admin;


use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\CreateArticleRequest;
use App\Http\Requests\Article\updateArticleRequest;
use Illuminate\Http\Request;


class ArticleController extends Controller
{

	public function index()
	{
		$record = Article::paginate(7);

		return view('admin.article.index')
			->with('records', $record);
	}



	public function add()
	{
		return view('admin.article.add');
	}



	public function insert(CreateArticleRequest $request)
	{

		$m              = new Article;
		$m->category_id = $request->input('category_id');
		$m->user_id     = $request->input('user_id');
		$m->title       = $request->input('title');
		$m->article     = $request->input('article');
		$m->publish     = $request->input('publish');

		if ($request->hasFile('banner'))
		{
			$m->banner = $request->file('banner')->store('', 'article');
		}

		$m->save();

		return redirect()->action('Admin\ArticleController@index')->with('inserted', true);
	}



	public function edit($id)
	{
		$record = Article::findOrFail($id);

		return view('admin.article.edit')
			->with('record', $record);
	}



	public function update(updateArticleRequest $request)
	{

		$m = Article::find($request->input('id'));


		$m->category_id = $request->input('category_id');
		$m->user_id     = $request->input('user_id');
		$m->title       = $request->input('title');
		$m->article     = $request->input('article');
		$m->publish     = $request->input('publish');

		if ($request->hasFile('banner'))
		{
			$address = public_path('images\\articles' . '\\' . $m->banner);
			if (file_exists($address))
			{
				unlink($address);
			}
			$m->banner = $request->file('banner')->store('', 'article');
		}

		$m->save();

		return redirect()->back()->with('updated', true);
	}



	public function remove($id)
	{

		$record = Article::findOrFail($id);
		return view('admin.article.remove')
			->with('record', $record);
	}



	public function delete(Request $r)
	{
		$m = Article::findOrFail($r->id);

		$address = public_path('images\\articles' . '\\' . $m->banner);
		if (file_exists($address))
		{
			unlink($address);
		}

		$m->delete();

		return redirect()->action('Admin\ArticleController@index')->with('deleted', true);
	}



	public function togglePublished($id)
	{
		$record = Article::findOrFail($id);

		$record->publish = $record->publish === 'Y' ? 'N' : 'Y';

		$record->save();

		return redirect()->back()->with('toggled', true);
	}


}