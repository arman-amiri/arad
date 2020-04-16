<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;

class FinancialTransactionsController extends Controller
{
	public function successful()
	{
		$record = Payment::with('user')->where('payment' , 1)->paginate(10);
		return view('admin.financialTransactions.index')
			->with('records', $record);
	}

	public function unsuccessful()
	{
		$record = Payment::with('user')->where('payment' , 0)->paginate(10);
		return view('admin.financialTransactions.index')
			->with('records', $record);
	}

	public function remove($id)
	{
		$record = Payment::findOrFail($id);
		return view('admin.financialTransactions.remove')
			->with('record', $record);
	}

	public function delete(Request $r)
	{
		$m = Payment::findOrFail($r->id);

		$m->delete();

		return redirect()->action('Admin\ArticleController@index')->with('deleted', true);
	}



}
