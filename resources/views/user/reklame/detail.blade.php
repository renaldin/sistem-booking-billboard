@extends('layoutUser.main')

@section('content')

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-2 py-0">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-btn">
                        <div class="btn-box">
                            <a class="theme-btn" data-fancybox="video" data-src="https://www.youtube.com/watch?v=0GZSfBuhf6Y"
                               data-speed="700">
                            </a>
                            <a class="theme-btn" data-src="images/destination-img.jpg"
                               data-fancybox="gallery"
                               data-caption="Showing image - 01"
                               data-speed="700">
                            </a>
                        </div>
                    </div><!-- end breadcrumb-btn -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START TOUR DETAIL AREA
================================= -->
<section class="tour-detail-area padding-bottom-90px">
    <div class="single-content-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content-wrap padding-top-60px">
                        <div id="description" class="page-scroll">
                            <div class="single-content-item pb-4">
                                <h3 class="title font-size-26">{{$reklame->lokasi}} ({{$reklame->ukuran}})</h3>
                                <div class="d-flex flex-wrap align-items-center pt-2">
                                    <p class="mr-2">{{ $reklame->alamat }}</p>
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="single-content-item padding-bottom-40px">
                                <h3 class="title font-size-20">Orientation Page</h3>
                                <p class="pb-4">{{ $reklame->orientation_page }}</p>
                                <h3 class="title font-size-20">Penerangan</h3>
                                <p class="pb-4">{{ $reklame->penerangan }}</p>
                                <h3 class="title font-size-20">Jarak Pandang</h3>
                                <p class="pb-4">{{ $reklame->jarak_pandang }}</p>
                                <h3 class="title font-size-20">Jumlah Sisi</h3>
                                <p class="pb-4">{{ $reklame->jumlah_sisi }}</p>
                                <h3 class="title font-size-20">Situasi Lalu Lintas</h3>
                                <p class="pb-4">{{ $reklame->situasi_lalulintas }}</p>
                                <h3 class="title font-size-20">Situasi Sekitar</h3>
                                <p class="pb-4">{{ $reklame->situasi_sekitar }}</p>
                                <h3 class="title font-size-20">Target Audiens</h3>
                                <p class="pb-4">{{ $reklame->target_audiens }}</p>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end description -->
                        <div id="photo" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Photo</h3>
                                <div class="gallery-carousel carousel-action padding-top-30px">
                                    <div class="card-item mb-0">
                                        <div class="card-img">
                                            <img src="{{ asset('foto_reklame/'.$reklame->gambar) }}" alt="{{$reklame->lokasi}}">
                                        </div>
                                    </div><!-- end card-item -->
                                </div><!-- end gallery-carousel -->
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end photo -->
                        <div id="location-map" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Location</h3>
                                <div class="gmaps padding-top-30px">
                                    <?= $reklame->google_maps?>
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end location-map -->
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
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="btn-box load-more text-center">
                                        <a href="/review/{{ $reklame->id_reklame }}" class="theme-btn theme-btn-small theme-btn-transparent">Lihat Semua Review</a>
                                    </div>
                                </div><!-- end comments-list -->
                            </div><!-- end single-content-item -->
                        </div><!-- end review-box -->
                    </div><!-- end single-content-wrap -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar single-content-sidebar mb-0">
                        <div class="sidebar-widget single-content-widget">
                            <div class="sidebar-widget-item">
                                <div class="sidebar-book-title-wrap mb-3">
                                    <h3>Booking Reklame</h3>
                                    <p><span class="text-form">Harga? Lakukan booking terlebih dahulu!</span></p>
                                </div>
                            </div><!-- end sidebar-widget-item -->
                            <form action="/booking/{{ $reklame->id_reklame }}" method="POST">
                                @csrf
                                <div class="sidebar-widget-item">
                                    <div class="contact-form-action">
                                        <div class="input-box">
                                            <label class="label-text">Checkin Pasang</label>
                                            <div class="form-group">
                                                <span class="la la-calendar form-icon"></span>
                                                <input class="date-range form-control" type="date" name="cekin_pasang" required>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end sidebar-widget-item -->
                                <div class="sidebar-widget-item">
                                    <div class="contact-form-action">
                                        <div class="input-box">
                                            <label class="label-text">Checkout Pasang</label>
                                            <div class="form-group">
                                                <span class="la la-calendar form-icon"></span>
                                                <input class="date-range form-control" type="date" name="cekout_pasang" required>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end sidebar-widget-item -->
                                <div class="sidebar-widget-item">
                                    <div class="contact-form-action">
                                        <h3 class="title pb-3">Tambahkan Print</h3>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="tambah_cetak" id="agreeChb">
                                            <label for="agreeChb">Tambahkan Cetak Billboard</label>
                                        </div>
                                    </div>
                                </div><!-- end sidebar-widget-item -->
                                <div class="btn-box pt-2">
                                    <button type="submit" class="theme-btn text-center w-100 mb-2"><i class="la la-shopping-cart mr-2 font-size-18"></i>Booking Sekarang</button>
                                </div>
                            </form>
                        </div><!-- end sidebar-widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end single-content-box -->
</section><!-- end tour-detail-area -->
<!-- ================================
    END TOUR DETAIL AREA
================================= -->
@endsection