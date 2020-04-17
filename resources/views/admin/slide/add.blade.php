@extends('layouts.admin-layout')

@section('content')


	<div class="header">
		<div class="page-title">اضافه کردن اسلایدر</div>
		{{--<div class="page-toolbar">add</div>--}}
	</div>


	<div id="page">
		<div class="page-status">3 رکورد - صفحه 1 از 1</div>

		<div class="page-form">
			<form action="{{ action('Admin\SlideController@insert') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-8">

						<div class="form">
							<div class="form-group rtl">
								<label>عنوان</label>
								<input name="title" type="text" class="form-control ltr form-control-lg {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}">
								<div class="invalid-feedback">{{ $errors->first('title') }}</div>
							</div>

							<div class="form-group rtl">
								<label>لینک</label>
								<input  name="link" type="text" class="form-control ltr form-control-lg {{ $errors->has('link') ? 'is-invalid' : '' }}" value="{{ old('link') }}">
								<div class="invalid-feedback">{{ $errors->first('link') }}</div>
							</div>

							<div class="form-group rtl">
								<label>منتشر شده</label>
								<select name="published"
										class="form-control form-control-lg {{ $errors->has('published') ? 'is-invalid' : '' }}">
									<option value="N">
										خیر
									</option>
									<option value="Y">
										بله
									</option>
								</select>
								<div class="invalid-feedback">{{ $errors->first('published') }}</div>

							</div>


						</div>
					</div>


					<div class="col-md-4">
						<div class="form">
							<div class="form-group rtl">
								<label>تصویر</label>
								<input type="file"
										value="{{old('image')}}"
										class="form-control form-control-lg  {{  $errors->has('image') ? 'is-invalid': '' }} "
										placeholder="image" name="image">
								<div class="invalid-feedback">{{ $errors->first('image') }}</div>
							</div>

							<div class="form-group rtl">
								<label>تاریخ انقضا</label>
								<input id="expired-at-alt" name="expired-at" type="hidden">
								<input  id="expired-at" type="text" class="form-control form-control-lg {{ $errors->has('expired-at') ? 'is-invalid' : '' }}" value="{{ old('expired-at') }}">
								<div class="invalid-feedback">{{ $errors->first('expired-at') }}</div>
							</div>
						</div>

					</div>


				</div>
				<div class="actions">
					<button class="btn btn-lg btn-success">ذخیره</button>
					<a href="{{ action('Admin\SlideController@index') }}" class="btn btn-lg btn-light">بازگشت</a>
				</div>

			</form>


		</div>
	</div>

	<script>
		$('#expired-at').pDatepicker({
			altField: '#expired-at-alt',
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