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
	protected $MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX'; //Required



	public function payment(Request $request)
	{
		$request->validate([
			'course_id' => 'required',
		]);

		$course = Course::findOrfail(request('course_id'));
		//TODO::field type in Course table
		if ($course->price == 0)
		{
			return 'این دوره قابل خریداری توسط شما نیست';
		}

		$price = $course->price;

		$Description = 'توضیحات تراکنش تستی';
		$Email       = auth()->user()->email;
		$CallbackURL = 'http://localhost/course/payment/check';


		$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

		$result = $client->PaymentRequest(
			[
				'MerchantID'  => $this->MerchantID,
				'Amount'      => $price,
				'Description' => $Description,
				'Email'       => $Email,
				// 'Mobile' => $Mobile,
				'CallbackURL' => $CallbackURL,
			]
		);


		//Redirect to URL You can do it also by creating a form
		if ($result->Status == 100)
		{
			auth()->user()->payments()->create([
				'resnumber' => $result->Authority,
				'price'     => $price,
				'course_id' => $course->id,
			]);

			return redirect('Location: https://www.zarinpal.com/pg/StartPay/' . $result->Authority);
		}
		else
		{
			echo 'ERR: ' . $result->Status;
		}
	}



	public function check()
	{
		$Authority = \request('Authority');

		$payment = Payment::whereResnumber($Authority)->firstOrFail();

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
					return redirect($course->path())->with('alert', 'عملیات مورد نظر با موفقیت انجام شد');
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