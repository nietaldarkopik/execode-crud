@extends('front.master-front')

@section('content')
    <div class="container-fluid mt-5 py-5 bg-warning overflow-hidden">
        <div class="swiper-container py-5 my-5">
            <div class="swiper-wrapper">
                @foreach (\App\Models\SliderModel::where('status', '=', 1)->get() as $i => $slider)
                    <div class="swiper-slide p-3 d-flex flex-column justify-content-end"
                        style="background-image: url('{{ asset('uploads/sliders/' . $slider->image) }}')">
                        <div class="bg-white w-100 p-2 mt-auto mb-0 opacity-75">
                            <h4 class="poppins-bold my-1 fs-6">{{ $slider->judul }}</h4>
                            <p class="my-1 lato-regular fs-6">{{ $slider->keterangan }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            {{-- <div class="swiper-scrollbar"></div> --}}
        </div>
    </div>
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center mt-0 shadow m-0 shadow-y-10 overflow-visible">
        <div class="container">

            <div class="row">
                @foreach (\App\Models\HomeWidgetModel::where('status', '=', 1)->get() as $i => $hw)
                    <div class="col position-relative px-auto">
                        <div class="card text-start card-badge-home shadow shadow-y-10">
                            <img class="card-img" src="{{ asset('uploads/widgets/' . $hw->image) }}" alt="Title" />
                            <div class="card-footer position-absolute bottom-0 w-100 d-block bg-light opacity-75">
                                <h4 class="card-title float-start oswald-bold">{{ $hw->judul }}</h4>
                                <div class="float-end">
                                    <a href="{{ $hw->url }}" class="btn btn-primary btn-sm float-right opacity-100">
                                        Lihat Data <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                                {{-- <p class="card-text">Body</p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-5 pt-3">
                <div class="col-lg-10 col-12 mx-auto d-flex flex-column justify-content-center">
                    {{-- <h1 data-aos="fade-up" class="poppins-light text-center text-color-4 fs-1">Selamat Datang di Website</h1> --}}
                    <h1 data-aos="fade-up" class="poppins-light text-center text-color-4 fs-4 mb-2">Sistem Informasi
                        Prasarana, Sarana dan Utilitas (SI-PSU)
                        Kalimantan Selatan</h1>
                    <p data-aos="fade-up" data-aos-delay="400" class="lato-light-italic fs-5  text-center">
                        Sistem yang digunakan untuk mengumpulkan, menyimpan, mengelola, dan menganalisis data terkait dengan
                        Prasarana, Sarana dan Utilitas di
                        wilayah Kalimantan Selatan.</p>
                    <!-- <div data-aos="fade-up" data-aos-delay="600">
                          <div class="text-center text-lg-start">
                            <a href="#about"
                              class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                              <span>Get Started</span>
                              <i class="bi bi-arrow-right"></i>
                            </a>
                          </div>
                        </div> -->
                </div>
                <!-- <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ asset('uploads/pages/image1 (3).jpeg') }}" class="img-fluid" alt="">
                      </div> -->
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <!-- <section id="about" class="about">

                    <div class="container" data-aos="fade-up">
                      <div class="row gx-0">

                        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                          <div class="content">
                            <h3>Who We Are</h3>
                            <h2>Expedita voluptas omnis cupiditate totam eveniet nobis sint iste. Dolores est repellat corrupti
                              reprehenderit.</h2>
                            <p>
                              Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor consequatur
                              itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit voluptatum nam et est corrupti.
                            </p>
                            <div class="text-center text-lg-start">
                              <a href="#"
                                class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Read More</span>
                                <i class="bi bi-arrow-right"></i>
                              </a>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                          <img src="{{ asset('front/img/about.jpg') }}" class="img-fluid" alt="">
                        </div>

                      </div>
                    </div>

                  </section> --><!-- End About Section -->

        <!-- ======= Values Section ======= -->
        <!-- <section id="values" class="values">

                    <div class="container" data-aos="fade-up">

                      <header class="section-header">
                        <h2>Our Values</h2>
                        <p>Odit est perspiciatis laborum et dicta</p>
                      </header>

                      <div class="row">

                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                          <div class="box">
                            <img src="{{ asset('front/img/values-1.png"') }} class="img-fluid" alt="">
                            <h3>Ad cupiditate sed est odio</h3>
                            <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.</p>
                          </div>
                        </div>

                        <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                          <div class="box">
                            <img src="{{ asset('front/img/values-2.png"') }} class="img-fluid" alt="">
                            <h3>Voluptatem voluptatum alias</h3>
                            <p>Repudiandae amet nihil natus in distinctio suscipit id. Doloremque ducimus ea sit non.</p>
                          </div>
                        </div>

                        <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                          <div class="box">
                            <img src="{{ asset('front/img/values-3.png"') }} class="img-fluid" alt="">
                            <h3>Fugit cupiditate alias nobis.</h3>
                            <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.</p>
                          </div>
                        </div>

                      </div>

                    </div>

                  </section> --><!-- End Values Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts shadowx py-5 m-0 my-5 bg-body-tertiaryx">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">
                    <header class="section-header">
                        <p>Rekapitulasi Data PSU</p>
                    </header>
                </div>
				@php
				$perkim_sudahbast = \App\Models\PerkimModel::perkimUnion()->where(function($query) {
					$query->whereNotNull('no_bast')->where('no_bast','<>','')->where('no_bast','<>','-')->where('no_bast','<>','0');
				});
			
				$perkim_belumbast = \App\Models\PerkimModel::perkimUnion()->where(function($query) {
					$query->whereNull('no_bast')->orWhere('no_bast','=','')->orWhere('no_bast','=','-')->orWhere('no_bast','=','0');
				});

				@endphp
                <div class="row gy-4 mb-2 d-flex justify-content-center align-items-center">
					
					<div class="col-lg-4 col-md-4">
						<div class="count-box">
							<i class="bi bi-file-earmark-x" style="color: #ff0000;"></i>
                            <div>
								<span data-purecounter-start="0" data-purecounter-end="{{ $perkim_belumbast->get()->count() }}" data-purecounter-duration="1"
                                    class="purecounter"></span>
									<p>Belum BAST</p>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4">
						<div class="count-box">
							<i class="bi bi-file-earmark-check" style="color: #43e509;"></i>
							<div>
								<span data-purecounter-start="0" data-purecounter-end="{{ $perkim_sudahbast->get()->count() }}" data-purecounter-duration="1"
									class="purecounter"></span>
								<p>Sudah BAST</p>
							</div>
						</div>
					</div>
                </div>
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-4">
                        <div class="count-box">
                            <i class="bi bi-buildings-fill" style="color: #0050b8;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ \App\Models\PerumahanModel::all()->count() }}" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Total Perumahan</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="count-box">
                            <i class="bi bi-houses-fill" style="color: #ffd000;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ \App\Models\PermukimanModel::all()->count() }}" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Total Permukiman</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="count-box">
                            <i class="bi bi-signpost-2-fill" style="color: #057738;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ \App\Models\PsuPerumahanModel::all()->count() }}" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Total PSU</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features shadow shadow-y-10 py-5 m-0 my-5 bg-body-tertiaryx bg-white">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <!-- <h2>Features</h2> -->
                    <p>Jenis Data PSU</p>
                </header>

                <div class="row">

                    {{-- <div class="col-lg-12">
                        <img src="{{ asset('front/img/pages/2.png') }}" class="img-fluid" alt=""
                            data-aos="zoom-out" data-aos-delay="200">
                    </div> --}}

                    <div class="col-lg-12 mt-5 mt-lg-0 d-flex">
                        <div class="row align-self-center gy-4">
							@foreach(\App\Models\JenisPsuModel::all() as $i => $jp)
                            <div class="col-md-3" data-aos="zoom-out" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $jp->title }}</h3>
                                </div>
                            </div>
							@endforeach
                        </div>
                    </div>

                </div> <!-- / row -->

            </div>

        </section><!-- End Features Section -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq shadow shadow-y-10 py-5 m-0 my-5 bg-white">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>F.A.Q</h2>
                    <p>Pertanyaan Umum</p>
                </header>

                <div class="row">
                    <div class="col-lg-12">
						<div class="col-lg-12">
                        <div class="accordion accordion-flush" id="faqlist1">
                            @foreach (\App\Models\FaqModel::orderBy('sort_order', 'asc')->where(function ($query) {
                $query->where('status', '=', 1);
                $query->where(function ($query2) {
                    $query2->where('id_parent', '=', 0);
                    $query2->orWhereNull('id_parent');
                });
            })->get() as $i => $faq)
                                <div class="accordion-item">

                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-head{{ $faq->id }}" aria-expanded="false" aria-controls="accordion-head{{ $faq->id }}"
                                            <strong>{!! $faq->text !!}</strong>
                                        </button>
                                    </h2>
                                    <div id="accordion-head{{ $faq->id }}" class="accordion-collapse collapse p-0" data-bs-parent="accordion-head{{ $faq->id }}">
                                        <div class="accordion-body" style="background-color: var(--bs-gray-100) !important;">
                                            @foreach (\App\Models\FaqModel::orderBy('sort_order', 'asc')->where(function ($query) use ($faq) {
                $query->where('status', '=', 1);
                $query->where('id_parent', '=', $faq->id);
            })->get() as $i2 => $subfaq)
                                                {!! $subfaq->text !!}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

        </section><!-- End F.A.Q Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials bg-body-tertiary">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Perumahan</h2>
                    <p>Highlight Data Perumahan</p>
                </header>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-wrapper">
						@foreach (\App\Models\PerkimModel::perkimUnion()->where(function($query){
							$query->where('photo','!=','');
							$query->whereNotNull('photo');
							$query->where('photo', '<>', '');
							$query->where('photo', 'NOT LIKE', ' ');
							$query->where('photo', 'NOT LIKE', '% ');
						})->limit(10)->orderBy('jenis_perkim','desc')->get() as $i => $perkim)
							@php
							$detail = ($perkim->jenis_perkim == 'perumahan')?\App\Models\PerumahanModel::find($perkim->id)?->get()->first():\App\Models\PermukimanModel::find($perkim->id)?->get()->first();
							$photo = $detail?->photo;
							@endphp
							<div class="swiper-slide"
								style="background-image: url('{{ asset('storage/uploads/'.$perkim->jenis_perkim.'/photo/'.$photo) }}');">
								<div class="testimonial-item">
									<div class="post-box">
										<div class="post-img">
											<img src="{{ asset('storage/uploads/'.$perkim->jenis_perkim.'/photo/'.$photo) }}" class="img-fluid" alt="">
										</div>
										<h3 class="post-title">{{ Str::title($perkim->jenis_perkim) }} {{ $perkim->nama_perumahan }}</h3>
										@if($perkim->jenis_perkim == 'perumahan')
										<h4 class="post-title">{{$perkim->nama_pengembang}}</h4>
										@endif
										<a class="btn btn-sm rounded-5 mt-2 btn-primary" href="{{ route('front.'.$perkim->jenis_perkim.'.detail',['id' => $perkim->id])}}">
											Selengkapnya <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
										</a>
										<!-- <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
										class="bi bi-arrow-right"></i></a> -->
									</div>
								</div>
							</div><!-- End testimonial item -->
							
						@endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- End Testimonials Section -->
	</main><!-- End #main -->
@endsection

@section('footer-content')
    @include('front.partials.footer-content')
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
