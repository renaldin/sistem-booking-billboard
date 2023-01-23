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
                        <form @if($form === 'Tambah') action="/tambah-reklame"  @else action="/edit-reklame/{{ $reklame->id_reklame }}" @endif method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Lokasi</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="lokasi" placeholder="Masukkan Lokasi" @if($form === 'Edit') value="{{ $reklame->lokasi }}" @elseif($form === 'Detail') value="{{ $reklame->lokasi }}" disabled @elseif($form === 'Tambah') value="{{ old('lokasi') }}" @endif autofocus>
                                        </div>
                                        @error('lokasi')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Ukuran</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="ukuran" placeholder="Masukkan Ukuran" @if($form === 'Edit') value="{{ $reklame->ukuran }}" @elseif($form === 'Detail') value="{{ $reklame->ukuran }}" disabled @elseif($form === 'Tambah') value="{{ old('ukuran') }}" @endif>
                                        </div>
                                        @error('ukuran')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Orientation Page</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="orientation_page" placeholder="Masukkan Orientation Page" @if($form === 'Edit') value="{{ $reklame->orientation_page }}" @elseif($form === 'Detail') value="{{ $reklame->orientation_page }}" disabled @elseif($form === 'Tambah') value="{{ old('orientation_page') }}" @endif>
                                        </div>
                                        @error('orientation_page')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Penerangan</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="penerangan" placeholder="Masukkan Penerangan" @if($form === 'Edit') value="{{ $reklame->penerangan }}" @elseif($form === 'Detail') value="{{ $reklame->penerangan }}" disabled @elseif($form === 'Tambah') value="{{ old('penerangan') }}" @endif>
                                        </div>
                                        @error('penerangan')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Jarak Pandang</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="jarak_pandang" placeholder="Masukkan Jarak Pandang" @if($form === 'Edit') value="{{ $reklame->jarak_pandang }}" @elseif($form === 'Detail') value="{{ $reklame->jarak_pandang }}" disabled @elseif($form === 'Tambah') value="{{ old('jarak_pandang') }}" @endif>
                                        </div>
                                        @error('jarak_pandang')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Jumlah Sisi</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="jumlah_sisi" placeholder="Masukkan Jumlah Sisi" @if($form === 'Edit') value="{{ $reklame->jumlah_sisi }}" @elseif($form === 'Detail') value="{{ $reklame->jumlah_sisi }}" disabled @elseif($form === 'Tambah') value="{{ old('jumlah_sisi') }}" @endif>
                                        </div>
                                        @error('jumlah_sisi')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>          
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Situasi Lalu Lintas</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="situasi_lalulintas" placeholder="Masukkan Situasi Lalu Lintas" @if($form === 'Edit') value="{{ $reklame->situasi_lalulintas }}" @elseif($form === 'Detail') value="{{ $reklame->situasi_lalulintas }}" disabled @elseif($form === 'Tambah') value="{{ old('situasi_lalulintas') }}" @endif>
                                        </div>
                                        @error('situasi_lalulintas')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Situasi Sekitar</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="situasi_sekitar" placeholder="Masukkan Situasi Sekitar" @if($form === 'Edit') value="{{ $reklame->situasi_sekitar }}" @elseif($form === 'Detail') value="{{ $reklame->situasi_sekitar }}" disabled @elseif($form === 'Tambah') value="{{ old('situasi_sekitar') }}" @endif>
                                        </div>
                                        @error('situasi_sekitar')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Target Audiens</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="target_audiens" placeholder="Masukkan Target Audiens" @if($form === 'Edit') value="{{ $reklame->target_audiens }}" @elseif($form === 'Detail') value="{{ $reklame->target_audiens }}" disabled @elseif($form === 'Tambah') value="{{ old('target_audiens') }}" @endif>
                                        </div>
                                        @error('target_audiens')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Google Maps @if($form !== 'Detail') <small class="text-danger">Isi dengan iframe yang ada di Google Maps</small> @endif</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="text" name="google_maps" placeholder="Masukkan Google Maps" @if($form === 'Edit') value="{{ $reklame->google_maps }}" @elseif($form === 'Detail') value="{{ $reklame->google_maps }}" disabled @elseif($form === 'Tambah') value="{{ old('google_maps') }}" @endif>
                                        </div>
                                        @error('google_maps')
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
                                            <img src="{{ asset('foto_reklame/'.$reklame->gambar) }}" width="100%" alt="{{ $reklame->gambar }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Google Maps</label>
                                        <div class="table-responsive">
                                            <?= $reklame->google_maps ?>
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