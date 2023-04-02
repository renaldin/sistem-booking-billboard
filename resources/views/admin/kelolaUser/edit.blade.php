@extends('layoutAdmin.main')

@section('content')
<div class="dashboard-main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <div>
                            <h3 class="title">{{ $subTitle }}</h3>
                            <p class="font-size-14">Form {{ $subTitle }}</p>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form action="/edit-user/{{ $user->id_member }}" method="Post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Nama Lengkap</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lengkap" value="{{ $user->nama }}" autofocus @if($disabled === TRUE) disabled @endif>
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
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" value="{{ $user->nomor_telepon  }}" @if($disabled === TRUE) disabled @endif>
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
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="alamat" placeholder="Masukkan Alamat" value="{{ $user->alamat  }}" @if($disabled === TRUE) disabled @endif>
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
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan" value="{{ $user->nama_perusahaan  }}" @if($disabled === TRUE) disabled @endif>
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
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="alamat_perusahaan" placeholder="Masukkan Alamat Perusahaan" value="{{ $user->alamat_perusahaan  }}" @if($disabled === TRUE) disabled @endif>
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
                                                <span class="la la-envelope form-icon"></span>
                                                <input class="form-control" type="email" name="email" placeholder="Masukkan Email" value="{{ $user->email  }}" @if($disabled === TRUE) disabled @endif>
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
                                                <span class="la la-lock form-icon"></span>
                                                <input class="form-control" type="password" name="password" placeholder="Masukkan Password" @if($disabled === TRUE) disabled @endif>
                                            </div>
                                            @error('password')
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
                                                <input class="form-control" type="file" name="foto_perusahaan"  @if($disabled === TRUE) disabled @endif>
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
                                                <img src="@if($user->foto_perusahaan){{ asset('foto_perusahaan/'.$user->foto_perusahaan) }} @else {{ asset('foto_perusahaan/default1.jpg') }} @endif" class="user-pro-img" style="width: 8rem;" alt="">
                                            </div>
                                        </div>          
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Foto Anda</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" type="file" name="foto_user"  @if($disabled === TRUE) disabled @endif>
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
                                                <img src="@if($user->foto_user){{ asset('foto_user/'.$user->foto_user) }} @else {{ asset('foto_user/default1.jpg') }} @endif" class="user-pro-img" style="width: 8rem;" alt=""> 
                                            </div>
                                        </div>          
                                    </div>
                                </div>
                                <div class="btn-box pt-3 pb-4">
                                    <center>
                                        @if ($disabled === TRUE)
                                        <a href="/kelola-user" class="theme-btn w-50">Kembali</a>
                                        @else
                                        <button type="submit" class="theme-btn w-50">Simpan</button>
                                        @endif
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- end form-box -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        {{-- footer --}}
        @include('layoutAdmin.footer')
        {{-- end footer --}}
    </div>
</div>
@endsection