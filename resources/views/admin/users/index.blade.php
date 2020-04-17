@extends('layouts.admin-layout')

@section('content')


	<div class="header">
		<div class="page-title">مدیریت کاربران</div>
		<div class="page-toolbar">
			<a href="{{ action('Admin\PanelUserController@add') }}">
				<svg height="40px" width="40px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						viewBox="0 0 455.431 455.431" style="enable-background:new 0 0 455.431 455.431;" xml:space="preserve">
<path style="fill:#8DC640;" d="M405.493,412.764c-69.689,56.889-287.289,56.889-355.556,0c-69.689-56.889-62.578-300.089,0-364.089
	s292.978-64,355.556,0S475.182,355.876,405.493,412.764z"/>
					<g style="opacity:0.2;">
						<path style="fill:#FFFFFF;" d="M229.138,313.209c-62.578,49.778-132.267,75.378-197.689,76.8
		c-48.356-82.489-38.4-283.022,18.489-341.333c51.2-52.622,211.911-62.578,304.356-29.867
		C377.049,112.676,330.116,232.142,229.138,313.209z"/>
					</g>
					<path style="fill:#FFFFFF;" d="M362.827,227.876c0,14.222-11.378,25.6-25.6,25.6h-85.333v85.333c0,14.222-11.378,25.6-25.6,25.6
	c-14.222,0-25.6-11.378-25.6-25.6v-85.333H115.36c-14.222,0-25.6-11.378-25.6-25.6c0-14.222,11.378-25.6,25.6-25.6h85.333v-85.333
	c0-14.222,11.378-25.6,25.6-25.6c14.222,0,25.6,11.378,25.6,25.6v85.333h85.333C351.449,202.276,362.827,213.653,362.827,227.876z"
					/>
					<g>
					</g>
					<g>
					</g>
					<g>
					</g>
					<g>
					</g>
					<g>
					</g>
					<g>
					</g>
					<g>
					</g>
					<g>
					</g>
					<g>
					</g>
					<g>
					</g>
					<g>
					</g>
					<g>
					</g>
					<g>
					</g>
					<g>
					</g>
					<g>
					</g>
</svg>
			</a>
		</div>
	</div>
	<div class="notice">
		@if(session('inserted'))
			<div class="alert alert-success">
				<div class="title">عملیات موفقیت آمیز بود</div>
				اطلاعات با موفقیت ذخیره شد.
			</div>
		@endif

		@if(session('deleted'))
			<div class="alert alert-success">
				<div class="title">عملیات موفقیت آمیز</div>
				کاربر با موفقیت حذف شد.
			</div>
		@endif
	</div>

	<div id="page">
		<div class="page-status">
			{{ $records->total() }}
			رکورد
			-
			صفحه
			{{ $records->currentPage() }}
			از
			{{ $records->lastPage() }}
		</div>


		<table class="table-list">
			<tr>
				<th width="1">عملیات</th>
				<th>تصویر</th>
				<th>تاریخ ایجاد</th>
				<th>وضعیت</th>
				<th>مقام</th>
				<th>ایمیل</th>
				<th>موبایل</th>
				<th>نام</th>
				<th width="1">#</th>
			</tr>
			@foreach($records as $index => $record)
				<tr>
					<td>
						<div class="operations">
							<a class="btn btn-light"
									href="{{ action('Admin\PanelUserController@remove', ['id' => $record->id]) }}">
								<svg viewBox="-40 0 427 427.00131" xmlns="http://www.w3.org/2000/svg">
									<path d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/>
									<path d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/>
									<path d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0"/>
									<path d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/>
								</svg>
							</a>
							<a class="btn btn-light"
									href="{{ action('Admin\PanelUserController@edit', ['id' => $record->id]) }}">
								<svg viewBox="0 0 412 412.005" xmlns="http://www.w3.org/2000/svg">
									<path d="m402.960938 167.3125-35.550782-3.421875c-3.933594-14.851563-9.925781-29.082031-17.808594-42.269531l22.59375-27.25c3.28125-3.957032 3.03125-9.757813-.585937-13.410156l-40.074219-40.535157c-3.640625-3.683593-9.492187-3.976562-13.484375-.675781l-27.359375 22.628906c-13.214844-7.851562-27.441406-13.855468-42.28125-17.84375l-3.425781-35.5c-.5-5.125-4.808594-9.035156-9.957031-9.035156h-57.539063c-5.152343 0-9.460937 3.914062-9.953125 9.039062l-3.425781 35.492188c-14.875 3.929688-29.128906 9.921875-42.34375 17.796875l-27.300781-22.574219c-3.972656-3.285156-9.792969-3.011718-13.441406.628906l-40.582032 40.53125c-3.65625 3.648438-3.929687 9.484376-.632812 13.457032l22.644531 27.3125c-7.851563 13.1875-13.855469 27.386718-17.851563 42.207031l-35.550781 3.421875c-5.132812.492188-9.04687475 4.800781-9.04687475 9.953125v57.46875c0 5.148437 3.91406275 9.460937 9.03906275 9.953125l35.550781 3.421875c3.933594 14.851563 9.925781 29.082031 17.808594 42.269531l-22.59375 27.25c-3.296875 3.972656-3.023438 9.808594.632812 13.457032l40.585938 40.535156c3.648437 3.640625 9.46875 3.914062 13.441406.628906l27.359375-22.628906c13.214844 7.851562 27.441406 13.855468 42.28125 17.84375l3.425781 35.5c.496094 5.128906 4.804688 9.039062 9.957032 9.039062h57.539062c5.152344 0 9.460938-3.910156 9.953125-9.039062l3.425781-35.488282c14.875-3.929687 29.128906-9.921874 42.34375-17.800781l27.300782 22.578125c3.972656 3.285156 9.792968 3.011719 13.441406-.632812l40.585937-40.53125c3.652344-3.652344 3.925781-9.484375.628907-13.460938l-22.644532-27.308594c7.855469-13.191406 13.863282-27.398437 17.859375-42.21875l35.046875-3.417968c5.125-.5 9.03125-4.804688 9.03125-9.953125v-57.464844c0-5.152344-3.914062-9.460937-9.042968-9.953125zm-10.957032 58.347656-33.101562 3.226563c-4.324219.421875-7.878906 3.589843-8.800782 7.835937-3.886718 17.457032-10.90625 34.066406-20.71875 49.023438-2.367187 3.667968-2.085937 8.449218.703126 11.8125l21.410156 25.820312-27.699219 27.664063-25.875-21.398438c-3.402344-2.8125-8.246094-3.066406-11.917969-.617187-14.90625 9.847656-31.511718 16.835937-48.972656 20.613281-4.253906.917969-7.425781 4.480469-7.84375 8.8125l-3.238281 33.546875h-39.378907l-3.238281-33.546875c-.417969-4.332031-3.589843-7.894531-7.84375-8.8125-17.480469-3.882813-34.113281-10.894531-49.101562-20.695313-3.660157-2.359374-8.429688-2.078124-11.789063.699219l-25.875 21.402344-27.699218-27.667969 21.410156-25.820312c2.824218-3.40625 3.074218-8.257813.621094-11.9375-9.859376-14.875-16.855469-31.457032-20.636719-48.898438-.921875-4.253906-4.484375-7.421875-8.816407-7.839844l-33.597656-3.234374v-39.300782l33.597656-3.234375c4.332032-.414062 7.894532-3.585937 8.816407-7.835937 3.890625-17.457032 10.910156-34.066406 20.71875-49.023438 2.367187-3.667968 2.085937-8.449218-.703125-11.8125l-21.40625-25.820312 27.699218-27.667969 25.871094 21.402344c3.402344 2.8125 8.246094 3.0625 11.917969.617187 14.90625-9.847656 31.511719-16.839844 48.972656-20.613281 4.253907-.917969 7.425781-4.480469 7.84375-8.8125l3.238281-33.546875h39.378907l3.238281 33.546875c.417969 4.332031 3.589844 7.894531 7.84375 8.8125 17.480469 3.882813 34.113281 10.894531 49.097656 20.695313 3.664063 2.359374 8.433594 2.078124 11.792969-.699219l25.828125-21.363281 27.273438 27.585937-21.449219 25.867187c-2.824219 3.402344-3.074219 8.257813-.621094 11.933594 9.855469 14.875 16.855469 31.460938 20.636719 48.898438.917968 4.253906 4.484375 7.421875 8.8125 7.839844l33.601562 3.234374zm0 0"/>
									<path d="m206.003906 111.539062c-52.171875 0-94.464844 42.289063-94.464844 94.460938s42.292969 94.460938 94.464844 94.460938c52.167969 0 94.460938-42.289063 94.460938-94.460938-.058594-52.144531-42.316406-94.402344-94.460938-94.460938zm0 168.921876c-41.125 0-74.464844-33.335938-74.464844-74.460938s33.339844-74.460938 74.464844-74.460938c41.121094 0 74.460938 33.335938 74.460938 74.460938-.046875 41.105469-33.355469 74.414062-74.460938 74.460938zm0 0"/>
								</svg>
							</a>
						</div>
					</td>

					<td>
						<img style="object-fit: cover;width: 50px; height: 50px;border-radius: 3px;margin: -10px;background-size: cover" class="index-img" src="{{ asset('images/avatar/'.$record->avatar) }}">
					</td>

					<td> {{ jdate($record->created_at) }}</td>
					<td>

						@if( $record->active == 'Y')
							فعال
						@elseif($record->active== 'N')
							غیر فعال
						@endif
					</td>
					<td>
						@if( $record->level == 'user')
							کاربر
						@elseif($record->level == 'admin')
							ادمین
						@endif
					</td>
					<td>{{ $record->email == '' ? '-' : $record->email }}</td>
					<td>{{ $record->mobile }}</td>
					<td>{{ $record->name }}</td>
					<td>{{ $index + $records->firstItem() }}</td>
				</tr>
			@endforeach
		</table>

		{{ $records->links() }}

	</div>
@endsection


