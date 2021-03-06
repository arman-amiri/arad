@extends('layouts.admin-layout')

@section('content')


	<div class="header">
		<div class="page-title">اضافه کردن دوره</div>
		{{--<div class="page-toolbar">add</div>--}}
	</div>


	<div id="page">
		<div class="page-status">
		</div>

		<div class="page-form">
			<form action="{{ action('Admin\CourseController@insert') }}" method="post" enctype="multipart/form-data">
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
								<label>قیمت</label>
								<input name="price" type="text" class="form-control ltr form-control-lg {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ old('price') }}">
								<div class="invalid-feedback">{{ $errors->first('price') }}</div>
							</div>

							<div class="form-group rtl">
								<label>نام مدرس</label>
								<input name="teacher_name" type="text" class="form-control ltr form-control-lg {{ $errors->has('teacher_name') ? 'is-invalid' : '' }}" value="{{ old('teacher_name') }}">
								<div class="invalid-feedback">{{ $errors->first('teacher_name') }}</div>
							</div>


							<div class="form-group rtl">
								<label>توضیحات</label>
								<textarea name="info" id="info" class="form-control form-control-lg {{ $errors->has('info') ? 'is-invalid' : '' }}" rows="10" cols="80">
									{{ old('info') }}
								</textarea>
								<div class="invalid-feedback">{{ $errors->first('info') }}</div>
							</div>


						</div>
					</div>


					<div class="col-md-4">
						<div class="form">


							<div class="form-group rtl">
							<label>بنر دوره</label>
							<input type="file"
							value="{{old('banner')}}"
							class="form-control form-control-lg  {{  $errors->has('banner') ? 'is-invalid': '' }} "
							placeholder="banner" name="banner" id="banner">
							<div class="invalid-feedback">{{ $errors->first('banner') }}</div>
							</div>
							</div>


							<div class="form">
								<div class="form-group rtl">
									<label>دسته بندی</label>

									<select name="category_id" id="" class="form-control ltr form-control-lg {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
										<option value="">انتخاب کنید...</option>
										@foreach(\App\Category::get() as $c)
											<option value="{{$c->id}}">{{ $c->title }}</option>
										@endforeach
									</select>
									<div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
								</div>


								<div class="form-group rtl">
									<label>نوع برگزاری</label>
									<select name="type_holding" id="" class="form-control ltr form-control-lg {{ $errors->has('type_holding') ? 'is-invalid' : '' }}">
										<option value="V">غیر حضوری</option>
										<option value="p"> حضوری</option>
										<option value="W">وبینار</option>

									</select>
									<div class="invalid-feedback">{{ $errors->first('type_holding') }}</div>
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


							<div class="actions">
								<button class="btn btn-lg btn-success">ذخیره</button>
								<a href="{{ action('Admin\CourseController@index') }}" class="btn btn-lg btn-light">بازگشت</a>
							</div>
						</div>

					</div>
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











