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
                            <p class="font-size-14">Silahkan kelola data faq di tabel bawah!</p>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="table-form table-responsive">
                            <div class="mb-2">
                                <a href="/tambah-faq" class="theme-btn theme-btn-small"><i class="la la-plus"></i> Tambah</a>
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
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Pertanyaan</th>
                                        <th scope="col">Jawaban</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;?>
                                    @foreach ($faq as $item)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->pertanyaan }}</td>
                                            <td>
                                                @if ($item->jawaban === NULL)
                                                    <strong>Butuh Jawaban</strong>
                                                @else
                                                    {{ $item->jawaban }}
                                                @endif
                                            </td>
                                            <td>
                                                <div class="table-content">
                                                    <a href="/edit-faq/{{ $item->id_faq }}" class="theme-btn theme-btn-small" data-toggle="tooltip" data-placement="top" title="Edit"><i class="la la-edit"></i></a>
                                                    <button type="button" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#hapus{{$item->id_faq}}" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="la la-trash"></i></button>
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

{{-- Hapus --}}
@foreach ($faq as $item)
<div class="modal fade" id="hapus{{ $item->id_faq }}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a href="/hapus-faq/{{ $item->id_faq }}" class="btn btn-danger">Hapus</a>
        </div>
        </div>
    </div>
</div>
@endforeach
@endsection