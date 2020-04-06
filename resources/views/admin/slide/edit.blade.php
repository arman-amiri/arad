@extends('layouts.admin-layout')

@section('content')


	<div class="header">
		<div class="page-title">ویرایش اسلایدر</div>
		{{--<div class="page-toolbar">add</div>--}}
	</div>

	<div class="notice">
		@if(session('updated'))
			<div class="alert alert-success">
				<div class="title">آهان!</div>
				تغییرات با موفقیت ذخیره شد.
			</div>
		@endif
	</div>
	<div id="page">
		<div class="page-status"></div>

		<div class="page-form">
			<form action="{{ action('Admin\SlideController@update') }}" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{ $record->id }}">
				<div class="row">
					<div class="col-md-8">

						<div class="form">
							<div class="form-group rtl">
								<label>عنوان</label>
								<input name="title" type="text" class="form-control ltr form-control-lg {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title' , $record->title ) }}">
								<div class="invalid-feedback">{{ $errors->first('title') }}</div>
							</div>

							<div class="form-group rtl">
								<label>لینک</label>
								<input name="link" type="text" class="form-control ltr form-control-lg {{ $errors->has('link') ? 'is-invalid' : '' }}" value="{{ old('link' , $record->link) }}">
								<div class="invalid-feedback">{{ $errors->first('link') }}</div>
							</div>

							<div class="form-group rtl">
								<label>منتشر شده</label>
								<select name="published"
										class="form-control form-control-lg {{ $errors->has('published') ? 'is-invalid' : '' }}">
									<option value="N" {{ old('published' , $record->published) == 'N' ? 'selected' : '' }}>
										خیر
									</option>
									<option value="Y" {{ old('published' , $record->published) == 'Y' ? 'selected' : '' }}>
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
								<img style="width: 100%;" class="index-img" src="{{ asset('images/slide/'.$record->image) }}">

							</div>
							<div class="form-group rtl">
								<label>تصویر</label>
								<input type="file"
										value="{{old('image' , $record->image)}}"
										class="form-control form-control-lg  {{  $errors->has('image') ? 'is-invalid': '' }} "
										placeholder="image" name="image">
								<div class="invalid-feedback">{{ $errors->first('image') }}</div>
							</div>

							<div class="form-group rtl">
								<label>تاریخ انقضا</label>
								<input id="expiredAt-alt" name="expiredAt" type="hidden">
								<input readonly id="expiredAt" type="text" class="form-control form-control-lg {{ $errors->has('expiredAt') ? 'is-invalid' : '' }}" value="{{ old('expiredAt') }}">
								<div class="invalid-feedback">{{ $errors->first('expiredAt') }}</div>
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
		$('#expiredAt').pDatepicker({
			altField: '#expiredAt-alt',
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