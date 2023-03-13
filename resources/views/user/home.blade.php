@extends('layoutUser.main')

@section('content')
<!-- ================================
    START HERO-WRAPPER AREA
================================= -->
<section class="hero-wrapper hero-wrapper7">
    <div class="hero-box hero-bg-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-content mt-0">
                        <div class="section-heading">
                            <h2 class="sec__title">Selamat Datang</h2>
                            <p class="sec__desc pt-3 font-size-18">Di Sistem Booking Reklame Billboard</p>
                        </div>
                    </div><!-- end hero-content -->
                </div><!-- end col-lg-7 -->
                <div class="col-lg-5">
                    <div class="search-fields-container search-fields-container-shape">
                        <div class="search-fields-container-inner">
                            <img src="{{ asset('template/images/img2.jpg') }}" alt="hotel-img" style="width: 100%;">
                        </div>
                    </div>
                </div><!-- end col-lg-5 -->
            </div><!-- end row -->
        </div><!-- end container -->
        <svg class="hero-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
            <polygon points="100 10 100 0 0 10"></polygon>
        </svg>
    </div>
</section><!-- end hero-wrapper -->
<!-- ================================
    END HERO-WRAPPER AREA
================================= -->

<!-- ================================
    START INFO AREA
================================= -->
<section class="info-area info-bg padding-top-50px padding-bottom-50px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="icon-box">
                    <div class="info-icon">
                        <i class="la la-bullhorn"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Reklame</h4>
                        <p class="info__desc">
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="icon-box margin-top-50px">
                    <div class="info-icon">
                       <i class="la la-globe"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Booking</h4>
                        <p class="info__desc">
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="icon-box">
                    <div class="info-icon">
                       <i class="la la-thumbs-up"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">FAQ</h4>
                        <p class="info__desc">
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end info-area -->
<!-- ================================
    END INFO AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START HOTEL AREA
================================= -->
<section class="hotel-area section-bg section-padding overflow-hidden padding-right-100px padding-left-100px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="section-heading">
                    <h2 class="sec__title">Top Billboard Places</h2>
                    <p class="sec__desc pt-3">Morbi convallis bibendum urna ut viverra Maecenas quis
                </div><!-- end section-heading -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="btn-box btn--box text-right">
                    <a href="/reklame" class="theme-btn">Lihat Semua</a>
                </div>
            </div>
        </div><!-- end row -->
        <div class="row padding-top-50px">
            <div class="col-lg-7">
                <div class="row">
                    @foreach ($empatReklame as $item)
                    <div class="col-lg-6">
                        <div class="card-item destination-card">
                            <div class="card-img">
                                <img src="{{ asset('foto_reklame/'.$item->gambar) }}" alt="destination-img">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="/reklame/{{ $item->id_reklame }}">{{ $item->lokasi }} ({{$item->ukuran}})</a></h3>
                                <div class="card-rating d-flex align-items-center">
                                    <span class="rating__text">{{ $item->alamat }}</span>
                                </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p class="tour__text">
                                        
                                    </p>
                                    <p>
                                        <strong>
                                        @if ($biodata->power_harga === 'On')
                                            <span class="price__from"><?= 'Rp ' . number_format($item->mulai_harga, 0, ',', '.'); ?> - <?= 'Rp ' . number_format($item->sampai_harga, 0, ',', '.'); ?></span>
                                            <span class="price__from"></span>
                                        @elseif($biodata->power_harga === 'Off')
                                            <span class="price__from">Harga?</span>
                                            <span class="price__from">Booking Dulu!</span>
                                        @endif
                                        </strong>
                                    </p>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                    </div>
                    @endforeach
                </div>
            </div><!-- end col-lg-4 -->
            <div class="col-lg-5">
                <div class="row">
                    @foreach ($satuReklame as $item)
                    <div class="col-lg-12">
                        <div class="card-item destination-card" style="height: 439px;">
                            <div class="card-img">
                                <img src="{{ asset('foto_reklame/'.$item->gambar) }}" style="height: 439px;" alt="destination-img">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="/reklame/{{ $item->id_reklame }}">{{ $item->lokasi }} ({{$item->ukuran}})</a></h3>
                                <div class="card-rating d-flex align-items-center">
                                    <span class="rating__text">{{ $item->alamat }}</span>
                                </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p class="tour__text">
                                        
                                    </p>
                                    <p>
                                        <strong>
                                            @if ($biodata->power_harga === 'On')
                                                <span class="price__from"><?= 'Rp ' . number_format($item->mulai_harga, 0, ',', '.'); ?> - <?= 'Rp ' . number_format($item->sampai_harga, 0, ',', '.'); ?></span>
                                                <span class="price__from"></span>
                                            @elseif($biodata->power_harga === 'Off')
                                                <span class="price__from">Harga?</span>
                                                <span class="price__from">Booking Dulu!</span>
                                            @endif
                                        </strong>
                                    </p>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                    </div><!-- end col-lg-4 -->
                    @endforeach
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hotel-area -->
<!-- ================================
    END HOTEL AREA
================================= -->

<!-- ================================
    START ABOUT AREA
================================= -->
<section class="about-area section--padding overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-content pr-5">
                    <div class="section-heading">
                        <h4 class="font-size-16 pb-2">Baca</h4>
                        <h2 class="sec__title">Tentang Kami</h2>
                        <p class="sec__desc pt-4 pb-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
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
                        <div class="col-lg-6 col-sm-6">
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
                        <div class="col-lg-6 col-sm-6">
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
                        <div class="col-lg-6 col-sm-6">
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
                </div>
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="image-box about-img-box">
                    <img src="{{ asset('template/images/img24.jpg') }}" alt="about-img" class="img__item img__item-1">
                    <img src="{{ asset('template/images/tripadvisor.png') }}" alt="about-img" class="img__item img__item-2">
                </div>
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- ================================
    END ABOUT AREA
================================= -->

<!-- ================================
    START DESTINATION AREA
================================= -->
<section class="destination-area section--padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title line-height-55">Most Popular Billboard</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            <div class="col-lg-12">
                <div class="hotel-card-wrap">
                    {{-- <div class="hotel-card-carousel carousel-action"> --}}
                    <div class="full-width-slider carousel-action">
                        @foreach ($reklame as $item)
                        <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="/reklame/{{ $item->id_reklame }}" class="d-block">
                                    <img src="{{ asset('foto_reklame/'.$item->gambar) }}" alt="Reklame Billboard {{ $item->lokasi }}">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">{{ $item->lokasi }} ({{$item->ukuran}})</a></h3>
                                <p class="card-meta">{{ $item->alamat }}</p>
                                <div class="card-price mt-3 d-flex align-items-center justify-content-between">
                                    <p>
                                        @if ($biodata->power_harga === 'On')
                                            <span class="price__from"><?= 'Rp ' . number_format($item->mulai_harga, 0, ',', '.'); ?> - <?= 'Rp ' . number_format($item->sampai_harga, 0, ',', '.'); ?></span>
                                            <span class="price__from"></span>
                                        @elseif($biodata->power_harga === 'Off')
                                            <span class="price__from">Harga?</span>
                                            <span class="price__from">Booking Dulu!</span>
                                        @endif
                                    </p>
                                    <a href="/reklame/{{ $item->id_reklame }}" class="btn-text">Booking<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                        @endforeach
                    </div><!-- end hotel-card-carousel -->
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container-fluid -->
</section><!-- end destination-area -->
<!-- ================================
    END DESTINATION AREA
================================= -->

<!-- ================================
       START TESTIMONIAL AREA
================================= -->
<section class="testimonial-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h2 class="sec__title line-height-50">Review dari Customer?</h2>
                    <p class="sec__desc padding-top-30px">
                        Silahkan baca review dari customer agar meyakinkan Anda untuk melakukan booking.
                    </p>
                    <div class="btn-box padding-top-35px">
                        <a href="/booking" class="theme-btn">Booking</a>
                    </div>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-8">
                <div class="testimonial-carousel carousel-action">
                    @foreach ($order as $item)
                    @if ($item->star !== NULL && $item->review !== NULL)
                        <div class="testimonial-card">
                            <div class="testi-desc-box">
                                <p class="testi__desc">{{ $item->review }}</p>
                            </div>
                            <div class="author-content d-flex align-items-center">
                                <div class="author-bio">
                                    <h4 class="author__title">{{ $item->nama }}</h4>
                                    <span class="author__meta">{{ $item->nama_perusahaan }}</span>
                                    <span class="ratings d-flex align-items-center">
                                        <?php for ($i=0; $i < $item->star; $i++) { ?>
                                            <i class="la la-star"></i>
                                        <?php } ?>
                                        <?php for ($i=0; $i < 5-$item->star; $i++) { ?>
                                            <i class="la la-star-o"></i>
                                        <?php } ?>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end testimonial-card -->
                    @endif
                    @endforeach
                </div><!-- end testimonial-carousel -->
            </div><!-- end col-lg-8 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end testimonial-area -->
<!-- ================================
       START TESTIMONIAL AREA
================================= -->

<!-- ================================
    START CTA AREA
================================= -->
<section class="cta-area padding-top-100px padding-bottom-180px text-center">
    <div class="video-bg">
        <video autoplay loop>
            <source src="{{ asset('template/video/video-bg.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title text-white line-height-55">Silahkan Klik Tombol Dibawah <br> Untuk Memilih Reklame Billboard Yang Akan Dibboking</h2>
                </div><!-- end section-heading -->
                <div class="btn-box padding-top-35px">
                    <a href="/reklame" class="theme-btn border-0">Pilih Reklame</a>
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <svg class="cta-svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M-31.31,170.22 C164.50,33.05 334.36,-32.06 547.11,196.88 L500.00,150.00 L0.00,150.00 Z"></path></svg>
</section><!-- end cta-area -->
<!-- ================================
    END CTA AREA
================================= -->

<!-- ================================
    START FAQ AREA
================================= -->
<section class="faq-area section-bg section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">Frequently Asked Questions</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-60px">
            <div class="col-lg-7">
                <div class="accordion accordion-item" id="accordionExample">
                    @foreach ($faq as $item)
                    <div class="card">
                        <div class="card-header" id="faqHeading{{ $item->id_faq }}">
                            <h2 class="mb-0">
                                <button class="btn btn-link d-flex align-items-center justify-content-between" type="button" data-toggle="collapse" data-target="#faqCollapse{{ $item->id_faq }}" aria-expanded="false" aria-controls="faqCollapse{{ $item->id_faq }}">
                                    <span>{{ $item->pertanyaan }}</span>
                                    <i class="la la-minus"></i>
                                    <i class="la la-plus"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="faqCollapse{{ $item->id_faq }}" class="collapse" aria-labelledby="faqHeading{{ $item->id_faq }}" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>
                                    {{ $item->jawaban }}
                                </p>
                            </div>
                        </div>
                    </div><!-- end card -->             
                    @endforeach
                </div>
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="faq-forum pl-4">
                    <div class="form-box border">
                        <div class="form-title-wrap">
                            <h3 class="title">Masih punya pertanyaan?</h3>
                        </div><!-- form-title-wrap -->
                        <div class="form-content">
                            <div class="contact-form-action">
                                <div class="mb-2">
                                    @if (session('berhasil'))    
                                        <div class="alert bg-primary text-white alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            {{ session('berhasil') }}
                                        </div>
                                    @endif
                                </div>
                                <form action="/pertanyaan" method="POST">
                                    @csrf
                                    <div class="input-box">
                                        <label class="label-text">Nama Anda</label>
                                        <div class="form-group">
                                            <span class="la la-user form-icon"></span>
                                            <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Anda" required>
                                        </div>
                                        @error('nama')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="input-box">
                                        <label class="label-text">Email Anda</label>
                                        <div class="form-group">
                                            <span class="la la-envelope-o form-icon"></span>
                                            <input class="form-control" type="email" name="email" placeholder="Masukkan Alamat Email" required>
                                        </div>
                                        @error('email')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="input-box">
                                        <label class="label-text">Pertanyaan</label>
                                        <div class="form-group">
                                            <span class="la la-pencil form-icon"></span>
                                            <textarea class="message-control form-control" name="pertanyaan" placeholder="Ketik Pertanyaan Anda" required></textarea>
                                        </div>
                                        @error('pertanyaan')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="btn-box">
                                        <button type="submit" class="theme-btn">Kirim Pertanyaan <i class="la la-arrow-right ml-1"></i></button>
                                    </div>
                                </form>
                            </div><!-- end contact-form-action -->
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                </div><!-- end faq-forum -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end faq-area -->
<!-- ================================
    END FAQ AREA
================================= -->

<!-- ================================
       START CLIENTLOGO AREA
================================= -->
<section class="clientlogo-area padding-top-80px padding-bottom-80px text-center">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">Partner</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="client-logo">
                    @foreach ($partner as $item)
                    <div class="client-logo-item">
                        <img src="{{ asset('foto_partner/'.$item->gambar) }}" alt="{{ $item->nama_partner }}">
                    </div><!-- end client-logo-item -->
                    @endforeach
                </div><!-- end client-logo -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end clientlogo-area -->
<!-- ================================
       START CLIENTLOGO AREA
================================= -->

@endsection