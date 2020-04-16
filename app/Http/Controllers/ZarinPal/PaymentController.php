<?php

namespace App\Http\Controllers\ZarinPal;

use App\Course;
use App\Http\Controllers\Controller;
use App\Learn;
use App\Payment;
use Illuminate\Http\Request;
use SoapClient;


class PaymentController extends Controller
{
	protected $MerchantID = '099f6e4c-82fa-49e9-99ae-2bee9e4dd88b '; //Required



	public function payment(Request $request)
	{
		// dd($request->all());
		$request->validate([
			'course_id' => 'required',
		]);
		$course = Course::findOrfail(request('course_id'));

		//TODO::field type in Course table

		$price = $course->price;
		if ($price == 0 || $price == null)
		{
			auth()->user()->payments()->create([
				'authority' => 'free',
				'price'     => $price,
				'course_id' => $course->id,
				'user_id' => auth()->id(),
			]);
			//Todo:"تکمیل این بخش که اگر دوره رایگان بود ادامه نده دیگ"
			return view('admin.users.add');
		}


		$Description = $course->title;
		$Mobile      = auth()->user()->mobile;
		$CallbackURL = 'http://localhost/arad/public/check';


		$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

		$result = $client->PaymentRequest([

			'MerchantID'  => $this->MerchantID,
			'Amount'      => $price,
			'Description' => $Description,
			'Mobile'      => $Mobile,
			'CallbackURL' => $CallbackURL,

		]);


		//Redirect to URL You can do it also by creating a form
		if ($result->Status == 100)
		{
			auth()->user()->payments()->create([
				'authority' => $result->Authority,
				'price'     => $price,
				'course_id' => $course->id,
			]);

			return redirect('https://www.zarinpal.com/pg/StartPay/' . $result->Authority);
		}
		else
		{

			echo 'ERR: ' . $result->Status;
		}
	}



	public function check()
	{
		$Authority = \request('Authority');

		$payment = Payment::whereAuthority($Authority)->firstOrFail();

		$course = Course::findOrFail($payment->course_id);

		if (\request('Status') == 'OK')
		{
			$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

			$result = $client->PaymentVerification(
				[
					'MerchantID' => $this->MerchantID,
					'Authority'  => $Authority,
					'Amount'     => $payment->price,
				]
			);


			if ($result->Status == 100)
			{
				if ($this->addUserForLearning($payment, $course))
				{
					return 'عملیات مورد نظر با موفقیت انجام شد';
				}
				echo 'Transaction success. RefID:' . $result->RefID;
			}
			else
			{
				echo 'Transaction failed. Status:' . $result->Status;
			}


		}
	}



	protected function addUserForLearning($payment, $course)
	{
		$payment->update([
			'payment' => 1,
		]);
		Learn::create([
			'user_id'   => auth()->id(),
			'course_id' => $course->id,
		]);

		return true;
	}
}