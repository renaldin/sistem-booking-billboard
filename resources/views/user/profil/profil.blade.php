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
                                <img class="user-pro-img" style="width: 8rem;" src="@if($user->foto_user){{ asset('foto_user/'.$user->foto_user) }} @else {{ asset('foto_user/default1.jpg') }} @endif" alt=""><br><br>
                                <h3 class="card-title">{{ $user->nama }}</h3>
                                <p class="card-meta">Member sejak {{ date('d F Y', strtotime($user->tanggal_daftar)) }}</p>
                                <div class="d-flex justify-content-between pt-3">
                                    <ul class="list-items list-items-2 flex-grow-1">
                                        <li><span>Email:</span>{{ $user->email }}</li>
                                        <li><span>Nomor Telepon:</span>{{ $user->nomor_telepon }}</li>
                                        <li><span>Alamat:</span>{{ $user->alamat }}</li>
                                        <li><span>Nama Perusahaan:</span>{{ $user->nama_perusahaan }}</li>
                                        <li><span>Alamat Perusahaan:</span>{{ $user->alamat_perusahaan }}</li>
                                        <li><span>Logo Perusahaan:</span><img class="user-pro-img" style="width: 8rem;" src="@if($user->foto_perusahaan){{ asset('foto_perusahaan/'.$user->foto_perusahaan) }} @else {{ asset('foto_perusahaan/default1.jpg') }} @endif" alt=""></li>
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between pt-3">
                                    <a href="/ubah-password/{{ $user->id_member }}" class="theme-btn">Ubah Password</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="card-title">Edit Profil</h3>
                                <p class="card-meta">Jika Anda ingin melakukan edit profil dapat dilakukan di form bawah ini!</p>
                                <div class="d-flex justify-content-between pt-3">
                                    <div class="form-content">
                                        <div class="contact-form-action">
                                            <form action="/edit-profil-user/{{ $user->id_member }}" method="Post" enctype="multipart/form-data">
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
                                                                <div class="alert bg-primary text-white alert-dismissible">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                                    {{ session('gagal') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="input-box">
                                                            <label class="label-text">Nama Lengkap</label>
                                                            <div class="form-group">
                                                                <span class="la la-circle form-icon"></span>
                                                                <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lengkap" value="{{ $user->nama }}" autofocus>
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
                                                                <input class="form-control" type="text" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" value="{{ $user->nomor_telepon  }}">
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
                                                                <input class="form-control" type="text" name="alamat" placeholder="Masukkan Alamat" value="{{ $user->alamat  }}">
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
                                                                <input class="form-control" type="text" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan" value="{{ $user->nama_perusahaan  }}">
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
                                                                <input class="form-control" type="text" name="alamat_perusahaan" placeholder="Masukkan Alamat Perusahaan" value="{{ $user->alamat_perusahaan  }}">
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
                                                            <label class="label-text">Email</label>
                                                            <div class="form-group">
                                                                <span class="la la-circle form-icon"></span>
                                                                <input class="form-control" type="email" name="email" placeholder="Masukkan Email" value="{{ $user->email  }}">
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
                                                            <label class="label-text"></label>
                                                            <div class="form-group">
                                                                <img src="@if($user->foto_perusahaan){{ asset('foto_perusahaan/'.$user->foto_perusahaan) }} @else {{ asset('foto_perusahaan/default1.jpg') }} @endif" style="width:60%;" alt="">
                                                            </div>
                                                        </div>          
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-box">
                                                            <label class="label-text">Foto Anda</label>
                                                            <div class="form-group">
                                                                <span class="la la-circle form-icon"></span>
                                                                <input class="form-control" type="file" name="foto_user">
                                                            </div>
                                                            @error('foto_user')
                                                            <div style="margin-top: -16px">
                                                                <small class="text-danger">{{ $message }}</small>
                                                            </div>
                                                            @enderror
                                                        </div>          
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-box">
                                                            <label class="label-text"></label>
                                                            <div class="form-group">
                                                                <img src="@if($user->foto_user){{ asset('foto_user/'.$user->foto_user) }} @else {{ asset('foto_user/default1.jpg') }} @endif" style="width:60%;" alt=""> 
                                                            </div>
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