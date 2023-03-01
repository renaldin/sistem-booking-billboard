@extends('layoutAdmin.main')

@section('content')
<section>
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
                        <form action="/biodata-website/{{ $biodata->id_biodata_web }}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    @if (session('berhasil'))    
                                        <div class="alert bg-primary text-white alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h4><i class="icon fa fa-ban"></i> Berhasil!</h4>
                                            {{ session('berhasil') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Nama Website</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="nama_website" placeholder="Masukkan Nama Website" value="{{ $biodata->nama_website }}" autofocus>
                                        </div>
                                        @error('nama_website')
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
                                            <input class="form-control" type="text" name="email" placeholder="Masukkan Email" value="{{ $biodata->email }}">
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
                                        <label class="label-text">Nomor Telepon</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" value="{{ $biodata->nomor_telepon }}">
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
                                            <input class="form-control" type="text" name="alamat" placeholder="Masukkan Alamat" value="{{ $biodata->alamat }}">
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
                                        <label class="label-text">Logo</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="file" name="logo">
                                        </div>
                                        @error('logo')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        {{-- <label class="label-text">Logo</label> --}}
                                        <div class="form-group">
                                            <img src="{{ asset('foto_biodata/'.$biodata->logo) }}" width="60%" alt="Logo">
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
            </div><!-- end form-box -->
        </div><!-- end col-lg-12 -->
    </div><!-- end row -->
</section>
@endsection