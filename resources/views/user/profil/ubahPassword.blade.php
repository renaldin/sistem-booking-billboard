@extends('layoutUser.main')

@section('content')

<!-- ================================
    START USER AREA
================================= -->
<section class="user-area padding-top-100px padding-bottom-60px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <h3 class="title font-size-24">Profil Saya</h3>
                <div class="card-item user-card card-item-list mt-4 mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="card-title">{{ $title }}</h3>
                                <p class="card-meta">Silahkan ubah password Anda!</p>
                                <div class="d-flex justify-content-between pt-3">
                                    <div class="form-content">
                                        <div class="contact-form-action">
                                            <form action="/ubah-password-user/{{ $user->id_member }}" method="Post">
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
                                                    <div class="col-lg-12">
                                                        <div class="input-box">
                                                            <label class="label-text">Password Lama</label>
                                                            <div class="form-group">
                                                                <span class="la la-user form-icon"></span>
                                                                <input class="form-control" type="password" name="password_lama" placeholder="Masukkan Password Lama" autofocus>
                                                            </div>
                                                            @error('password_lama')
                                                            <div style="margin-top: -16px">
                                                                <small class="text-danger">{{ $message }}</small>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="input-box">
                                                            <label class="label-text">Password Baru</label>
                                                            <div class="form-group">
                                                                <span class="la la-user form-icon"></span>
                                                                <input class="form-control" type="password" name="password_baru" placeholder="Masukkan Password Baru">
                                                            </div>
                                                            @error('password_baru')
                                                            <div style="margin-top: -16px">
                                                                <small class="text-danger">{{ $message }}</small>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-box pt-3 pb-4">
                                                    <center>
                                                        <button type="submit" class="theme-btn w-50">Simpan</button>
                                                    </center>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end user-area -->
<!-- ================================
    END USER AREA
================================= -->


@endsection