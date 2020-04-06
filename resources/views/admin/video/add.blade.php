@extends('layouts.admin-layout')

@section('content')


	<div class="header">
		<div class="page-title">اضافه کردن ویدیو</div>
		{{--<div class="page-toolbar">add</div>--}}
	</div>


	<div id="page">
		<div class="page-status"></div>

		<div class="page-form">
			<form action="{{ action('Admin\VideoController@insert') }}" method="post" enctype="multipart/form-data">
				@csrf

				<input type="hidden" name="user_id" value="{{ auth()->id() }}">
				<div class="row">
					<div class="col-md-8">

						<div class="form">
							<div class="form-group rtl">
								<label>عنوان</label>
								<input name="title" type="text" class="form-control ltr form-control-lg {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}">
								<div class="invalid-feedback">{{ $errors->first('title') }}</div>
							</div>

							<div class="form-group rtl">
								<label>دسته بندی ها</label>

								<select name="category_id" id="" class="form-control  form-control-lg {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
									<option value="">انتخاب کنید...</option>
									@foreach(\App\Category::get() as $c)
										<option value="{{$c->id}}">{{ $c->title }}</option>
									@endforeach
								</select>
								<div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
							</div>

							<div class="form-group rtl">
								<label>دوره ها</label>

								<select name="course_id" id="" class="form-control  form-control-lg {{ $errors->has('course_id') ? 'is-invalid' : '' }}">
									<option value="">انتخاب کنید...</option>
									@foreach(\App\Course::get() as $course)
										<option value="{{$course->id}}">{{ $course->title }}</option>
									@endforeach
								</select>
								<div class="invalid-feedback">{{ $errors->first('course_id') }}</div>
							</div>

							<div class="form-group rtl">
								<label>توضیحات</label>
								<input name="info" type="text" class="form-control ltr form-control-lg {{ $errors->has('info') ? 'is-invalid' : '' }}" value="{{ old('info') }}">
								<div class="invalid-feedback">{{ $errors->first('info') }}</div>
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

							<div class="form-group rtl">
								<label>ویدیو</label>
								<input type="file"
										value="{{old('video')}}"
										class="form-control form-control-lg  {{  $errors->has('video') ? 'is-invalid': '' }} "
										placeholder="video" name="video">
								<div class="invalid-feedback">{{ $errors->first('video') }}</div>
							</div>


							<div class="form-group rtl">
								<label>منتشر شده</label>
								<select name="publish"
										class="form-control form-control-lg {{ $errors->has('publish') ? 'is-invalid' : '' }}">
									<option value="N">
										خیر
									</option>
									<option value="Y">
										بله
									</option>
								</select>
								<div class="invalid-feedback">{{ $errors->first('publish') }}</div>
							</div>
						</div>
					</div>
				</div>
				<div class="actions">
					<button class="btn btn-lg btn-success">ذخیره</button>
					<a href="{{ action('Admin\VideoController@index') }}" class="btn btn-lg btn-light">بازگشت</a>
				</div>
			</form>
		</div>
	</div>


@endsection