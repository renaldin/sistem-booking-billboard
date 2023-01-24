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
                        <form @if($form === 'Tambah') action="/tambah-partner"  @else action="/edit-partner/{{ $partner->id_partner }}" @endif method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Nama Partner</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="nama_partner" placeholder="Masukkan Nama Partner" @if($form === 'Edit') value="{{ $partner->nama_partner }}" @elseif($form === 'Detail') value="{{ $partner->nama_partner }}" disabled @elseif($form === 'Tambah') value="{{ old('nama_partner') }}" @endif autofocus>
                                        </div>
                                        @error('nama_partner')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Gambar</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="file" name="gambar" @if($form === 'Detail') disabled @endif>
                                        </div>
                                        @error('gambar')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @if ($form === 'Detail')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Gambar</label>
                                        <div class="form-group">
                                            <img src="{{ asset('foto_partner/'.$partner->gambar) }}" width="100%" alt="{{ $partner->gambar }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="btn-box pt-3 pb-4">
                                <center>
                                    <button type="submit" class="theme-btn w-50">Simpan</button>
                                </center>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div><!-- end form-box -->
        </div><!-- end col-lg-12 -->
    </div><!-- end row -->
</section>
@endsection