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
    START BOOKING AREA
================================= -->
<section class="booking-area padding-top-100px padding-bottom-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="form-box">
                    <div class="single-content-wrap padding-top-60px padding-left-30px padding-right-30px">
                        <div id="description" class="page-scroll">
                            <div class="single-content-item pb-4">
                                <h3 class="title font-size-26">{{$reklame->lokasi}} ({{$reklame->ukuran}})</h3>
                                <div class="d-flex flex-wrap align-items-center pt-2">
                                    <p class="mr-2">{{ $reklame->alamat }}</p>
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end description -->
                        <div id="reviews" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Reviews</h3>
                                <div class="review-container padding-top-30px">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <div class="review-summary">
                                                <h2>{{$star}}<span>/{{$jumlahOrder}}</span></h2>
                                                <p>Excellent</p>
                                                <span>Dari {{$jumlahOrder}} reviewer</span>
                                            </div>
                                        </div><!-- end col-lg-4 -->
                                    </div>
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end reviews -->
                        <div class="review-box">
                            <div class="single-content-item padding-top-40px">
                                <h3 class="title font-size-20">Review Pengguna</h3>
                                <div class="comments-list padding-top-50px">
                                    <div class="comment">
                                        <div class="comment-body">
                                            @foreach ($order as $item)
                                            @if($item->star !== null)
                                            <div class="meta-data">
                                                <h3 class="comment__author">{{ $item->nama }}</h3>
                                                <div class="meta-data-inner d-flex">
                                                    <span class="ratings d-flex align-items-center mr-1">
                                                        <?php for ($i=0; $i < $item->star; $i++) { ?>
                                                            <i class="la la-star"></i>
                                                        <?php } ?>
                                                        <?php for ($i=0; $i < 5-$item->star; $i++) { ?>
                                                            <i class="la la-star-o"></i>
                                                        <?php } ?>
                                                    </span>
                                                    <p class="comment__date">{{ date('d F Y', strtotime($item->tanggal)) }}</p>
                                                </div>
                                            </div>
                                            <p class="comment-content">
                                               {{ $item->review }}
                                            </p>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="btn-box load-more text-center mb-3">
                                        <a href="/reklame/{{ $reklame->id_reklame }}" class="theme-btn theme-btn-small theme-btn-transparent">Kembali</a>
                                    </div>
                                </div><!-- end comments-list -->
                            </div><!-- end single-content-item -->
                        </div><!-- end review-box -->
                    </div><!-- end single-content-wrap -->
                </div><!-- end form-box -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-2"></div>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end booking-area -->
<!-- ================================
    END BOOKING AREA
================================= -->


@endsection