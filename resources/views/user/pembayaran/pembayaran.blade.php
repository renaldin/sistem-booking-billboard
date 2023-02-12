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
                                    <h3 class="title">Informasi Pembayaran</h3>
                                </div><!-- end form-title-wrap -->
                                <div class="form-content">
                                    <div class="card-item shadow-none radius-none mb-0">
                                        <div class="card-body p-0">
                                            <span>Silahkan lakukan pembayaran terlebih dahulu ke nomor rekening di bawah. Setelah itu, Anda lakukan upload bukti pembayaran pada form di bawah. Terima Kasih!</span>
                                            <ul class="list-items list-items-2 py-3">
                                                <li><span>BRI</span>3486789876</li>
                                                <li><span>BCA</span>3486764366</li>
                                                <li><span>Mandiri</span>3486764365666</li>
                                            </ul>
                                        </div>
                                    </div><!-- end card-item -->
                                </div><!-- end form-content -->
                            </div><!-- end form-box -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-6">
                            <div class="form-box booking-detail-form">
                                <div class="form-title-wrap">
                                    <h3 class="title">Konfirmasi Pembayaran</h3>
                                </div><!-- end form-title-wrap -->
                                <div class="form-content">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="credit-card" role="tabpanel" aria-labelledby="credit-card-tab">
                                            <div class="contact-form-action">
                                                <form  action="/pembayaran/{{ $id_pesanan }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6 responsive-column">
                                                            <div class="input-box">
                                                                <label class="label-text">Nama Lengkap</label>
                                                                <div class="form-group">
                                                                    <span class="la la-user form-icon"></span>
                                                                    <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lengkap" value="{{ $user->nama }}" disabled required>
                                                                    @error('nama')
                                                                    <div style="margin-top: -16px">
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-6 -->
                                                        <div class="col-lg-6 responsive-column">
                                                            <div class="input-box">
                                                                <label class="label-text">Nama Perusahaan</label>
                                                                <div class="form-group">
                                                                    <span class="la la-user form-icon"></span>
                                                                    <input class="form-control" type="text" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan" value="{{ $user->nama_perusahaan }}" disabled required>
                                                                    @error('nama_perusahaan')
                                                                    <div style="margin-top: -16px">
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-6 -->
                                                        <div class="col-lg-12 responsive-column">
                                                            <div class="input-box">
                                                                <label class="label-text">Upload Bukti Pembayaran</label>
                                                                <div class="form-group">
                                                                    <span class="la la-user form-icon"></span>
                                                                    <input class="form-control" type="file" name="upload_BT" required>
                                                                    @error('upload_BT')
                                                                    <div style="margin-top: -16px">
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-6 -->
                                                        <div class="col-lg-12 responsive-column">
                                                            <div class="rate-option-item">
                                                                <label>Beri Rating Order</label>
                                                                <div class="rate-stars-option">
                                                                    <input type="checkbox" name="star" id="lst1" value="5">
                                                                    <label for="lst1"></label>
                                                                    <input type="checkbox" name="star" id="lst2" value="4">
                                                                    <label for="lst2"></label>
                                                                    <input type="checkbox" name="star" id="lst3" value="3">
                                                                    <label for="lst3"></label>
                                                                    <input type="checkbox" name="star" id="lst4" value="2">
                                                                    <label for="lst4"></label>
                                                                    <input type="checkbox" name="star" id="lst5" value="1">
                                                                    <label for="lst5"></label>
                                                                </div>
                                                                @error('star')
                                                                <div style="margin-top: -16px">
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div><!-- end col-lg-6 -->
                                                        <div class="col-lg-12 responsive-column">
                                                            <div class="input-box">
                                                                <label class="label-text">Beri Pesan Review</label>
                                                                <div class="form-group">
                                                                    <span class="la la-pencil form-icon"></span>
                                                                    <textarea class="message-control form-control" name="review" placeholder="Pesan Review Order" required></textarea>
                                                                    @error('recview')
                                                                    <div style="margin-top: -16px">
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-6 -->
                                                        <div class="col-lg-12 mt-5">
                                                            <div class="btn-box">
                                                                <button class="theme-btn" type="submit">Upload</button>
                                                            </div>
                                                        </div><!-- end col-lg-12 -->
                                                    </div>
                                                </form>
                                            </div><!-- end contact-form-action -->
                                        </div><!-- end tab-pane-->
                                    </div><!-- end tab-content -->
                                </div><!-- end form-content -->
                            </div><!-- end form-box -->
                        </div><!-- end col-lg-4 -->
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