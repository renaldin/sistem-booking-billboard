@extends('layoutAdmin.main')

@section('content')
<section>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-box">
                <div class="form-title-wrap">
                    <div>
                        <h3 class="title">{{ $subTitle }}</h3>
                        <p class="font-size-14">Silahkan beri harga untuk ID Pesanan {{ $order->id_pesanan }}</p>
                    </div>
                </div>
                <div class="form-content">
                    <div class="contact-form-action">
                        <form action="/beri-harga/{{ $order->id_pesanan }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Harga</label>
                                        <div class="form-group">
                                            <span class="la la-circle form-icon"></span>
                                            <input class="form-control" type="number" name="harga" placeholder="Masukkan Harga" @if ($form === 'Edit') value="{{ $order->harga }}" @else value="{{ old('harga') }}" @endif autofocus>
                                        </div>
                                        @error('harga')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="btn-box pt-3 pb-4">
                                <button type="submit" class="theme-btn">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- end form-box -->
        </div><!-- end col-lg-12 -->
    </div><!-- end row -->
</section>
@endsection