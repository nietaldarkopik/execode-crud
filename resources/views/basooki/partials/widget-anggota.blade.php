@php
    //$members = DB::table('members')->orderBy('id','desc')->limit(4)->get();
    $members = Modules\Member\App\Models\MemberModel::orderBy('id', 'desc')->limit(4)->get();
@endphp

<!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
<div class="container">
    <div class="card card-body card-style5">
        <!-- START Blogs w/ 4 cards w/ image & text & link -->
        <section class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="oswald-regular text-light">Anggota Taebo</h2>
                    </div>
                </div>
                <div class="row">

                    @foreach ($members as $i => $member)
                        <div class="col-lg-6 col-12 mb-5">
                            <div class="card card-profile mt-4">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                        <a
                                            href="{{ route('front.member.detail', ['slug' => $member->id . '-' . Str::slug($member->nama)]) }}">
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
                                        </a>
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
                    <div class="col-lg-12 col-12 text-center">
                        <a href="{{ route('front.member.detail') }}"
                            class="btn btn-lg btn-danger btn-lg push-end align-items-center justify-content-center d-flex col-md-3 mx-auto">
                            Lihat Anggota Lainnya <i class="fa fa-arrow-circle-right ms-3" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- END Testimonials w/ user image & text & info -->
    </div>
</div>
