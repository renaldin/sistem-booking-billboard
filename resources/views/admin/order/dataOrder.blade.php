@extends('layoutAdmin.main')

@section('content')
<section>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-box">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-title-wrap">
                            <div>
                                <h3 class="title">{{ $subTitle }}</h3>
                                <p class="font-size-14">Silahkan kelola data order di tabel bawah!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-totals table-form">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Menunggu Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <div class="table-content">
                                                <center><h3 class="title">{{ $jumlahTungguHarga }}</h3></center>
                                            </div>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
                                    <th scope="col">Batas Beri Harga</th>
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
                                        <td>{{ date('d F Y', strtotime($item->tanggal)) }}</td>
                                        <td>{{ $item->jam_harga }}</td>
                                        <td>
                                            @if ($item->harga === NULL)
                                                Menunggu Harga <br>
                                                {{-- <a href="/beri-harga/{{ $item->id_pesanan }}" class="btn btn-sm btn-flat btn-primary">Beri Harga</a> --}}
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahBeriHarga{{$item->id_pesanan}}">Beri Harga</button>
                                            @else
                                                <?= 'Rp ' . number_format($item->harga, 2, ',', '.'); ?> <br>
                                                {{-- <a href="/edit-harga/{{ $item->id_pesanan }}" class="btn btn-sm btn-flat btn-success">Edit Harga</a> --}}
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editBeriHarga{{$item->id_pesanan}}">Edit Harga</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status_order === 'Batal')
                                                <span class="badge badge-danger">{{ $item->status_order }}</td></span>
                                            @elseif ($item->status_order === 'Dibooking')
                                                <span class="badge badge-primary">{{ $item->status_order }}</td></span>
                                            @elseif ($item->status_order === 'Dibayar')
                                                <span class="badge badge-success">{{ $item->status_order }}</td></span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="table-content">
                                                <a href="/detail-order/{{ $item->id_pesanan }}" class="theme-btn theme-btn-small" data-toggle="tooltip" data-placement="top" title="Detail"><i class="la la-eye"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Modal -->
                    </div>
                </div>
            </div><!-- end form-box -->
        </div><!-- end col-lg-12 -->
    </div><!-- end row -->
</section>

@endsection
{{-- tambah harga --}}
@foreach ($order as $item)
<div class="modal fade" id="tambahBeriHarga{{$item->id_pesanan}}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Beri Harga</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/beri-harga/{{ $item->id_pesanan }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-box">
                            <label class="label-text">Harga</label>
                            <div class="form-group">
                                <input class="form-control" type="number" name="harga" placeholder="Masukkan Harga" value="{{ old('harga') }}" required autofocus>
                            </div>
                            @error('harga')
                            <div style="margin-top: -16px">
                                <small class="text-danger">{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
        </div>
    </div>
</div>
@endforeach
{{-- edit harga --}}
@foreach ($order as $item)    
<div class="modal fade" id="editBeriHarga{{$item->id_pesanan}}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Harga</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/beri-harga/{{ $item->id_pesanan }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-box">
                            <label class="label-text">Harga</label>
                            <div class="form-group">
                                <input class="form-control" type="number" name="harga" placeholder="Masukkan Harga" value="{{ $item->harga }}" required autofocus>
                            </div>
                            @error('harga')
                            <div style="margin-top: -16px">
                                <small class="text-danger">{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        </form>
        </div>
    </div>
</div>
@endforeach