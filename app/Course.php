<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
	protected $table = 'courses';

	const PUBLISH_Y = 'Y';
	const PUBLISH_N = 'N';
	const PUBLISH   = [self::PUBLISH_Y, self::PUBLISH_N];

	const TYPE_HOLDING_VIRTUAL = 'v';
	const TYPE_HOLDING_PERSON  = 'P';
	const TYPE_HOLDING_WEBINAR = 'W';
	const TYPE_HOLDING = [self::TYPE_HOLDING_VIRTUAL, self::TYPE_HOLDING_PERSON, self::TYPE_HOLDING_WEBINAR];


	protected $fillable
		= [
			'category_id',
			'title',
			'info',
			'teacher_name',
			'banner',
			'price',
			'type_holding'
		];



	public function category()
	{
		return $this->belongsTo('App\Category', 'category_id', 'id');
	}
}
