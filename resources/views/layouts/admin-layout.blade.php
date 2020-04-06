<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="{{ asset('css/admin-layout.css')}}" rel="stylesheet">
	{{--<link rel="stylesheet" type="text/css" href="{{ asset('admin-layout.css')}}">--}}
	<link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<title>Document</title>
</head>
<body>

<div id="body">
	<div id="header">
		<div class="nav">22</div>
		<div class="header">

			<div class="header-home">
				<a href="{{ action('Admin\SlideController@index') }}" class=" {{ request()->is('admin/home*') ? 'active-menu' : '' }}">
					خانه
				</a>
			</div>

			<div class="header-users">
				<a href="{{ action('Admin\UserController@index') }}" class=" {{ request()->is('admin/users*') ? 'active-menu' : '' }}">
					کاربران
				</a>
			</div>

			<div class="about-us">
				<a href="">
					درباره ما
				</a>
			</div>

			<div class="connect-us">
				<a href="">
					تماس با ما
				</a>
			</div>

			<div class="exit">
				<a href="">
					خروج
				</a>
			</div>

		</div>
	</div>


	<div class="body">
		<div class="nav">
			<div class="info">
				<img class="avatar" src="{{asset('images/22.jpg')}}" alt="">
				<div class="full-name">آرمان امیری</div>
			</div>

			<ul>

				@if (request()->is('admin/users*'))
					<a href="{{ action('Admin\UserController@index') }}">

						<li class="{{ request()->is('admin/users*') ? 'sidebar-active' : '' }}">
							<svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 476.16 476.16" xml:space="preserve" width="512px" height="512px"><g>
									<g>
										<g>
											<path d="M238.08,0C106.496,0,0,106.496,0,238.08s106.496,238.08,238.08,238.08s238.08-106.496,238.08-238.08S369.664,0,238.08,0z     M217.6,77.824c0-11.264,9.216-20.48,20.48-20.48c11.264,0,20.48,9.216,20.48,20.48v24.064c0,11.264-9.216,20.48-20.48,20.48    c-11.264,0-20.48-9.216-20.48-20.48V77.824z M101.376,258.56H77.312c-11.264,0-20.48-9.216-20.48-20.48    c0-11.264,9.216-20.48,20.48-20.48h24.064c11.264,0,20.48,9.216,20.48,20.48C121.856,249.344,112.64,258.56,101.376,258.56z     M156.16,155.648c-8.192,8.192-20.992,8.192-29.184,0.512l-16.896-17.408c-8.192-8.192-8.192-20.992,0-29.184    c8.192-8.192,20.992-8.192,29.184,0l16.896,16.896C164.352,134.656,164.352,147.456,156.16,155.648z M264.192,292.352    c-8.192,4.096-16.896,5.632-26.112,5.632c-35.84,0-64-31.232-59.392-68.096c2.56-18.432,13.312-34.816,29.696-44.032    c17.92-10.24,38.4-10.24,55.296-2.048l73.728-73.728c8.192-8.192,20.992-8.192,29.184,0c8.192,8.192,8.192,20.992,0,29.184    l-74.24,73.216C306.688,242.176,293.888,278.016,264.192,292.352z M398.336,258.56h-24.064c-11.264,0-20.48-9.216-20.48-20.48    c0-11.264,9.216-20.48,20.48-20.48h24.064c11.264,0,20.48,9.216,20.48,20.48C418.816,249.344,409.6,258.56,398.336,258.56z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#C2C7D0"/>
										</g>
									</g>
								</g> </svg>
							<div class="title">مدیریت کاربران</div>
						</li>

					</a>

				@elseif(request()->is('admin/home*'))

					<a href="{{ action('Admin\CategoryController@index') }}">
						<li class=" {{ request()->is('admin/home/categories*') ? 'sidebar-active' : '' }}">
							<svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 476.16 476.16" xml:space="preserve" width="512px" height="512px"><g>
									<g>
										<g>
											<path d="M238.08,0C106.496,0,0,106.496,0,238.08s106.496,238.08,238.08,238.08s238.08-106.496,238.08-238.08S369.664,0,238.08,0z     M217.6,77.824c0-11.264,9.216-20.48,20.48-20.48c11.264,0,20.48,9.216,20.48,20.48v24.064c0,11.264-9.216,20.48-20.48,20.48    c-11.264,0-20.48-9.216-20.48-20.48V77.824z M101.376,258.56H77.312c-11.264,0-20.48-9.216-20.48-20.48    c0-11.264,9.216-20.48,20.48-20.48h24.064c11.264,0,20.48,9.216,20.48,20.48C121.856,249.344,112.64,258.56,101.376,258.56z     M156.16,155.648c-8.192,8.192-20.992,8.192-29.184,0.512l-16.896-17.408c-8.192-8.192-8.192-20.992,0-29.184    c8.192-8.192,20.992-8.192,29.184,0l16.896,16.896C164.352,134.656,164.352,147.456,156.16,155.648z M264.192,292.352    c-8.192,4.096-16.896,5.632-26.112,5.632c-35.84,0-64-31.232-59.392-68.096c2.56-18.432,13.312-34.816,29.696-44.032    c17.92-10.24,38.4-10.24,55.296-2.048l73.728-73.728c8.192-8.192,20.992-8.192,29.184,0c8.192,8.192,8.192,20.992,0,29.184    l-74.24,73.216C306.688,242.176,293.888,278.016,264.192,292.352z M398.336,258.56h-24.064c-11.264,0-20.48-9.216-20.48-20.48    c0-11.264,9.216-20.48,20.48-20.48h24.064c11.264,0,20.48,9.216,20.48,20.48C418.816,249.344,409.6,258.56,398.336,258.56z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#C2C7D0"/>
										</g>
									</g>
								</g> </svg>
							<div class="title">دسته بندی</div>
						</li>
					</a>

					<a href="{{ action('Admin\CourseController@index') }}">
						<li class=" {{ request()->is('admin/home/courses*') ? 'sidebar-active' : '' }}">
							<svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 476.16 476.16" xml:space="preserve" width="512px" height="512px"><g>
									<g>
										<g>
											<path d="M238.08,0C106.496,0,0,106.496,0,238.08s106.496,238.08,238.08,238.08s238.08-106.496,238.08-238.08S369.664,0,238.08,0z     M217.6,77.824c0-11.264,9.216-20.48,20.48-20.48c11.264,0,20.48,9.216,20.48,20.48v24.064c0,11.264-9.216,20.48-20.48,20.48    c-11.264,0-20.48-9.216-20.48-20.48V77.824z M101.376,258.56H77.312c-11.264,0-20.48-9.216-20.48-20.48    c0-11.264,9.216-20.48,20.48-20.48h24.064c11.264,0,20.48,9.216,20.48,20.48C121.856,249.344,112.64,258.56,101.376,258.56z     M156.16,155.648c-8.192,8.192-20.992,8.192-29.184,0.512l-16.896-17.408c-8.192-8.192-8.192-20.992,0-29.184    c8.192-8.192,20.992-8.192,29.184,0l16.896,16.896C164.352,134.656,164.352,147.456,156.16,155.648z M264.192,292.352    c-8.192,4.096-16.896,5.632-26.112,5.632c-35.84,0-64-31.232-59.392-68.096c2.56-18.432,13.312-34.816,29.696-44.032    c17.92-10.24,38.4-10.24,55.296-2.048l73.728-73.728c8.192-8.192,20.992-8.192,29.184,0c8.192,8.192,8.192,20.992,0,29.184    l-74.24,73.216C306.688,242.176,293.888,278.016,264.192,292.352z M398.336,258.56h-24.064c-11.264,0-20.48-9.216-20.48-20.48    c0-11.264,9.216-20.48,20.48-20.48h24.064c11.264,0,20.48,9.216,20.48,20.48C418.816,249.344,409.6,258.56,398.336,258.56z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#C2C7D0"/>
										</g>
									</g>
								</g> </svg>
							<div class="title">دوره ها</div>
						</li>
					</a>

					<a href="{{ action('Admin\VideoController@index') }}">
						<li class=" {{ request()->is('admin/home/videos*') ? 'sidebar-active' : '' }}">
							<svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 476.16 476.16" xml:space="preserve" width="512px" height="512px"><g>
									<g>
										<g>
											<path d="M238.08,0C106.496,0,0,106.496,0,238.08s106.496,238.08,238.08,238.08s238.08-106.496,238.08-238.08S369.664,0,238.08,0z     M217.6,77.824c0-11.264,9.216-20.48,20.48-20.48c11.264,0,20.48,9.216,20.48,20.48v24.064c0,11.264-9.216,20.48-20.48,20.48    c-11.264,0-20.48-9.216-20.48-20.48V77.824z M101.376,258.56H77.312c-11.264,0-20.48-9.216-20.48-20.48    c0-11.264,9.216-20.48,20.48-20.48h24.064c11.264,0,20.48,9.216,20.48,20.48C121.856,249.344,112.64,258.56,101.376,258.56z     M156.16,155.648c-8.192,8.192-20.992,8.192-29.184,0.512l-16.896-17.408c-8.192-8.192-8.192-20.992,0-29.184    c8.192-8.192,20.992-8.192,29.184,0l16.896,16.896C164.352,134.656,164.352,147.456,156.16,155.648z M264.192,292.352    c-8.192,4.096-16.896,5.632-26.112,5.632c-35.84,0-64-31.232-59.392-68.096c2.56-18.432,13.312-34.816,29.696-44.032    c17.92-10.24,38.4-10.24,55.296-2.048l73.728-73.728c8.192-8.192,20.992-8.192,29.184,0c8.192,8.192,8.192,20.992,0,29.184    l-74.24,73.216C306.688,242.176,293.888,278.016,264.192,292.352z M398.336,258.56h-24.064c-11.264,0-20.48-9.216-20.48-20.48    c0-11.264,9.216-20.48,20.48-20.48h24.064c11.264,0,20.48,9.216,20.48,20.48C418.816,249.344,409.6,258.56,398.336,258.56z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#C2C7D0"/>
										</g>
									</g>
								</g> </svg>
							<div class="title">فیلم ها</div>
						</li>
					</a>

					<a href="{{ action('Admin\PodcastController@index') }}">
						<li class=" {{ request()->is('admin/home/podcasts*') ? 'sidebar-active' : '' }}">
							<svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 476.16 476.16" xml:space="preserve" width="512px" height="512px"><g>
									<g>
										<g>
											<path d="M238.08,0C106.496,0,0,106.496,0,238.08s106.496,238.08,238.08,238.08s238.08-106.496,238.08-238.08S369.664,0,238.08,0z     M217.6,77.824c0-11.264,9.216-20.48,20.48-20.48c11.264,0,20.48,9.216,20.48,20.48v24.064c0,11.264-9.216,20.48-20.48,20.48    c-11.264,0-20.48-9.216-20.48-20.48V77.824z M101.376,258.56H77.312c-11.264,0-20.48-9.216-20.48-20.48    c0-11.264,9.216-20.48,20.48-20.48h24.064c11.264,0,20.48,9.216,20.48,20.48C121.856,249.344,112.64,258.56,101.376,258.56z     M156.16,155.648c-8.192,8.192-20.992,8.192-29.184,0.512l-16.896-17.408c-8.192-8.192-8.192-20.992,0-29.184    c8.192-8.192,20.992-8.192,29.184,0l16.896,16.896C164.352,134.656,164.352,147.456,156.16,155.648z M264.192,292.352    c-8.192,4.096-16.896,5.632-26.112,5.632c-35.84,0-64-31.232-59.392-68.096c2.56-18.432,13.312-34.816,29.696-44.032    c17.92-10.24,38.4-10.24,55.296-2.048l73.728-73.728c8.192-8.192,20.992-8.192,29.184,0c8.192,8.192,8.192,20.992,0,29.184    l-74.24,73.216C306.688,242.176,293.888,278.016,264.192,292.352z M398.336,258.56h-24.064c-11.264,0-20.48-9.216-20.48-20.48    c0-11.264,9.216-20.48,20.48-20.48h24.064c11.264,0,20.48,9.216,20.48,20.48C418.816,249.344,409.6,258.56,398.336,258.56z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#C2C7D0"/>
										</g>
									</g>
								</g> </svg>
							<div class="title">پادکست ها</div>
						</li>
					</a>

					<a href="{{ action('Admin\ArticleController@index') }}">
						<li class=" {{ request()->is('admin/home/articles*') ? 'sidebar-active' : '' }}">
							<svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 476.16 476.16" xml:space="preserve" width="512px" height="512px"><g>
									<g>
										<g>
											<path d="M238.08,0C106.496,0,0,106.496,0,238.08s106.496,238.08,238.08,238.08s238.08-106.496,238.08-238.08S369.664,0,238.08,0z     M217.6,77.824c0-11.264,9.216-20.48,20.48-20.48c11.264,0,20.48,9.216,20.48,20.48v24.064c0,11.264-9.216,20.48-20.48,20.48    c-11.264,0-20.48-9.216-20.48-20.48V77.824z M101.376,258.56H77.312c-11.264,0-20.48-9.216-20.48-20.48    c0-11.264,9.216-20.48,20.48-20.48h24.064c11.264,0,20.48,9.216,20.48,20.48C121.856,249.344,112.64,258.56,101.376,258.56z     M156.16,155.648c-8.192,8.192-20.992,8.192-29.184,0.512l-16.896-17.408c-8.192-8.192-8.192-20.992,0-29.184    c8.192-8.192,20.992-8.192,29.184,0l16.896,16.896C164.352,134.656,164.352,147.456,156.16,155.648z M264.192,292.352    c-8.192,4.096-16.896,5.632-26.112,5.632c-35.84,0-64-31.232-59.392-68.096c2.56-18.432,13.312-34.816,29.696-44.032    c17.92-10.24,38.4-10.24,55.296-2.048l73.728-73.728c8.192-8.192,20.992-8.192,29.184,0c8.192,8.192,8.192,20.992,0,29.184    l-74.24,73.216C306.688,242.176,293.888,278.016,264.192,292.352z M398.336,258.56h-24.064c-11.264,0-20.48-9.216-20.48-20.48    c0-11.264,9.216-20.48,20.48-20.48h24.064c11.264,0,20.48,9.216,20.48,20.48C418.816,249.344,409.6,258.56,398.336,258.56z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#C2C7D0"/>
										</g>
									</g>
								</g> </svg>
							<div class="title">مقالات</div>
						</li>
					</a>

					<a href="{{ action('Admin\SlideController@index') }}">
						<li class=" {{ request()->is('admin/home/slides*') ? 'sidebar-active' : '' }}">
							<svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 476.16 476.16" xml:space="preserve" width="512px" height="512px"><g>
									<g>
										<g>
											<path d="M238.08,0C106.496,0,0,106.496,0,238.08s106.496,238.08,238.08,238.08s238.08-106.496,238.08-238.08S369.664,0,238.08,0z     M217.6,77.824c0-11.264,9.216-20.48,20.48-20.48c11.264,0,20.48,9.216,20.48,20.48v24.064c0,11.264-9.216,20.48-20.48,20.48    c-11.264,0-20.48-9.216-20.48-20.48V77.824z M101.376,258.56H77.312c-11.264,0-20.48-9.216-20.48-20.48    c0-11.264,9.216-20.48,20.48-20.48h24.064c11.264,0,20.48,9.216,20.48,20.48C121.856,249.344,112.64,258.56,101.376,258.56z     M156.16,155.648c-8.192,8.192-20.992,8.192-29.184,0.512l-16.896-17.408c-8.192-8.192-8.192-20.992,0-29.184    c8.192-8.192,20.992-8.192,29.184,0l16.896,16.896C164.352,134.656,164.352,147.456,156.16,155.648z M264.192,292.352    c-8.192,4.096-16.896,5.632-26.112,5.632c-35.84,0-64-31.232-59.392-68.096c2.56-18.432,13.312-34.816,29.696-44.032    c17.92-10.24,38.4-10.24,55.296-2.048l73.728-73.728c8.192-8.192,20.992-8.192,29.184,0c8.192,8.192,8.192,20.992,0,29.184    l-74.24,73.216C306.688,242.176,293.888,278.016,264.192,292.352z M398.336,258.56h-24.064c-11.264,0-20.48-9.216-20.48-20.48    c0-11.264,9.216-20.48,20.48-20.48h24.064c11.264,0,20.48,9.216,20.48,20.48C418.816,249.344,409.6,258.56,398.336,258.56z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#C2C7D0"/>
										</g>
									</g>
								</g> </svg>
							<div class="title">اسلایدر</div>
						</li>
					</a>

				@endif
			</ul>
		</div>

		<div class="content">
			@yield('content')
		</div>
	</div>

</div>


</body>
</html>