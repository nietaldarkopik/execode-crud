@extends(env('THEME_PATH') . '.master-front')

@section('content')
	<div class="container">
		<div class="row pt-300">
			<div class="col">
				<div
					class="card bg-green-900 backdrop-blur-md shadow-lg border border-blue-900 rounded-20 text-white max-w-sm bg-transparent">
					<div class="card-body rounded-(20)">
						<h5 class="text-lg font-bold">Glassmorphism Card</h5>
						<p class="text-sm">Card dengan efek kaca yang modern dan elegan.</p>
						<a href="#" class="btn btn-primary mt-3">Lihat Detail</a>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card shadow-lg transform transition hover:-translate-y-2 hover:shadow-2xl p-4 rounded-lg">
					<img src="https://source.unsplash.com/300x200/?nature" class="card-img-top rounded-md">
					<div class="card-body">
						<h5 class="font-bold text-lg">3D Hover Card</h5>
						<p class="text-gray-600">Card ini akan naik saat di-hover.</p>
						<button class="btn btn-outline-primary mt-3">Coba</button>
					</div>
				</div>
			</div>
			<div class="col">
				<div
					class="card p-4 shadow-lg rounded-xl bg-gradient-to-br from-blue-500 to-purple-500 text-white max-w-sm">
					<div class="card-body">
						<h5 class="text-lg font-bold">Gradient Card</h5>
						<p class="text-sm">Card ini menggunakan kombinasi warna gradient.</p>
						<button class="btn btn-light mt-3">Lihat Selengkapnya</button>
					</div>
				</div>

			</div>
			<div class="col">
				<div class="card flex items-center gap-4 p-4 shadow-lg border rounded-xl max-w-md">
					<img src="https://source.unsplash.com/80x80/?face" class="rounded-full border-2 border-blue-500">
					<div>
						<h5 class="text-lg font-bold">John Doe</h5>
						<p class="text-sm text-gray-600">Frontend Developer</p>
						<span class="badge bg-success">Online</span>
					</div>
				</div>

			</div>
			<div class="col">
				<div class="relative w-64 h-40 group">
					<div class="absolute inset-0 transform transition duration-700 group-hover:rotate-y-180">
						<div
							class="absolute inset-0 bg-blue-500 text-white flex items-center justify-center p-4 rounded-xl shadow-lg">
							<h5 class="text-lg font-bold">Depan</h5>
						</div>
						<div
							class="absolute inset-0 bg-gray-800 text-white flex items-center justify-center p-4 rounded-xl shadow-lg rotate-y-180">
							<h5 class="text-lg font-bold">Belakang</h5>
						</div>
					</div>
				</div>

			</div>
			<div class="col">

			</div>
		</div>
	</div>
@endsection

@section('footer-content')
	@include(env('THEME_PATH') . '.partials.footer-content')
@endsection

@section('css')
	@parent
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" preload />
	<link rel="stylesheet" href="{{ asset('css/slider.css') }}" />
@endsection
@section('js')
	@parent
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
	<script src="{{ asset('js/slider.js') }}"></script>
@endsection