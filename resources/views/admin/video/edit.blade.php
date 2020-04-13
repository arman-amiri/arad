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
								<textarea name="info" id="info" class="form-control ltr form-control-lg  {{ $errors->has('info') ? 'is-invalid' : '' }}" rows="10" cols="80">
									{{ old('info' , $record->info) }}
								</textarea>
								<div class="invalid-feedback">{{ $errors->first('info') }}</div>
							</div>

						</div>
					</div>


					<div class="col-md-4">
						<div class="form">


							<div class="form-group rtl">
								<img style="width: 100%;" class="index-img" src="{{ asset('images/videos'.'/'.$record->banner) }}">
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
								<source style="margin: auto" src="{{ asset('videos'.'/'.$record->video) }}" type="video/mp4">
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


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
	var editor_config = {
		path_absolute: "/",
		selector: "textarea#info",
		directionality: "rtl",
		plugins: [
			"directionality advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"emoticons template paste textcolor colorpicker textpattern"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | ltr rtl",
		relative_urls: false,
		file_browser_callback: function(field_name, url, type, win)
		{
			var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
			var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

			var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
			if (type == 'image')
			{
				cmsURL = cmsURL + "&type=Images";
			}
			else
			{
				cmsURL = cmsURL + "&type=Files";
			}

			tinyMCE.activeEditor.windowManager.open({
				file: cmsURL,
				title: 'Filemanager',
				width: x * 0.8,
				height: y * 0.8,
				resizable: "yes",
				close_previous: "no"
			});
		}
	};

	tinymce.init(editor_config);


</script>