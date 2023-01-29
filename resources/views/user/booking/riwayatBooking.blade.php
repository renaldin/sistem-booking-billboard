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
                                    <a href="/booking" class="theme-btn">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 justify-content-end">
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-header bg-primary text-white text-center">
                                    <b>Jam : <span id="jam"></span>:<span id="menit"></span>:<span id="detik"></span></b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="mb-2">
                                @if (session('berhasil'))    
                                    <div class="alert bg-primary text-white alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {{ session('berhasil') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-form table-responsive mb-3" >
                        <table class="table" id="example2">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10px">No</th>
                                    <th scope="col">Reklame</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no =1;?>
                                @foreach ($booking as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <th scope="row">
                                        <div class="table-content product-content d-flex align-items-center">
                                            <a href="#" class="d-block">
                                                <img src="{{ asset('foto_reklame/'.$item->gambar) }}" alt="" class="flex-shrink-0">
                                            </a>
                                        <div class="product-content">
                                            <a href="room-details.html" class="title">Lokasi: {{ $item->lokasi }}</a>
                                            <div class="product-info-wrap">
                                                <div class="product-info line-height-24">
                                                    <span class="product-info-label">Ukuran:</span>
                                                    <span class="product-info-value">{{ $item->ukuran }}</span>
                                                </div><!-- end product-info -->
                                                <div class="product-info line-height-24">
                                                    <span class="product-info-label">Orientation Page:</span>
                                                    <span class="product-info-value">{{ $item->orientation_page }}</span>
                                                </div><!-- end product-info -->
                                                <div class="product-info line-height-24">
                                                    <span class="product-info-label">Target Audiens:</span>
                                                    <span class="product-info-value">{{ $item->target_audiens }}</span>
                                                </div><!-- end product-info -->
                                            </div>
                                        </div>
                                        </div>
                                    </th>
                                    <td>
                                        @if ($item->harga !== null)
                                            <?= 'Rp ' . number_format($item->harga, 2, ',', '.'); ?>
                                        @else
                                            Menunggu verifikasi dari Admin. Tunggu maksimal sampai jam <b>{{ $item->jam_harga }}</b>. <br>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status_order === 'Batal')
                                            <span class="badge badge-danger">{{ $item->status_order }}</td></span>
                                        @elseif ($item->status_order === 'Dibooking')
                                            <span class="badge badge-primary">{{ $item->status_order }}</td></span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/detail-booking/{{ $item->id_pesanan }}" class="theme-btn theme-btn-small" data-toggle="tooltip" data-placement="top" title="Detail"><i class="la la-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="section-block"></div>
                </div><!-- end cart-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cart-area -->
<!-- ================================
    END CART AREA
================================= -->
<script>
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
    }
</script>

@endsection