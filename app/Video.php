<?php
/**
 * Created by PhpStorm.
 * User: COMPUTER SHAHR
 * Date: 4/2/2020
 * Time: 12:34 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;


/**
 * @property mixed category_id
 * @property mixed duration
 * @property mixed info
 * @property mixed publish
 * @property mixed banner
 * @property mixed title
 * @property mixed course_id
 * @property mixed user_id
 * @property false|string video
 * @property string slug
 */
class Video extends Model
{
	protected $table = 'videos';

	const PUBLISH_Y = 'Y';
	const PUBLISH_N = 'N';
	const PUBLISH   = [self::PUBLISH_N, self::PUBLISH_Y];



	public function category()
	{
		return $this->belongsTo('App\Category', 'category_id', 'id');
	}



	public function course()
	{
		return $this->belongsTo('App\Course', 'course_id', 'id');
	}

	public function users()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
}