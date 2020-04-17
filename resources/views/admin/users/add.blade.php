@extends('layouts.admin-layout')

@section('content')


	<div class="header">
		<div class="page-title">اضافه کردن کاربر</div>
		<div class="page-toolbar">

			<div class="actions" style="border-top: none !important;">
				<button class="btn btn-sm btn-success">ذخیره</button>
				<a href="{{ action('Admin\PanelUserController@index') }}" class="btn btn-sm btn-light">بازگشت</a>
			</div>

		</div>
	</div>


	<div id="page">
		<div class="page-status"></div>

		<div class="page-form">
			<form action="{{ action('Admin\PanelUserController@insert') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row">


					<div class="col-md-4">
						<div class="form">
							<div class="form-group rtl">
								<label>نام</label>
								<input name="name" type="text" class="form-control form-control-lg {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
								<div class="invalid-feedback">{{ $errors->first('name') }}</div>
							</div>

							<div class="form-group rtl">
								<label>موبایل</label>
								<input name="mobile" type="text" class="form-control form-control-lg {{ $errors->has('mobile') ? 'is-invalid' : '' }}" value="{{ old('mobile') }}" placeholder="نام کاربری همان شماره موبایل شما است">
								<div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
							</div>

							<div class="form-group rtl">
								<label>ایمیل(اختیاری)</label>
								<input name="email" type="text" class="form-control form-control-lg {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}">
								<div class="invalid-feedback">{{ $errors->first('email') }}</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form">
							<div class="form-group rtl">
								<label>کلمه عبور(حداقل 8 کاراکتر)</label>
								<input name="password" type="password" class="form-control  form-control-lg {{ $errors->has('password') ? 'is-invalid' : '' }}" value="{{ old('password') }}">
								<div class="invalid-feedback">{{ $errors->first('password') }}</div>
							</div>

							<div class="form-group rtl">
								<label>تکرار کلمه عبور</label>
								<input name="passwordConfirm" type="password" class="form-control  form-control-lg {{ $errors->has('passwordConfirm') ? 'is-invalid' : '' }}" value="{{ old('passwordConfirm') }}">
								<div class="invalid-feedback">{{ $errors->first('passwordConfirm') }}</div>
							</div>


							<div class="form-group rtl">
								<label>مقام(تکیه بر جای بزرگان نتوان زد به گزاف)</label>
								<select name="level" id="" class="form-control  form-control-lg {{ $errors->has('level') ? 'is-invalid' : '' }}">
									<option value="user" {{ old('level') == 'user' ? 'selected' : '' }}>کاربر</option>
									<option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>ادمین</option>
								</select>
								<div class="invalid-feedback">{{ $errors->first('level') }}</div>
							</div>

						</div>

					</div>


					<div class="col-md-4">
						<div class="form">

							<div class="form-group rtl">
								<label>تصویر</label>
								<input type="file"
										value="{{old('avatar')}}"
										class="form-control form-control-lg  {{  $errors->has('avatar') ? 'is-invalid': '' }} "
										placeholder="avatar" name="avatar">
								<div class="invalid-feedback">{{ $errors->first('avatar') }}</div>
							</div>

							<div class="form-group rtl">
								<label>تاریخ انقضا</label>
								<input id="expired_at_alt" name="expired_at" type="hidden">
								<input  id="expired_at" type="text" class="form-control form-control-lg {{ $errors->has('expired_at') ? 'is-invalid' : '' }}" value="{{ old('expired_at') }}">
								<div class="invalid-feedback">{{ $errors->first('expired_at') }}</div>
							</div>

							<div class="form-group rtl">
								<label>وضعیت</label>
								<select name="active" id="" class="form-control  form-control-lg {{ $errors->has('active') ? 'is-invalid' : '' }}">
									<option value="Y" {{ old('active') == 'Y' ? 'selected' : '' }}>فعال</option>
									<option value="N" {{ old('active') == 'N' ? 'selected' : '' }}>غیر فعال</option>
								</select>
								<div class="invalid-feedback">{{ $errors->first('active') }}</div>
							</div>
						</div>

					</div>


				</div>
				<div class="actions">
					<button class="btn btn-lg btn-success">ذخیره</button>
					<a href="{{ action('Admin\PanelUserController@index') }}" class="btn btn-lg btn-light">بازگشت</a>
				</div>

			</form>


		</div>
	</div>

	<script>
		$('#expired_at').pDatepicker({
			altField: '#expired_at_alt',
			altFieldFormatter: (unix) =>
			{
				return moment(unix).format("YYYY-MM-DD HH:mm:ss");
			},
			"timePicker": {
				"enabled": true,
				"step": 1,
				"hour": {
					"enabled": true,
					"step": null
				},
				"minute": {
					"enabled": true,
					"step": null
				},
				"second": {
					"enabled": false,
					"step": null
				},
				"meridian": {
					"enabled": true
				}
			},
		});
	</script>


@endsection