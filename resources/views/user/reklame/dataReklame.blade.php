@extends('layoutUser.main')

@section('content')
<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-10">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content text-center">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">{{ $title }}</h2>
                        </div>
                        <span class="arrow-blink">
                            <i class="la la-arrow-down"></i>
                        </span>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
    <div class="bread-svg-box">
        <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
    </div><!-- end bread-svg -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START GALLERY AREA
================================= -->
<section class="card-area section--padding padding-right-100px padding-left-100px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="filter-wrap margin-bottom-30px">
                    <div class="filter-top d-flex align-items-center justify-content-between pb-4">
                        <div>
                            <h3 class="title font-size-24">{{ $jumlahReklame }} Reklame Billboard</h3>
                            <p class="font-size-14 line-height-20 pt-1">Silahkan pilih dan lakukan booking.</p>
                        </div>
                    </div><!-- end filter-top -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- ================================
                                START CTA AREA
                            ================================= -->
                            <section class="cta-area subscriber-area section-bg-2 padding-top-60px padding-bottom-60px">
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-lg-7">
                                            <div class="section-heading">
                                                @if($keyword !== NULL)<h4 class="sec__title font-size-20 text-white"> Hasil pencarian: {{$keyword}}</h4>@endif
                                            </div><!-- end section-heading -->
                                        </div><!-- end col-lg-7 -->
                                        <div class="col-lg-5">
                                            <div class="subscriber-box">
                                                <div class="contact-form-action">
                                                    <form action="/reklame" method="POST">
                                                        @csrf
                                                        <div class="input-box">
                                                            <div class="form-group mb-0">
                                                                <input class="form-control" type="text" name="keyword" placeholder="Masukkan Lokasi, Ukuran, atau Alamat" @if($keyword !== NULL)value="{{$keyword}}"@endif>
                                                                <button class="theme-btn theme-btn-small submit-btn" type="submit">Cari</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- end section-heading -->
                                        </div><!-- end col-lg-5 -->
                                    </div><!-- end row -->
                                </div><!-- end container -->
                            </section><!-- end cta-area -->
                            <!-- ================================
                                END CTA AREA
                            ================================= -->

                        </div>
                    </div><!-- end filter-bar -->
                </div><!-- end filter-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
       <div class="row">
        @foreach ($reklame as $item)
        @if($item->status === 'Belum Dipesan' || $item->status === 'Sudah Dibooking')
        <div class="col-lg-4 responsive-column">
            <div class="card-item ">
                <div class="card-img">
                    <a href="/reklame/{{ $item->id_reklame }}" class="d-block">
                        <img src="{{ asset('foto_reklame/'.$item->gambar) }}" alt="{{ $item->ukuran }}">
                    </a>
                </div>
                <div class="card-body">
                    <h3 class="card-title"><a href="/reklame/{{ $item->id_reklame }}">{{ $item->lokasi }} ({{$item->ukuran}})</a></h3>
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
        </div><!-- end col-lg-4 -->
        @endif
        @endforeach
       </div><!-- end row -->
    </div><!-- end container-fluid -->
</section><!-- end card-area -->
<!-- ================================
<!-- ================================
    END GALLERY AREA
================================= -->

@endsection