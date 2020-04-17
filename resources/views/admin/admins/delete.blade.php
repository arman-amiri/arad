@extends('layouts.admin-layout')

@section('content')

	<div class="page">
		<header class="header">
			<div class="title">
				حذف ادمین
				[{{ \Illuminate\Support\Str::words($record->name, 20) }}]
			</div>
			<div class="toolbar">

			</div>
			<div class="status-bar">
				<div class="rtl">
					آخرین ویرایش:
					<span style="display: inline-block; direction: ltr">{{ jdate($record->updatedAt) }}</span>
				</div>
			</div>
		</header>

		@if(session('not-empty'))
			<div class="alert alert-danger">
				<div class="title">خطا!</div>
				این رکورد به دلیل متصل بودن به تعدادی /// نمی تواند حذف شود.
			</div>
		@endif

		<div id="page">
			<div class="alert alert-warning rtl alert-delete">
				<div class="title">هشدار!</div>
				حذف یک فرایند بدون بازگشت است.
			</div>
			<div class="page-form">
				<form action="{{ action('Admin\AdminController@delete') }}" method="post">

					@csrf
					<input type="hidden" name="id" value="{{ $record->id }}">

					<div class="form">

						<div class="actions">
							<button class="btn btn-lg btn-danger">حذف</button>
							<a href="{{ action('Admin\AdminController@index') }}" class="btn btn-lg btn-light">بازگشت</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection