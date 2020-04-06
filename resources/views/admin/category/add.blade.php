@extends('layouts.admin-layout')

@section('content')


	<div class="header">
		<div class="page-title">اضافه کردن دسته بندی</div>
		{{--<div class="page-toolbar">add</div>--}}
	</div>


	<div id="page">
		<div class="page-status">3 رکورد - صفحه 1 از 1</div>

		<div class="page-form">
			<form action="{{ action('Admin\CategoryController@insert') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-8">
						<div class="form">
							<div class="form-group rtl">
								<label>عنوان</label>
								<input name="title" type="text" class="form-control ltr form-control-lg {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}">
								<div class="invalid-feedback">{{ $errors->first('title') }}</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form">
							<div class="form-group rtl">
								<label>تصویر</label>
								<input type="file"
										value="{{old('banner')}}"
										class="form-control form-control-lg  {{  $errors->has('banner') ? 'is-invalid': '' }} "
										placeholder="banner" name="banner">
								<div class="invalid-feedback">{{ $errors->first('banner') }}</div>
							</div>
						</div>
					</div>
				</div>
				<div class="actions">
					<button class="btn btn-lg btn-success">ذخیره</button>
					<a href="{{ action('Admin\CategoryController@index') }}" class="btn btn-lg btn-light">بازگشت</a>
				</div>
			</form>
		</div>
	</div>


@endsection