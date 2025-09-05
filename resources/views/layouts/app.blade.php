<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'BookShop') }}</title>

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.bunny.net">
		<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

		{{-- flowbite library --}}
		<link
		rel="stylesheet" href="{{ asset('css/flowbite.css') }}">

		<!-- SweetAlert2 -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		 {{-- bootstrap  --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">


		<!-- jQuery -->
		 <link rel="stylesheet" href="{{ asset('css/dataTables.dataTables.min.css') }}">
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


	<!-- Scripts -->
		@vite(['resources/css/app.css', 'resources/js/app.js'])

	</head>

	<body class="font-sans antialiased">

		<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
			<span class="sr-only">Open sidebar</span>
			<svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
				<path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
			</svg>
		</button>

		<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
			<div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
				<div class="mb-6 text-center">
					<a href="{{ route('dashboard') }}"><h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">RY-Booking</h1></a>
				</div>
				<ul class="space-y-2 font-medium">
                    <li>
						<a href="{{ route('profile.index') }}" class="flex items-center p-2 rounded-lg text-gray-700 dark:text-gray-200
							hover:bg-blue-100 dark:hover:bg-blue-900 transition group">
							<i class="fa-solid fa-user text-blue-500 text-lg"></i>
							<span class="ms-3"> Welcome : {{ Auth::user()->name }}</span>
						</a>
					</li>
					<li>
						<a href="{{ route('dashboard') }}" class="flex items-center p-2 rounded-lg text-gray-700 dark:text-gray-200
							hover:bg-blue-100 dark:hover:bg-blue-900 transition group">
							<i class="fa-solid fa-house text-blue-500 text-lg"></i>
							<span class="ms-3">Main Page</span>
						</a>
					</li>
                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <li>
						<a href="{{ route('students.index') }}" class="flex items-center p-2 rounded-lg text-gray-700 dark:text-gray-200
								hover:bg-purple-100 dark:hover:bg-purple-900 transition group">
							<i class="fa-solid fa-user-graduate text-purple-500 text-lg"></i>
							<span class="ms-3">Students</span>
						</a>
					</li>
                    @endif
					

					<li>
						<a href="{{ route('books.index') }}" class="flex items-center p-2 rounded-lg text-gray-700 dark:text-gray-200
							hover:bg-emerald-100 dark:hover:bg-emerald-900 transition group">
							<i class="fa-solid fa-book text-emerald-500 text-lg"></i>
							<span class="ms-3">Books</span>
						</a>
					</li>

					<li>
						<a href="{{ route('borrows.index') }}" class="flex items-center p-2 rounded-lg text-gray-700 dark:text-gray-200
								hover:bg-amber-100 dark:hover:bg-amber-900 transition group">
							<i class="fa-solid fa-handshake text-amber-500 text-lg"></i>
							<span class="ms-3">Borrows</span>
						</a>
					</li>

					<li>
						<form method="POST" action="{{ route('logout') }}">
							@csrf
							<button type="submit" class="flex items-center w-full p-2 rounded-lg text-gray-700 dark:text-gray-200
									hover:bg-red-100 dark:hover:bg-red-900 transition group">
								<i class="fa-solid fa-sign-out-alt text-red-500 text-lg"></i>
								<span class="ms-3">Logout</span>
							</button>
						</form>
					</li>


				</ul>
			</div>
		</aside>

		<div class="p-4 sm:ml-64">
			<div
				class="p-4">{{ $slot }}
			</div>
		</div>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

		<script src="{{ asset('js/flowbite.js') }}"></script>
		<script src="{{ asset('js/browser@4.js') }}"></script>
		<!-- SweetAlert2 -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		@if(session('success'))
            <script>
                Swal.fire({icon: 'success', title: 'Success', text: '{{ session('success') }}', confirmButtonText: 'OK'});
            </script>
        @endif

		@if(session('error'))
            <script>
                Swal.fire({icon: 'error', title: 'Error', text: '{{ session('error') }}', confirmButtonText: 'Back'});
            </script>
        @endif

	</body>


</html>
