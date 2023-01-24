@extends('layoutAdmin.main')

@section('content')
<section>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-box">
                <div class="form-title-wrap">
                    <div>
                        <h3 class="title">{{ $subTitle }}</h3>
                        <p class="font-size-14">Silahkan kelola data order di tabel bawah!</p>
                    </div>
                </div>
                <div class="form-content">
                    <div class="table-form table-responsive">
                        <div class="mb-2">
                            @if (session('berhasil'))    
                                <div class="alert bg-primary text-white alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-ban"></i> Berhasil!</h4>
                                    {{ session('berhasil') }}
                                </div>
                            @endif
                        </div>
                        <table class="table" id="example2">
                            <thead>
                                <tr>
                                    <th scope="col">ID Pesanan</th>
                                    <th scope="col">Member</th>
                                    <th scope="col">Reklame</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Checkin Pasang</th>
                                    <th scope="col">Checkout Pasang</th>
                                    <th scope="col">Tambah Cetak</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                @foreach ($order as $item)
                                    <tr>
                                        <th>{{ $item->id_pesanan }}</th>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->lokasi }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->cekin_pasang }}</td>
                                        <td>{{ $item->cekout_pasang }}</td>
                                        <td>{{ $item->tambah_cetak }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <div class="table-content">
                                                <a href="/detail-order/{{ $item->id_pesanan }}" class="theme-btn theme-btn-small" data-toggle="tooltip" data-placement="top" title="Detail"><i class="la la-eye"></i></a>
                                                <a href="/edit-order/{{ $item->id_pesanan }}" class="theme-btn theme-btn-small" data-toggle="tooltip" data-placement="top" title="Edit"><i class="la la-edit"></i></a>
                                                <a href="/hapus-order/{{ $item->id_pesanan }}" class="theme-btn theme-btn-small" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="la la-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end form-box -->
        </div><!-- end col-lg-12 -->
    </div><!-- end row -->
</section>
@endsection