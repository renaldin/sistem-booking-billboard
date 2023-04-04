@extends('layoutAdmin.main')

@section('content')
<div class="dashboard-main-content">
    <div class="container-fluid">
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cetakMember"><i class="la la-print"></i> Member</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cetakReklame"><i class="la la-print"></i> Reklame</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cetakTanggal"><i class="la la-print"></i> Tanggal</button>
                            </div>
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
                                                    <span class="badge badge-info">{{ $item->status_order }}</td></span>
                                                @elseif ($item->status_order === 'Dibayar')
                                                    <span class="badge badge-success">{{ $item->status_order }}</td></span>
                                                @elseif ($item->status_order === 'Approve/Tayang')
                                                    <span class="badge badge-warning">{{ $item->status_order }}</td></span>
                                                @elseif ($item->status_order === 'Selesai')
                                                    <span class="badge badge-primary">{{ $item->status_order }}</td></span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="table-content text-center">
                                                    <a href="/download-detail/{{ $item->id_pesanan }}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="la la-download"></i></a>
                                                    <a href="/detail-order/{{ $item->id_pesanan }}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Detail"><i class="la la-eye"></i></a>
                                                    <button type="button" class="theme-btn theme-btn-small mb-1" data-toggle="modal" data-target="#hapus{{$item->id_pesanan}}" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="la la-trash"></i></button>
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
        {{-- footer --}}
        @include('layoutAdmin.footer')
        {{-- end footer --}}
    </div>
</div>

{{-- cetak --}}
<div class="modal fade" id="cetakMember"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Berdasarkan Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="/cetak-pdf-order" method="POST">
                @csrf
                <div class="contact-form-action">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="input-box">
                                <label class="label-text">Pilih Member</label>
                                <div class="form-group">
                                    <span class="la la-calendar form-icon"></span>
                                    <input type="hidden" name="cetakOrder" value="Member">
                                    <div class="form-group select-contain w-100">
                                        <select class="select-contain-select" name="id_member">
                                            @foreach ($dataMember as $item)
                                                <option value="{{$item->id_member}}">{{$item->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Cetak</button>
        </div>
        </form>
        </div>
    </div>
</div>
<div class="modal fade" id="cetakReklame"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Berdasarkan Reklame</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="/cetak-pdf-order" method="POST">
                @csrf
                <div class="contact-form-action">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="input-box">
                                <label class="label-text">Pilih Reklame</label>
                                <div class="form-group">
                                    <span class="la la-calendar form-icon"></span>
                                    <input type="hidden" name="cetakOrder" value="Reklame">
                                    <div class="form-group select-contain w-100">
                                        <select class="select-contain-select" name="id_reklame">
                                            @foreach ($dataReklame as $item)
                                                <option value="{{$item->id_reklame}}">{{$item->lokasi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Cetak</button>
        </div>
        </form>
        </div>
    </div>
</div>
<div class="modal fade" id="cetakTanggal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Berdasarkan Tanggal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="/cetak-pdf-order" method="POST">
                @csrf
                <div class="contact-form-action">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="input-box">
                                <label class="label-text">Pilih Tanggal</label>
                                <div class="form-group">
                                    <span class="la la-calendar form-icon"></span>
                                    <input type="hidden" name="cetakOrder" value="Tanggal">
                                    <div class="form-group select-contain w-100">
                                        <select class="select-contain-select" name="tanggal">
                                            @foreach ($dataTanggal as $item)
                                                <option value="{{$item->tanggal}}">{{ date('d F Y', strtotime($item->tanggal)) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Cetak</button>
        </div>
        </form>
        </div>
    </div>
</div>
{{-- End cETAK --}}

{{-- tambah harga --}}
@foreach ($order as $item)
<div class="modal fade" id="tambahBeriHarga{{$item->id_pesanan}}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-sm">
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
                    <div class="col-lg-12">
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
        <div class="modal-content modal-sm">
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
                    <div class="col-lg-12">
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

{{-- Hapus --}}
@foreach ($order as $item)
<div class="modal fade" id="hapus{{ $item->id_pesanan }}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Apakah Anda yakin akan hapus data ini ?</p>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <a href="/hapus-order/{{ $item->id_pesanan }}" class="btn btn-danger">Hapus</a>
        </div>
        </div>
    </div>
</div>
@endforeach
@endsection