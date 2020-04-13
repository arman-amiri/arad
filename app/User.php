<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
	use Notifiable, HasApiTokens;

	protected $table = 'users';

	const TYPE_ADMIN = 'admin';
	const TYPE_USER  = 'user';
	const TYPES      = [self::TYPE_USER, self::TYPE_ADMIN];

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
			'type',
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
}
