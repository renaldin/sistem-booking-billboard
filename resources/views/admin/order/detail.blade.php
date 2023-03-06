@extends('layoutAdmin.main')

@section('content')
<section>
    <div class="row"> 
        <div class="col-lg-6">
            <div class="form-box booking-detail-form">
                <div class="form-title-wrap">
                    <h3 class="title">Detail Pesanan</h3>
                </div><!-- end form-title-wrap -->
                <div class="form-content">
                    <div class="card-item shadow-none radius-none mb-0">
                        <div class="card-body p-0">
                            <ul class="list-items list-items-2 py-3">
                                <li><span>Nama Lengkap:</span>{{ $user->nama }}</li>
                                <li><span>Email:</span>{{ $user->email }}</li>
                                <li><span>Alamat:</span>{{ $user->alamat }}</li>
                                <li><span>Nomor Telepon:</span>{{ $user->nomor_telepon }}</li>
                                <li><span>Nama Perusahaan:</span>{{ $user->nama_perusahaan }}</li>
                                <li><span>Alamat Perusahaan:</span>{{ $user->alamat_perusahaan }}</li><br>
                                <li><span>ID Pesanan:</span>{{ $order->id_pesanan }}</li>
                                <li><span>Tanggal:</span>{{ date('d F Y', strtotime($order->tanggal)) }}</li>
                                <li><span>Checkin Pasang:</span>{{ date('F Y', strtotime($order->cekin_pasang)) }}</li>
                                <li><span>Checkout Pasang:</span>{{ date('F Y', strtotime($order->cekout_pasang)) }}</li>
                                <li><span>Tambah Cetak:</span>{{ $order->tambah_cetak }}</li>
                                <li>
                                    <span>Status:</span>
                                    @if ($order->status_order === 'Batal')
                                        <span class="badge badge-danger text-white">{{ $order->status_order }}</td></span>
                                    @elseif ($order->status_order === 'Dibooking')
                                        <span class="badge badge-primary text-white">{{ $order->status_order }}</td></span>
                                    @elseif ($order->status_order === 'Dibayar')
                                        <span class="badge badge-success text-white">{{ $order->status_order }}</td></span>
                                    @endif
                                </li>
                                <li>
                                    <b>
                                        <span>Harga:</span>
                                        @if ($order->harga !== null)
                                            <?= 'Rp ' . number_format($order->harga, 2, ',', '.'); ?>
                                        @else
                                            Menunggu verifikasi dari Admin
                                        @endif
                                    </b>
                                </li>
                                <li>
                                    <span>Star:</span>
                                    @if ($order->star !== NULL)
                                    <span class="ratings align-items-center">
                                        <?php for ($i=0; $i < $order->star; $i++) { ?>
                                            <i class="la la-star"></i>
                                        <?php } ?>
                                        <?php for ($i=0; $i < 5-$order->star; $i++) { ?>
                                            <i class="la la-star-o"></i>
                                        <?php } ?>
                                    </span>
                                    @else
                                        Belum Ada
                                    @endif
                                </li>
                                <li>
                                    <span>Review Dari Customer:</span> 
                                    
                                </li>
                                <li>
                                    
                                    @if ($order->review  !== NULL)
                                        {{ $order->review }}
                                    @else
                                        Belum Ada
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end form-content -->
            </div><!-- end form-box -->
        </div><!-- end col-lg-4 -->
        <div class="col-lg-6">
            <div class="form-box booking-detail-form">
                <div class="form-title-wrap">
                    <h3 class="title">Detail Reklame</h3>
                </div><!-- end form-title-wrap -->
                <div class="form-content">
                    <div class="card-item shadow-none radius-none mb-0">
                        <div class="card-img pb-4">
                            <center>
                                <img src="{{ asset('foto_reklame/'.$reklame->gambar) }}" style="width: 90%;" alt="{{ $reklame->lokasi }}">
                            </center>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-items list-items-2 py-3">
                                <li><span>Lokasi:</span>{{ $reklame->lokasi }}</li>
                                <li><span>Ukuran:</span>{{ $reklame->ukuran }}</li>
                                <li><span>Orientation Page:</span>{{ $reklame->orientation_page }}</li>
                                <li><span>Penerangan:</span>{{ $reklame->penerangan }}</li>
                                <li><span>Jarak Pandang:</span>{{ $reklame->jarak_pandang }}</li>
                                <li><span>Jumlah Sisi:</span>{{ $reklame->jumlah_sisi }}</li>
                                <li><span>Situasi Lalu Lintas:</span>{{ $reklame->situasi_lalulintas }}</li>
                                <li><span>Situasi Sekitar:</span>{{ $reklame->situasi_sekitar }}</li>
                                <li><span>Target Audiens:</span>{{ $reklame->target_audiens }}</li>
                            </ul>
                            <span>Google Maps</span>
                            <div class="table-responsive pb-4">
                                <?= $reklame->google_maps?>
                            </div>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end form-content -->
            </div><!-- end form-box -->
        </div><!-- end col-lg-4 -->
    </div>
</section>
@endsection