<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Http\Controllers\Controller;
use App\Slide;
use Illuminate\Http\Request;


class HomeController extends Controller
{
	public function slide()
	{
		return Slide::where('published', 'Y')->get();
	}



	public function course()
	{
		return Course::where('publish', 'Y')->get();
	}



	public function theproduct($id)
	{
		return Course::findOrFail($id)->first();
	}


}
