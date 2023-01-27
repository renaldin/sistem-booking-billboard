@extends('layoutUser.main')

@section('content')
<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-9">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title line-height-50 text-white">Trizen.com is Your Trusted <br> Travel Companion.</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
    <div class="bread-svg-box">
        <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
    </div><!-- end bread-svg -->
</section>
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START ABOUT AREA
================================= -->
<section class="about-area padding-bottom-90px overflow-hidden mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading margin-bottom-40px">
                    <h2 class="sec__title">Tentang Kami</h2>
                    <h4 class="title font-size-16 line-height-26 pt-4 pb-2">Since 2002, TRIZEN has been revolutionising the travel industry. Metasearch for travel? No one was doing it. Until we did.</h4>
                    <p class="sec__desc font-size-16 pb-3">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                </div><!-- end section-heading -->
                <div class="row">
                    <div class="col-lg-6 responsive-column">
                        <div class="counter-item counter-item-layout-2 d-flex">
                            <div class="counter-icon flex-shrink-0">
                                <i class="la la-users"></i>
                            </div>
                            <div class="counter-content">
                                <div>
                                    <span class="counter" data-from="0" data-to="{{ $jumlahPartner }}"  data-refresh-interval="5">0</span>
                                </div>
                                <p class="counter__title">Partner</p>
                            </div><!-- end counter-content -->
                        </div><!-- end counter-item -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-6 responsive-column">
                        <div class="counter-item counter-item-layout-2 d-flex">
                            <div class="counter-icon flex-shrink-0">
                                <i class="la la-building"></i>
                            </div>
                            <div class="counter-content">
                                <div>
                                    <span class="counter" data-from="0" data-to="{{ $jumlahReklame }}"  data-refresh-interval="5">0</span>
                                </div>
                                <p class="counter__title">Reklame</p>
                            </div><!-- end counter-content -->
                        </div><!-- end counter-item -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-6 responsive-column">
                        <div class="counter-item counter-item-layout-2 d-flex">
                            <div class="counter-icon flex-shrink-0">
                                <i class="la la-user"></i>
                            </div>
                            <div class="counter-content">
                                <div>
                                    <span class="counter" data-from="0" data-to="{{ $jumlahUser }}"  data-refresh-interval="5">0</span>
                                </div>
                                <p class="counter__title">User</p>
                            </div><!-- end counter-content -->
                        </div><!-- end counter-item -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-6 responsive-column">
                        <div class="counter-item counter-item-layout-2 d-flex">
                            <div class="counter-icon flex-shrink-0">
                                <i class="la la-check-circle"></i>
                            </div>
                            <div class="counter-content">
                                <div>
                                    <span class="counter" data-from="0" data-to="{{ $jumlahOrder }}"  data-refresh-interval="5">0</span>
                                </div>
                                <p class="counter__title">Order</p>
                            </div><!-- end counter-content -->
                        </div><!-- end counter-item -->
                    </div><!-- end col-lg-3 -->
                </div><!-- end row -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-5 ml-auto">
                <div class="image-box about-img-box">
                    <img src="{{ asset('template/images/img24.jpg') }}" alt="about-img" class="img__item img__item-1">
                    <img src="{{ asset('template/images/img25.jpg') }}" alt="about-img" class="img__item img__item-2">
                </div>
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end about-area -->
<!-- ================================
    END ABOUT AREA
================================= -->

<!-- ================================
    START GALLERY AREA
================================= -->
<section class="gallery-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">Reklame</h2>
                    <p class="sec__desc pt-2">Klik gambarnya untuk melihat detail dari setiap reklame billboard.</p>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="full-width-slider padding-top-50px carousel-action">
        <?php $no = 1;?>
        @foreach ($reklame as $item)
        <div class="full-width-slide-item">
            <a class="d-block" href="/reklame/{{ $item->id_reklame }}" data-caption="Showing image {{ $no++ }}">
                <img src="{{ asset('foto_reklame/'.$item->gambar) }}" alt="{{ $item->lokasi }}">
            </a>
        </div><!-- end full-width-slide-item -->
        @endforeach
    </div><!-- end full-width-slider -->
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <a href="/reklame">
                        <p><b>Lihat Semua</b> <i class="la la-share icon-element"></i></p>
                    </a>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end gallery-area -->
<!-- ================================
    END GALLERY AREA
================================= -->


<!-- ================================
    START INFO AREA
================================= -->
<section class="info-area padding-top-100px padding-bottom-60px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title">Partner</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-100px justify-content-center">
            @foreach ($partner as $item)
            <div class="col-lg-4 responsive-column">
                <div class="card-item team-card">
                    <div class="card-img" style="padding-top: 60px">
                        <img src="{{ asset('foto_partner/'.$item->gambar) }}" style="width: 60%; height: 50%; border-radius: 0;"  alt="team-img">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $item->nama_partner }}</h3>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            @endforeach
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end info-area -->
<!-- ================================
    END INFO AREA
================================= -->

<!-- ================================
    START CTA AREA
================================= -->
<section class="cta-area cta-bg-2 bg-fixed section-padding text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <p class="sec__desc text-white">
                        Pilih reklame billboard dan langsung booking agar tidak dibooking orang lain.
                    </p>
                </div><!-- end section-heading -->
                <div class="btn-box padding-top-35px">
                    <a href="/reklame" class="theme-btn border-0">Booking Sekarang</a>
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cta-area -->
<!-- ================================
    END CTA AREA
================================= -->
@endsection