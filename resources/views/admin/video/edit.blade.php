@extends('layouts.admin-layout')

@section('content')


	<div class="header">
		<div class="page-title">ویرایش ویدیو</div>
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
		{{--{{ dd($record->video) }}--}}
		<div class="page-form">
			<form action="{{ action('Admin\VideoController@update') }}" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{ $record->id }}">
				<input type="hidden" name="user_id" value="{{ $record->user_id }}">
				<div class="row">
					<div class="col-md-8">

						<div class="form">
							<div class="form-group rtl">
								<label>عنوان</label>
								<input name="title" type="text" class="form-control form-control-lg {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title' ,$record->title) }}">
								<div class="invalid-feedback">{{ $errors->first('title') }}</div>
							</div>

							<div class="form-group rtl">
								<label>دسته بندی</label>
								<select name="category_id" id="" class="form-control form-control-lg" {{ $errors->has('category_id' ? 'selected' : '') }}>
									<option value="">انتخاب کنید...</option>

									@foreach(\App\Category::get() as $c)
										<option value="{{ $c->id }}" {{ old('category_id' , $record->category_id) == $c->id ? 'selected' : ''  }} > {{ $c->title }} </option>
									@endforeach
								</select>
								<div class="invalid-feedback">{{ $errors->first('info') }}</div>
							</div>


							<div class="form-group rtl">
								<label>دسته بندی</label>
								<select name="course_id" id="" class="form-control form-control-lg" {{ $errors->has('course_id' ? 'selected' : '') }}>
									<option value="">انتخاب کنید...</option>
									@foreach(\App\Course::get() as $course)
										<option value="{{ $course->id }}" {{ old('course_id' , $record->course_id) == $course->id ? 'selected' : ''  }}>{{ $course->title }}</option>
									@endforeach
								</select>
								<div class="invalid-feedback">{{ $errors->first('course_id') }}</div>
							</div>

							<div class="form-group rtl">
								<label>توضیحات</label>
								<input name="info" type="text" class="form-control form-control-lg {{ $errors->has('info') ? 'is-invalid' : '' }}" value="{{ old('info' ,$record->info) }}">
								<div class="invalid-feedback">{{ $errors->first('info') }}</div>
							</div>

						</div>
					</div>


					<div class="col-md-4">
						<div class="form">


							<div class="form-group rtl">
								<img style="width: 100%;" class="index-img" src="{{ asset('images/videos/'.$record->banner) }}">

							</div>
							<div class="form-group rtl">
								<label>تصویر</label>
								<input type="file"
										value="{{ old('banner' , $record->banner) }}"
										class="form-control form-control-lg  {{  $errors->has('banner') ? 'is-invalid': '' }} "
										placeholder="banner" name="banner">
								<div class="invalid-feedback">{{ $errors->first('banner') }}</div>
							</div>


							<video style="width:443px;height: 200px" controls="controls">
								<source style="margin: auto" src="{{ asset('videos/'.$record->video) }}" type="video/mp4">
							</video>
							<div class="form-group rtl">
								<label>ویدیو</label>
								<input type="file"
										value="{{ old('video' , $record->video) }}"
										class="form-control form-control-lg  {{  $errors->has('video') ? 'is-invalid': '' }} "
										placeholder="video" name="video">
								<div class="invalid-feedback">{{ $errors->first('video') }}</div>
							</div>


							<div class="form-group rtl">
								<label>منتشر شده</label>
								<select name="publish"
										class="form-control form-control-lg {{ $errors->has('publish') ? 'is-invalid' : '' }}">
									<option value="N" {{ old('publish' ,$record->publish) == 'N' ? 'selected' : '' }}>
										خیر
									</option>
									<option value="Y" {{ old('publish' ,$record->publish) == 'Y' ? 'selected' : '' }}>
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