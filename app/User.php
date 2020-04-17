<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use Laravel\Passport\HasApiTokens;
use App\Learn;


/**
 * @property mixed name
 * @property mixed mobile
 * @property mixed active
 * @property mixed expired_at
 * @property string password
 * @property mixed level
 * @property false|string avatar
 */
class User extends Authenticatable
{
	use Notifiable, HasApiTokens;

	protected $table = 'users';

	const LEVEL_ADMIN = 'admin';
	const LEVEL_USER  = 'user';
	const LEVELS      = [self::LEVEL_USER, self::LEVEL_ADMIN];


	const ACTIVE_YES = 'Y';
	const ACTIVE_NO = 'N';
	const ACTIVES = [self::ACTIVE_YES , self::ACTIVE_NO ];
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable
		= [
			'id',
			'email',
			'mobile',
			'name',
			'password',
			'level',
			'avatar',
			'verify_code',
			'verified_at',
		];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden
		= [
			'password',
			'verified_code',
		];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts
		= [
			'verified_at' => 'datetime',
		];



	/**
	 * find user with mobile or username
	 * @param $username
	 */
	public function findForPassport($username)
	{
		$user = static::where('mobile', $username)->orWhere('email', $username)->first();

		return $user;
	}



	public function setMobileAttribute($value)
	{
		$this->attributes['mobile'] = to_valid_mobile_number($value);
	}



	public function videos()
	{
		return $this->hasMany('App\Video', 'user_id', 'id');
	}



	public function payments()
	{
		return $this->hasMany('App\Payment', 'user_id', 'id');
	}



	protected function courseLearning($record)
	{

		$k = !!Learn::where('user_id', auth()->id())
			->where('course_id', $record->id)->first();

		return $k;
	}
}
