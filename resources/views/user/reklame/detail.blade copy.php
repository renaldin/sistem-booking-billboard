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
            <div class="col-lg-6">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title">Booking Langsung</h3>
                    </div><!-- form-title-wrap -->
                    <div class="form-content ">
                        <div class="contact-form-action">
                            <form>
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-2">
                                            @if (session('berhasil'))    
                                                <div class="alert bg-primary text-white alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    {{ session('berhasil') }}
                                                </div>
                                            @endif
                                            @if (session('gagal'))    
                                                <div class="alert bg-danger text-white alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    {{ session('gagal') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Nama Lengkap</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lengkap" @if(Session()->get('nama'))value="{{ Session()->get('nama') }}" disabled @endif autofocus  required>
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
                                            <label class="label-text">Email</label>
                                            <div class="form-group">
                                                <span class="la la-envelope-o form-icon"></span>
                                                <input class="form-control" type="email" name="email" placeholder="Masukkan Email" @if(Session()->get('email'))value="{{ Session()->get('email') }}" disabled @endif  required>
                                                @error('email')
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
                                                <span class="la la-phone form-icon"></span>
                                                <input class="form-control" type="text" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan" @if(Session()->get('nama_perusahaan'))value="{{ Session()->get('nama_perusahaan') }}" disabled @endif  required>
                                                @error('nama_perusahaan')
                                                <div style="margin-top: -16px">
                                                    <small class="text-danger">{{ $message }}</small>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Alamat Perusahaan</label>
                                            <div class="form-group">
                                                <span class="la la-phone form-icon"></span>
                                                <input class="form-control" type="text" name="alamat_perusahaan" placeholder="Masukkan Alamat Perusahaan" @if(Session()->get('alamat_perusahaan'))value="{{ Session()->get('alamat_perusahaan') }}" disabled @endif required>
                                                @error('alamat_perusahaan')
                                                <div style="margin-top: -16px">
                                                    <small class="text-danger">{{ $message }}</small>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <br>
                                </div>
                            </form>
                        </div><!-- end contact-form-action -->
                    </div><!-- end form-content -->
                </div><!-- end form-box -->
                <div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title">Informasi Lain</h3>
                    </div><!-- form-title-wrap -->
                    <div class="form-content">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="credit-card" role="tabpanel" aria-labelledby="credit-card-tab">
                                <div class="contact-form-action">
                                    <form  action="/booking/{{ $reklame->id_reklame }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-box">
                                                    <label class="label-text">Checkin Pasang</label>
                                                    <div class="form-group select-contain w-100">
                                                        <select class="select-contain-select" name="cekin_pasang">
                                                            <option value="">Pilih Satu</option>
                                                            <option value="Ya">Ya</option>
                                                            <option value="Tidak">Tidak</option>
                                                        </select>
                                                    </div>
                                                    @error('cekin_pasang')
                                                    <div style="margin-top: -16px">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="input-box">
                                                    <label class="label-text">Checkout Pasang</label>
                                                    <div class="form-group select-contain w-100">
                                                        <select class="select-contain-select" name="cekout_pasang">
                                                            <option value="">Pilih Satu</option>
                                                            <option value="Ya">Ya</option>
                                                            <option value="Tidak">Tidak</option>
                                                        </select>
                                                    </div>
                                                    @error('cekout_pasang')
                                                    <div style="margin-top: -16px">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="input-box">
                                                    <label class="label-text">Tambah Cetak</label>
                                                    <div class="form-group select-contain w-100">
                                                        <select class="select-contain-select" name="tambah_cetak">
                                                            <option value="">Pilih Satu</option>
                                                            <option value="Ya">Ya</option>
                                                            <option value="Tidak">Tidak</option>
                                                        </select>
                                                    </div>
                                                    @error('tambah_cetak')
                                                    <div style="margin-top: -16px">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-12 mt-5">
                                                <div class="btn-box">
                                                    <button class="theme-btn" type="submit">Konfirmasi Booking</button>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                        </div>
                                    </form>
                                </div><!-- end contact-form-action -->
                            </div><!-- end tab-pane-->
                        </div><!-- end tab-content -->
                    </div><!-- end form-content -->
                </div><!-- end form-box -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-6">
                <div class="form-box booking-detail-form">
                    <div class="form-title-wrap">
                        <h3 class="title">Detail Reklame</h3>
                    </div><!-- end form-title-wrap -->
                    <div class="form-content">
                        <div class="card-item shadow-none radius-none mb-0">
                            <div class="card-img pb-4">
                                <center>
                                    <img src="{{ asset('foto_reklame/'.$reklame->gambar) }}" style="width: 70%;" alt="{{ $reklame->lokasi }}">
                                </center>
                            </div>
                            <div class="card-body p-0">
                                <ul class="list-items list-items-2 py-3">
                                    <li><span>Lokasi:</span>{{ $reklame->lokasi }}</li>
                                    <li><span>Ukuran:</span>{{ $reklame->ukuran }}</li>
                                    <li><span>Orientation Page:</span>{{ $reklame->orientation_page }}</li>
                                    <li><span>Penerangan:</span>{{ $reklame->penerangan }}</li>
                                    <li><span>Jarak Pandang:</span>{{ $reklame->jarak_pandang }}</li>
                                    <li><span>Jumlah Sisi:</span>{{ $reklame->jumlah_sisi }}</li>
                                    <li><span>Situasi Lalu Lintas:</span>{{ $reklame->situasi_lalulintas }}</li>
                                    <li><span>Situasi Sekitar:</span>{{ $reklame->situasi_sekitar }}</li>
                                    <li><span>Target Audiens:</span>{{ $reklame->target_audiens }}</li>
                                </ul>
                            </div>
                            <div class="table-responsive pb-4">
                                <?= $reklame->google_maps?>
                            </div>
                        </div><!-- end card-item -->
                    </div><!-- end form-content -->
                </div><!-- end form-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end booking-area -->
<!-- ================================
    END BOOKING AREA
================================= -->


@endsection