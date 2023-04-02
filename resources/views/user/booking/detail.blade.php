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
    START CART AREA
================================= -->
<section class="cart-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-wrap">
                    <div class="row mb-5">
                        <div class="col-lg-4 mr-auto">
                            <div class="cart-totals table-form">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="2">Riwayat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <div class="table-content">
                                                    <h3 class="title">Total Pesanan</h3>
                                                </div>
                                            </th>
                                            <td>{{ $jumlahOrder }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="section-block"></div>
                                <div class="btn-box text-right pt-4">
                                    <a href="/riwayat-booking" class="theme-btn">Lihat Semua</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-box booking-detail-form">
                                <div class="form-title-wrap">
                                    <h3 class="title">Detail booking</h3>
                                </div><!-- end form-title-wrap -->
                                <div class="form-content">
                                    <div class="card-item shadow-none radius-none mb-0">
                                        <div class="card-img pb-4">
                                            <center>
                                                <img src="{{ asset('foto_reklame/'.$booking->gambar) }}" style="width: 70%;" alt="{{ $booking->lokasi }}">
                                            </center>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="list-items list-items-2 py-3">
                                                <li><span>Lokasi:</span>{{ $booking->lokasi }}</li>
                                                <li><span>Ukuran:</span>{{ $booking->ukuran }}</li>
                                                <li><span>Orientation Page:</span>{{ $booking->orientation_page }}</li>
                                                <li><span>Penerangan:</span>{{ $booking->penerangan }}</li>
                                                <li><span>Jarak Pandang:</span>{{ $booking->jarak_pandang }}</li>
                                                <li><span>Jumlah Sisi:</span>{{ $booking->jumlah_sisi }}</li>
                                                <li><span>Situasi Lalu Lintas:</span>{{ $booking->situasi_lalulintas }}</li>
                                                <li><span>Situasi Sekitar:</span>{{ $booking->situasi_sekitar }}</li>
                                                <li><span>Target Audiens:</span>{{ $booking->target_audiens }}</li>
                                                <li><span>ID Pesanan:</span>{{ $booking->id_pesanan }}</li>
                                                <li><span>Tanggal:</span>{{ date('d F Y', strtotime($booking->tanggal)) }}</li>
                                                <li><span>Checkin Pasang:</span>{{ date('d F Y', strtotime($booking->cekin_pasang)) }}</li>
                                                <li><span>Checkout Pasang:</span>{{ date('d F Y', strtotime($booking->cekout_pasang)) }}</li>
                                                <li><span>Tambah Cetak:</span>{{ $booking->tambah_cetak }}</li>
                                                <li>
                                                    <b>
                                                        <span>Harga:</span>
                                                        @if ($booking->harga !== null)
                                                            <?= 'Rp ' . number_format($booking->harga, 2, ',', '.'); ?>
                                                        @else
                                                            Menunggu verifikasi dari Admin
                                                        @endif
                                                    </b>
                                                </li>
                                                <li>
                                                    <span>Star:</span>
                                                    @if ($booking->star !== NULL)
                                                    <span class="ratings align-items-center">
                                                        <?php for ($i=0; $i < $booking->star; $i++) { ?>
                                                            <i class="la la-star"></i>
                                                        <?php } ?>
                                                        <?php for ($i=0; $i < 5-$booking->star; $i++) { ?>
                                                            <i class="la la-star-o"></i>
                                                        <?php } ?>
                                                    </span>
                                                    @else
                                                        Belum Ada
                                                    @endif
                                                </li>
                                                <li>
                                                    <span>Review Dari Customer:</span>
                                                </li>
                                                <li>
                                                    @if ($booking->review  !== NULL)
                                                        {{ $booking->review }}
                                                    @else
                                                        Belum Ada
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- end card-item -->
                                </div><!-- end form-content -->
                            </div><!-- end form-box -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-6">
                            <div class="form-box booking-detail-form">
                                <div class="form-title-wrap">
                                    <h3 class="title">Google Maps</h3>
                                </div><!-- end form-title-wrap -->
                                <div class="card-body p-2">
                                    <div class="table-responsive pb-4">
                                        <?= $booking->google_maps?>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body p-2">
                                    <div id="photo" class="page-scroll">
                                        <div class="single-content-item padding-top-40px">
                                            <h3 class="title font-size-20">Photo</h3>
                                            <div class="gallery-carousel carousel-action padding-top-30px">
                                                @foreach ($gambarReklame as $item)
                                                    <div class="card-item mb-0">
                                                        <div class="card-img">
                                                            <img src="{{ asset('foto_gambar_reklame/'.$item->gambar_reklame) }}" alt="Slide Gambar Reklame">
                                                        </div>
                                                    </div><!-- end card-item -->
                                                @endforeach
                                            </div><!-- end gallery-carousel -->
                                        </div><!-- end single-content-item -->
                                    </div><!-- end photo -->
                                </div>
                                <div class="form-title-wrap">
                                    <div class="btn-box">
                                        <a href="/booking" class="theme-btn">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end cart-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cart-area -->
<!-- ================================
    END CART AREA
================================= -->

@endsection