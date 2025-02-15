{{-- @extends('member::layouts.master') --}}
@extends(env('THEME_PATH') . '.master-front')

@section('content')
    <!-- -------- START HEADER 4 w/ search book a ticket form ------- -->
    <header>
        <div class="page-header min-height-400" loading="lazy"></div>
    </header>
    @include(env('THEME_PATH') . '.partials.member-summary')
    <!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="text-light oswald-regular">Anggota Taebo</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-style5">
                        <div class="card-body">
                            <div class="row">

                                @foreach ($members as $i => $member)
                                    <div class="col-lg-6 col-12 mb-5">
                                        <div class="card card-profile mt-4">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                                    {{-- <a
												href="{{ route('front.member.detail', ['slug' => $member->id . '-' . Str::slug($member->nama)]) }}"> --}}
                                                    <div class="p-3 pe-md-0">
                                                        @if (!empty($member->photo))
                                                            <img class="w-100 border-radius-md shadow-lg"
                                                                src="{{ asset(Storage::url($member->photo)) }}"
                                                                alt="Anggota Taebo - {{ $member->nama }}">
                                                        @else
                                                            <img class="w-100 border-radius-md shadow-lg"
                                                                src="{{ asset('front/img/logo-taebo.jpeg') }}"
                                                                alt="Anggota Taebo - {{ $member->nama }}">
                                                        @endif
                                                    </div>
                                                    {{-- </a> --}}
                                                </div>
                                                <div class="col-lg-8 col-md-6 col-12 my-auto">
                                                    <div class="card-body ps-lg-0">
                                                        <h5 class="mb-0">{{ $member->nama }}</h5>
                                                        <h6 class="text-info">{{ $member->member_type?->title ?? '' }}</h6>
                                                        <p class="mb-0">{{ $member->geup?->title ?? '' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
							<div class="row">
								<!-- Pagination Links -->
								<div class="col-md-12">
									{{ $members->links() }}
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Back To Top Button -->
    <div id="backtotop"><a href="#top"></a></div>
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
