<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
	protected $table = 'payments';



	public function scopeSpanningPayment($query, $month, $payment)
	{
		$query->selectRaw('monthname(created_at) month , count(*) published')
			->where('created_at', '>', Carbon::now()->subMonth($month))
			->wherePayment($payment)
			->groupBy('month')
			->latest();
	}
}
