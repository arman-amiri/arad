<?php


namespace App\Services;


use App\Exceptions\UserAlreadyRegisteredException;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\RegisterVerifyRequest;
use App\Http\Requests\Auth\ResendVerificationCodeRequest;
use App\Http\Requests\User\ChangeEmailRequest;
use App\Http\Requests\User\ChangeEmailSubmitRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Sms;
use App\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class UserService extends BaseService
{

	const CHANGE_EMAIL_CACHE_KEY = 'change.email.for.user.';



	public static function register(RegisterRequest $request)
	{

		$field = $request->getFiledName();
		$value = $request->getFieldValue();
		//اگر کاربر از قبل ثبت نام کرده باشد باید روال ثبت نام را قطع کنیم.
		if ($user = User::where($field, $value)->first())
		{
			//اگر کاربر از قبل ثبت نام کرده ابشع باید بهش خطا بدیم
			if ($user->verified_at)
			{
				throw new UserAlreadyRegisteredException('شما قبلا ثبت نام کرده اید.');
			}
			return response(['message' => 'کد فعالسازی قبلا برای شما ارسال شده.'], 200);
		}

		$code = random_verification_code();
		$user = User::create([

			$field        => $value,
			'verify_code' => $code,
		]);


		//TODO:send email or sms to user
		Log::info('SEND-REGISTER-CODE-MESSAGE-TO-USER', ['code' => $code]);


		return response(['message' => 'کاربر ثبت موقت شد'], 200);


		return redirect()->action('Admin\UserController@index')->with('inserted', true);
	}



	public static function registerVerify(RegisterVerifyRequest $request)
	{

		$field = $request->has('email') ? 'email' : 'mobile';
		$code  = request()->code;

		$user = User::where([
			$field        => $request->input($field),
			'verify_code' => $code,
		])->first();

		if (empty($user))
		{
			throw new ModelNotFoundException('کاربری با اطلاعات مورد نظر پیدا نشد');
		}


		$user->verify_code = null;
		$user->verified_at = now();
		$user->save();

		return response($user, 200);
	}



	public static function resendVerificationCode(ResendVerificationCodeRequest $request)
	{
		$field = $request->getFiledName();
		$value = $request->getFieldValue();

		$user = User::where($field, $value)->whereNull('verified_at')->first();


		if (!empty($user))
		{
			$dateDiff = now()->diffInMinutes($user->updated_at);

			//اگر زمان مورد نظر از ارسال کد قبلی گزشته بود مجددا کد جدید ارسال میکنیم
			if ($dateDiff >= config('auth.resend_verification_code_time_diff_in_minutes', 60))
			{
				$user->verify_code = random_verification_code();
				$user->save();
			}

			//TODO:send email or sms to user
			Log::info('RESEND-REGISTER-CODE-MESSAGE-TO-USER', ['code' => $user->verify_code]);

			return response([
				'message' => 'کد مجددا برای شما ارسال گردید.',
			], 200);
		}

		throw new ModelNotFoundException('کاربری با این مشخصات یافت نشد یا قبلا فعال سازی شده است.');


	}



	public static function ChangeEmail(ChangeEmailRequest $request)
	{


		try
		{
			$email       = $request->email;
			$userId      = auth()->id();
			$code        = random_verification_code();
			$excpireDate = now()->addMinutes(config('auth.change_email_cache_expiration', 1440));

			Cache::put(self::CHANGE_EMAIL_CACHE_KEY . $userId, compact('email', 'code'), $excpireDate);

			//TODO: ارسال ایمیل به کاربر برای تغییر ایمیل
			Log::info('SEND-CHANGE-EMAIL-CODE', compact('code'));
			return response([
				'message' => 'ایمیلی به شما ارسال شد لطفا ایمیل های دریافتی خود را بررسی نمایید',
			], 200);


		}
		catch (Exception $exception)
		{
			Log::error($exception);
			return response([
				'message' => 'خطایی رخ داده است و سرور قادر به ارسال کد فعالسازی نمیباشد.',
			], 500);
		}

	}



	public static function changeEmailSubmit(ChangeEmailSubmitRequest $request)
	{


		$userId   = auth()->id();
		$cacheKey = self::CHANGE_EMAIL_CACHE_KEY . $userId;
		$cache    = Cache::get($cacheKey);
		if (empty($cache) || $cache['code'] != $request->code)
		{
			return response([
				'message' => 'درخواست شما نامعتبر است.',
			], 400);
		}

		$user        = auth()->user();
		$user->email = $cache['email'];
		$user->save();
		Cache::forget($cacheKey);

		return response([
			'message' => 'ایمیل با موفقیت تغیرر یافت',
		], 200);
	}



	public static function changePassword(ChangePasswordRequest $request)
	{
		try
		{
			$user = auth()->user();
			if (!Hash::check($request->old_password, $user->password))
			{
				return response(['message' => 'گذرواژه وارد شده نادرست میباشد'], 400);
			}
			$user->password = bcrypt($request->new_password);
			$user->save();
			return response(['message' => 'تغییر گذر واژه با موفقیت انجام شد'], 200);
		}
		catch (Exception $exception)
		{
			Log::error($exception);
			return response(['message' => 'خطایی به وجود آمده است'], 500);
		}

	}
}