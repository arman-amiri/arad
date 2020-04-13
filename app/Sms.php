<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use nusoap_client;


class Sms extends Model
{
	public function config()
	{
		$config['acount']
			= [
			'Username' => 'code meli',
			'Password' => 'inoti password',
			'UssdCode' => 'ussd code',
		];
		$config['ussdMenu']
			= [
			"ورود به سامانه پرداخت",
			"پیگیری پرداخت",
		];
		$config['sms']
			= [
			'Username' => $config['acount']['Username'],
			'Password' => $config['acount']['Password'],
			'LineNo'   => '20009511',
		];

		$config['db']
			= [
			'host' => '192.168.1.1',
			'user' => 'root',
			'pass' => 'db pass',
			'name' => 'db name',
		];
	}


	//تابع ارسال اس ام اس
	//نکته: برای استفاده از این سرویس باید شماره ملی را به عنوان یوزرنیم معرفی کنید
	public function sendSMS($mobile , $message)
	{
		$wsdl = "https://login.inoti.com/_services/iNOTISMS.asmx?wsdl";


		$param = array(
			'UserName'=>'0520016289',
			'Password'=>'apre3438',
			'LineNo'=>'20009511',
			'MobileNumber'=>$mobile,
			'Message'=>$message
		);

		$client = new nusoap_client($wsdl, 'WSDL');

		$client->soap_defencoding = 'UTF-8';
		$client->decode_utf8 = false;
		$response = $client->call('SendSingleSMS', $param);
		$client->getError();
		return $response;
	}
}
