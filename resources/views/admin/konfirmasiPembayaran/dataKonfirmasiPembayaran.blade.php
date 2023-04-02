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
                            <p class="font-size-14">Silahkan kelola data konfirmasi pembayaran di tabel bawah!</p>
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
                                        <th scope="col">No</th>
                                        <th scope="col">ID Pesanan</th>
                                        <th scope="col">Member</th>
                                        <th scope="col">Reklame</th>
                                        <th scope="col">Tanggal Bayar</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;?>
                                    @foreach ($order as $item)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <th>{{ $item->id_pesanan }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->lokasi }}</td>
                                            <td>{{ $item->tanggal_bayar }}</td>
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
                                                <div class="table-content">
                                                    <button type="button" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#editStatus{{$item->id_pesanan}}" data-toggle="tooltip" data-placement="top" title="Edit Status Order"><i class="la la-check"></i></button>
                                                    <a href="/detail-pembayaran/{{ $item->id_konfirmasi_pembayaran }}" class="theme-btn theme-btn-small" data-toggle="tooltip" data-placement="top" title="Detail"><i class="la la-eye"></i></a>
                                                    <button type="button" data-toggle="modal" data-target="#hapus{{$item->id_konfirmasi_pembayaran}}" class="theme-btn theme-btn-small" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="la la-trash"></i></button>
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

        {{-- footer --}}
        @include('layoutAdmin.footer')
        {{-- end footer --}}
    </div>
</div>
{{-- Approve --}}
@foreach ($order as $item)
<div class="modal fade" id="editStatus{{$item->id_pesanan}}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-sm">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Status Order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/edit-status/{{ $item->id_pesanan }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-box">
                            <label class="label-text">Status</label>
                            <div class="form-group select-contain w-100">
                                <select class="select-contain-select" name="status_order">
                                    <option value="{{$item->status_order}}">{{$item->status_order}}</option>
                                    <option value="Dibayar">Dibayar</option>
                                    <option value="Approve/Tayang">Approve/Tayang</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
        </div>
    </div>
</div>
@endforeach

{{-- Hapus --}}
@foreach ($order as $item)
<div class="modal fade" id="hapus{{ $item->id_konfirmasi_pembayaran }}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a href="/hapus-pembayaran/{{ $item->id_konfirmasi_pembayaran }}"class="btn btn-danger">Hapus</a>
        </div>
        </div>
    </div>
</div>
@endforeach
@endsection

