@extends('layouts.admin-layout')

@section('content')


	<div class="header">
		<div class="page-title">ویرایش پادکست</div>
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
			<form action="{{ action('Admin\PodcastController@update') }}" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{ $record->id }}">
				<div class="row">
					<div class="col-md-8">

						<div class="form">
							<div class="form-group rtl">
								<label>عنوان</label>
								<input name="title" type="text" class="form-control  form-control-lg {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title' , $record->title ) }}">
								<div class="invalid-feedback">{{ $errors->first('title') }}</div>
							</div>


							<div class="form-group rtl">
								<label>دسته بندی</label>
								<select name="category_id" id="" class="form-control form-control-lg {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
									<option value="">انتخاب کنید...</option>
									@foreach(\App\Category::get() as $c)
										<option value="{{$c->id}}" {{ old('category_id' , $record->category_id) == $c->id ? 'selected' : '' }}>{{ $c->title }}</option>
									@endforeach
								</select>
								<div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
							</div>


							<div class="form-group rtl">
								<label>منتشر شده</label>
								<select name="publish"
										class="form-control form-control-lg {{ $errors->has('publish') ? 'is-invalid' : '' }}">
									<option value="N" {{ old('publish' , $record->publish) == 'N' ? 'selected' : '' }}>
										خیر
									</option>
									<option value="Y" {{ old('publish' , $record->publish) == 'Y' ? 'selected' : '' }}>
										بله
									</option>
								</select>
								<div class="invalid-feedback">{{ $errors->first('publish') }}</div>
							</div>

							<div class="form-group rtl">
								<label>توضیحات</label>
								<input name="info" type="text" class="form-control form-control-lg {{ $errors->has('info') ? 'is-invalid' : '' }}" value="{{ old('info' , $record->info) }}">
								<div class="invalid-feedback">{{ $errors->first('info') }}</div>
							</div>
						</div>
					</div>


					<div class="col-md-4">
						<div class="form">

							<div class="form-group rtl">
								<img style="width: 100%;" class="index-img" src="{{ asset('images/podcasts/'.$record->banner) }}">

							</div>
							<div class="form-group rtl">
								<label>تصویر</label>
								<input type="file"
										value="{{old('banner' , $record->banner)}}"
										class="form-control form-control-lg  {{  $errors->has('banner') ? 'is-invalid': '' }} "
										placeholder="banner" name="banner">
								<div class="invalid-feedback">{{ $errors->first('banner') }}</div>
							</div>


							<div class="form-group rtl">
								<label>پادکست</label>
								<input type="file"
										value="{{old('podcast' , $record->podcast)}}"
										class="form-control form-control-lg  {{  $errors->has('podcast') ? 'is-invalid': '' }} "
										placeholder="podcast" name="podcast">
								<div class="invalid-feedback">{{ $errors->first('podcast') }}</div>
							</div>
						</div>
					</div>

				</div>
				<div class="actions">
					<button class="btn btn-lg btn-success">ذخیره</button>
					<a href="{{ action('Admin\PodcastController@index') }}" class="btn btn-lg btn-light">بازگشت</a>
				</div>

			</form>


		</div>
	</div>

@endsection