@php
    $articles = DB::table('articles')->orderBy('id', 'desc')->limit(4)->get();
@endphp

<!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-5 mb-4">
    <!-- START Blogs w/ 4 cards w/ image & text & link -->
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="oswald-regular text-light">Article Terbaru</h2>
                </div>
            </div>
            <div class="row">

				@foreach($articles as $i => $article)
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-plain bg-warning">
						@if(!empty($article->image))
                        <div class="card-header p-0 position-relative">
                            <a class="d-block blur-shadow-image">
                                <img src="{{ asset(Storage::url($article->image)) }}" alt="img-blur-shadow"
                                    class="img-fluid shadow border-radius-lg w-100 object-fit-cover" style="max-height: 300px;" loading="lazy">
                            </a>
                        </div>
						@endif
                        <div class="card-body">
                            <h5>
                                <a href="{{ route('front.article.detail',['slug' => $article?->slug]) }}" class="text-dark oswald-bold font-weight-bold">{{ $article->title }}</a>
                            </h5>
                            <p class="text-justify text-dark">{{ Str::limit(strip_tags($article?->description), 200, '...') }}</p>
                            <a href="{{ route('front.article.detail',['slug' => $article?->slug]) }}" class="text-light text-sm icon-move-right">Read More
                                <i class="fas fa-arrow-right text-xs ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
				@endforeach
            </div>
			<div class="row">
                <div class="col-lg-12 col-12 text-center">
					<a href="{{ route('front.article.detail')}}" class="btn btn-lg btn-danger btn-lg push-end align-items-center justify-content-center d-flex col-md-3 mx-auto">
						Lihat Berita Lainnya <i class="fa fa-arrow-circle-right ms-3" aria-hidden="true"></i>
					</a>
				</div>
			</div>
        </div>
    </section>
    <!-- END Blogs w/ 4 cards w/ image & text & link -->
</div>
