<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property mixed category_id
 * @property mixed user_id
 * @property mixed title
 * @property mixed article
 * @property mixed banner
 * @property mixed publish
 */
class Article extends Model
{
	use SoftDeletes;

	protected $table = 'articles';

	const PUBLISH_Y = 'Y';
	const PUBLISH_N = 'N';
	const PUBLISH   = [self::PUBLISH_Y, self::PUBLISH_N];


	protected $fillable
		= [
			'category_id',
			'user_id',
			'title',
			'article',
			'banner',
			'publish',
		];



	public function category()
	{
		return $this->belongsTo('App\Category', 'category_id', 'id');
	}



	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
}
