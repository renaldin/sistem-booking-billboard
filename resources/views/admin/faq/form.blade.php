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
                        <form @if($form === 'Tambah') action="/tambah-faq"  @else action="/edit-faq/{{ $faq->id_faq }}" @endif method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Nama</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama" @if($form === 'Edit') value="{{ $faq->nama }}" @elseif($form === 'Detail') value="{{ $faq->nama }}" disabled @elseif($form === 'Tambah') value="{{ old('nama') }}" @endif autofocus>
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
                                        <label class="label-text">Email</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="email" name="email" placeholder="Masukkan Email" @if($form === 'Edit') value="{{ $faq->email }}" @elseif($form === 'Detail') value="{{ $faq->email }}" disabled @elseif($form === 'Tambah') value="{{ old('email') }}" @endif>
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
                                        <label class="label-text">Pertanyaan</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="pertanyaan" placeholder="Masukkan Pertanyaan" @if($form === 'Edit') value="{{ $faq->pertanyaan }}" @elseif($form === 'Detail') value="{{ $faq->pertanyaan }}" disabled @elseif($form === 'Tambah') value="{{ old('pertanyaan') }}" @endif>
                                        </div>
                                        @error('pertanyaan')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Jawaban</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="jawaban" placeholder="Masukkan Jawaban" @if($form === 'Edit') value="{{ $faq->jawaban }}" @elseif($form === 'Detail') value="{{ $faq->jawaban }}" disabled @elseif($form === 'Tambah') value="{{ old('jawaban') }}" @endif>
                                        </div>
                                        @error('jawaban')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @if ($form !== 'Detail')
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