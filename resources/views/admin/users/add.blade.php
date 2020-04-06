@extends('layouts.admin-layout')

@section('content')


	<div class="header">
		<div class="page-title">اضافه کردن کاربر</div>
		{{--<div class="page-toolbar">add</div>--}}
	</div>


	<div id="page">
		<div class="page-status">3 رکورد - صفحه 1 از 1</div>

		<div class="page-form">
			<form action="{{ action('Admin\UserController@insert') }}" method="post">
				@csrf
				<div class="row">
					<div class="col-md-8">

						<div class="form">
							<div class="form-group rtl">
								<label>نام</label>
								<input name="name" type="text" class="form-control ltr form-control-lg {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
								<div class="invalid-feedback">{{ $errors->first('name') }}</div>
							</div>

							<div class="form-group rtl">
								<label>ایمیل</label>
								<input name="email" type="text" class="form-control ltr form-control-lg {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}">
								<div class="invalid-feedback">{{ $errors->first('email') }}</div>
							</div>

						</div>
					</div>


					<div class="col-md-4">
						<div class="form">
							<div class="form-group rtl">
								<label>کلمه عبور</label>
								<input name="password" type="password" class="form-control  form-control-lg {{ $errors->has('password') ? 'is-invalid' : '' }}" value="{{ old('password') }}">
								<div class="invalid-feedback">{{ $errors->first('password') }}</div>
							</div>

							<div class="form-group rtl">
								<label>تکرار کلمه عبور</label>
								<input name="passwordConfirm" type="password" class="form-control  form-control-lg {{ $errors->has('passwordConfirm') ? 'is-invalid' : '' }}" value="{{ old('passwordConfirm') }}">
								<div class="invalid-feedback">{{ $errors->first('passwordConfirm') }}</div>
							</div>
						</div>

					</div>


				</div>
				<div class="actions">
					<button class="btn btn-lg btn-success">ذخیره</button>
					<a href="{{ action('Admin\UserController@index') }}" class="btn btn-lg btn-light">بازگشت</a>
				</div>

			</form>


		</div>
	</div>
@endsection