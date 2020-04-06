<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
	protected $table = 'categories';

	protected $fillable
		= [
			'title',
			'banner',
		];



	public function course()
	{
		return $this->hasMany('App\Course', 'category_id', 'id');
	}

	public function videos()
	{
		return $this->hasMany('App\Video', 'video_id', 'id');
	}
}
