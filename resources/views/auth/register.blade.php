@extends('layoutUser.main')

@section('content')
<section class="info-area padding-top-50px padding-bottom-70px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 responsive-column">
                <div class="card box-shadow" style="box-shadow: 3px 3px 3px #e8e7e7;">
                    <div class="card-header">
                        <div>
                            <h5 class="modal-title title" id="exampleModalLongTitle">Register</h5>
                            <p class="font-size-14">Hello! Silahkan untuk membuat akun baru!</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="contact-form-action">
                            <form action="/register" method="Post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Nama Lengkap</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lengkap" value="{{ old('nama') }}" autofocus>
                                            </div>
                                            @error('nama')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">No. Telepon</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" type="text" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" value="{{ old('nomor_telepon') }}">
                                            </div>
                                            @error('nomor_telepon')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Alamat</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" type="text" name="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
                                            </div>
                                            @error('alamat')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Nama Perusahaan</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" type="text" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan" value="{{ old('nama_perusahaan') }}">
                                            </div>
                                            @error('nama_perusahaan')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Alamat Perusahaan</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" type="text" name="alamat_perusahaan" placeholder="Masukkan Alamat Perusahaan" value="{{ old('alamat_perusahaan') }}">
                                            </div>
                                            @error('alamat_perusahaan')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Logo Perusahaan</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" type="file" name="foto_perusahaan">
                                            </div>
                                            @error('foto_perusahaan')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Email</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" type="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}">
                                            </div>
                                            @error('email')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Password</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" type="password" name="password" placeholder="Masukkan Password">
                                            </div>
                                            @error('password')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-box pt-3 pb-4">
                                    <center>
                                        <button type="submit" class="theme-btn w-50">Register</button>
                                    </center>
                                </div>
                            </form>
                        </div><!-- end contact-form-action -->
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
