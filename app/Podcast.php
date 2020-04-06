<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @property mixed title
 * @property mixed category_id
 * @property mixed publish
 * @property mixed info
 * @property mixed duration
 * @property mixed banner
 * @property false|string podcast
 * @method static find($input)
 * @method static paginate(int $int)
 * @method static findOrFail($id)
 */
class Podcast extends Model
{


	const PUBLISH_Y = 'Y';
	const PUBLISH_N = 'N';
	const PUBLISH   = [self::PUBLISH_N, self::PUBLISH_Y];

	protected $table = 'podcasts';



	public function category()
	{
		return $this->belongsTo('App\Category', 'category_id', 'id');
	}
}
