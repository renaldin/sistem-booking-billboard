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
<section class="gallery-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">Semua Reklame</h2>
                    <p class="sec__desc pt-2">Semua reklame billboard ada di halaman ini. Untuk melihat detail, bisa klik gambarnya.</p>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            <?php $no=1;?>
            @foreach ($reklame as $item)
            <div class="col-lg-4">
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
                                    <span class="price__from">Harga?</span>
                                    <span class="price__from"><a href="/reklame/{{ $item->id_reklame }}" class="text-white">Booking Dulu!</a></span>
                                </strong>
                            </p>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div>
            @endforeach
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end gallery-area -->
<!-- ================================
    END GALLERY AREA
================================= -->


@endsection