<!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0" id="top">
	<div class="row">
		<div class="col-12">
			<nav
				class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 p-2 start-0 end-0 mx-4">
				<div class="container-fluid px-0">
					<img src="{{ asset(Storage::url( Modules\Setting\App\Models\SettingModel::where('code','global.web_logo')->first()->value ?? 'front/img/logo-taebo.jpeg')) }}" width="60"/>
					<a class="navbar-brand font-weight-bolder ms-sm-3 text-sm"
						href=""{{ url('/') }}" rel="tooltip"
						title="Designed and Coded by Creative Tim" data-placement="bottom">
						<h4 class="p-0 m-0 text-strong">
							{{ Modules\Setting\App\Models\SettingModel::where('code','global.web_title')->first()->value }}
						</h4>
					</a>
					<button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
						data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
						aria-label="Toggle navigation">
						<span class="navbar-toggler-icon mt-2">
							<span class="navbar-toggler-bar bar1"></span>
							<span class="navbar-toggler-bar bar2"></span>
							<span class="navbar-toggler-bar bar3"></span>
						</span>
					</button>
					<div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
						
						@include (env('THEME_PATH').'.partials.main-menu1')
					</div>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
	</div>
</div>
