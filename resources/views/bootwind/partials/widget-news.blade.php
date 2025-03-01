@php
    $newss = DB::table('news')->orderBy('id', 'desc')->limit(4)->get();
@endphp

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="oswald-regular text-light">Berita Terbaru</h2>
        </div>
    </div>
    <div class="row">

        @foreach ($newss as $i => $news)
            <div class="col-lg-3 col-sm-6">
                <div class="card card-style5">
                    @if (!empty($news->image))
                        <div class="card-header p-0 position-relative">
                            <a class="d-block blur-shadow-image">
                                <img src="{{ asset(Storage::url($news->image)) }}" alt="img-blur-shadow"
                                    class="img-fluid shadow w-100 object-fit-cover" style="max-height: 300px;"
                                    loading="lazy">
                            </a>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5>
                            <a href="{{ route('front.news.detail', ['slug' => $news?->slug]) }}"
                                class="text-dark oswald-bold font-weight-bold">{{ $news->title }}</a>
                        </h5>
                        <p class="text-justify">{{ Str::limit(strip_tags($news?->description), 200, '...') }}</p>
                        <a href="{{ route('front.news.detail', ['slug' => $news?->slug]) }}"
                            class="text-info text-sm icon-move-right">Read More
                            <i class="fas fa-arrow-right text-xs ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12 col-12 text-center pt-3">
            <a href="{{ route('front.news.detail') }}"
                class="btn btn-lg btn-danger btn-lg push-end align-items-center justify-content-center d-flex col-md-3 mx-auto text-nowrap">
                Lihat Berita Lainnya <i class="fa fa-arrow-circle-right ms-3" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
