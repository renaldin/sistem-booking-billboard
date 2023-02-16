@extends('layoutAdmin.main')

@section('content')
<section>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title">{{ $subTitle }}</h3>
                </div>
                <div class="form-content">
                    <div class="contact-form-action">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Nama Lengkap</label>
                                        <div class="form-group">
                                            <span class="la la-user form-icon"></span>
                                            <input class="form-control" type="text" value="{{ $admin->nama }}" disabled>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Email</label>
                                        <div class="form-group">
                                            <span class="la la-envelope form-icon"></span>
                                            <input class="form-control" type="text" value="{{ $admin->email }}" disabled>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Nomor Telepon</label>
                                        <div class="form-group">
                                            <span class="la la-phone form-icon"></span>
                                            <input class="form-control" type="text" value="{{ $admin->nomor_telepon }}" disabled>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Foto</label>
                                        <div class="form-group">
                                            <img src="@if($admin->foto){{ asset('foto_admin/'.$admin->foto) }} @else {{ asset('foto_admin/default1.jpg') }} @endif" class="user-pro-img" style="width: 8rem;" alt=""> 
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->
                        </form>
                    </div>
                </div>
            </div><!-- end form-box -->
        </div><!-- end col-lg-6 -->
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title">Ubah Profil</h3>
                </div>
                <div class="form-content">
                    <div class="contact-form-action">
                        <form action="/profil-admin/{{ $admin->id_admin }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-2">
                                        @if (session('berhasil'))    
                                            <div class="alert bg-primary text-white alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <h4><i class="icon fa fa-ban"></i> Berhasil!</h4>
                                                {{ session('berhasil') }}
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
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" name="nama" type="text" value="{{ $admin->nama }}">
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
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" name="email" type="text" value="{{ $admin->email }}">
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
                                        <label class="label-text">Nomor Telepon</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" name="nomor_telepon" type="number" value="{{ $admin->nomor_telepon }}">
                                            @error('nomor_telepon')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Foto</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" name="foto" type="file">
                                            @error('foto')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                 <div class="col-lg-12">
                                     <div class="btn-box" style="float: right">
                                         <button class="theme-btn" type="submit">Simpan</button>
                                     </div>
                                </div><!-- end col-lg-12 -->
                            </div><!-- end row -->
                        </form>
                    </div>
                </div>
            </div><!-- end form-box -->
        </div><!-- end col-lg-6 -->
        <div class="col-lg-6">
            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title">Ubah Password</h3>
                </div>
                <div class="form-content">
                    <div class="contact-form-action">
                        <form action="/ubah-password/{{ $admin->id_admin }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-2">
                                        @if (session('berhasil'))    
                                            <div class="alert bg-primary text-white alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <h4><i class="icon fa fa-ban"></i> Berhasil!</h4>
                                                {{ session('berhasil') }}
                                            </div>
                                        @endif
                                        @if (session('gagal'))    
                                            <div class="alert bg-danger text-white alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                                                {{ session('gagal') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Password Lama</label>
                                        <div class="form-group">
                                            <span class="la la-lock form-icon"></span>
                                            <input class="form-control" name="passwordLama" type="password" placeholder="Password Lama">
                                            @error('passwordLama')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-12 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Password< Baru</label>
                                        <div class="form-group">
                                            <span class="la la-lock form-icon"></span>
                                            <input class="form-control" name="passwordBaru" type="password" placeholder="Password Baru">
                                            @error('passwordBaru')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-12">
                                    <div class="btn-box" style="float: right">
                                        <button class="theme-btn" type="submit">Simpan</button>
                                    </div>
                                </div><!-- end col-lg-12 -->
                            </div><!-- end row -->
                        </form>
                    </div>
                </div>
            </div><!-- end form-box -->
        </div><!-- end col-lg-6 -->
    </div><!-- end row -->
</section>
@endsection