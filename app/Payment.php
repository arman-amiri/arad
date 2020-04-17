<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
	protected $table = 'payments';

	protected $perPage = 5;

	protected $fillable
		= [
			'course_id',
			'user_id',
			'authority',
			'price',

		];



	public  function whereAuthority($Authority)
	{
		return $this->where('authority' , $Authority)->first();
	}



	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}



	// public function scopeSpanningPayment($query, $month, $payment)
	// {
	// 	$query->selectRaw('monthname(created_at) month , count(*) published')
	// 		->where('created_at', '>', Carbon::now()->subMonth($month))
	// 		->wherePayment($payment)
	// 		->groupBy('month')
	// 		->latest();
	// }
}
