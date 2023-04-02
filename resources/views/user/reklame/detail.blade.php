@extends('layoutUser.main')

@section('content')

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-2 py-0">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-btn">
                        <div class="btn-box">
                            <a class="theme-btn" data-fancybox="video" data-src="https://www.youtube.com/watch?v=0GZSfBuhf6Y"
                               data-speed="700">
                            </a>
                            <a class="theme-btn" data-src="images/destination-img.jpg"
                               data-fancybox="gallery"
                               data-caption="Showing image - 01"
                               data-speed="700">
                            </a>
                        </div>
                    </div><!-- end breadcrumb-btn -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START TOUR DETAIL AREA
================================= -->
<section class="tour-detail-area padding-bottom-90px">
    <div class="single-content-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="single-content-wrap padding-top-60px">
                                <div id="description" class="page-scroll">
                                    <div class="single-content-item pb-4">
                                        <h3 class="title font-size-26">{{$reklame->lokasi}} ({{$reklame->ukuran}})</h3>
                                        <div class="d-flex flex-wrap align-items-center pt-2">
                                            <p class="mr-2">{{ $reklame->alamat }}</p>
                                        </div>
                                    </div><!-- end single-content-item -->
                                    <div class="single-content-item padding-bottom-40px">
                                        <div class="row">
                                        <div class="col-sm-6 col-lg-6">
                                            <h3 class="title font-size-20">Orientation Page</h3>
                                            <p class="pb-4">{{ $reklame->orientation_page }}</p>
                                            <h3 class="title font-size-20">Penerangan</h3>
                                            <p class="pb-4">{{ $reklame->penerangan }}</p>
                                            <h3 class="title font-size-20">Jarak Pandang</h3>
                                            <p class="pb-4">{{ $reklame->jarak_pandang }}</p>
                                            <h3 class="title font-size-20">Jumlah Sisi</h3>
                                            <p class="pb-4">{{ $reklame->jumlah_sisi }}</p>
                                        </div>
                                        <div class="col-sm-6 col-lg-6">
                                            <h3 class="title font-size-20">Situasi Lalu Lintas</h3>
                                            <p class="pb-4">{{ $reklame->situasi_lalulintas }}</p>
                                            <h3 class="title font-size-20">Situasi Sekitar</h3>
                                            <p class="pb-4">{{ $reklame->situasi_sekitar }}</p>
                                            <h3 class="title font-size-20">Target Audiens</h3>
                                            <p class="pb-4">{{ $reklame->target_audiens }}</p>
                                        </div>
                                        </div><!-- end single-content-item -->
                                    </div>
                                    
                                    <div class="section-block"></div>
                                </div><!-- end description -->
                                <div id="photo" class="page-scroll">
                                    <div class="single-content-item padding-top-40px">
                                        <h3 class="title font-size-20">Photo</h3>
                                        <div class="gallery-carousel carousel-action padding-top-30px">
                                            @foreach ($gambarReklame as $item)
                                                <div class="card-item mb-0">
                                                    <div class="card-img">
                                                        <img src="{{ asset('foto_gambar_reklame/'.$item->gambar_reklame) }}" alt="Slide Gambar Reklame">
                                                    </div>
                                                </div><!-- end card-item -->
                                            @endforeach
                                        </div><!-- end gallery-carousel -->
                                    </div><!-- end single-content-item -->
                                </div><!-- end photo -->
                                <div id="location-map" class="page-scroll">
                                    <div class="single-content-item padding-top-40px padding-bottom-40px">
                                        <h3 class="title font-size-20">Location</h3>
                                        <div class="gmaps padding-top-30px">
                                            <?= $reklame->google_maps?>
                                        </div>
                                    </div><!-- end single-content-item -->
                                    <div class="section-block"></div>
                                </div><!-- end location-map -->
                                <div id="reviews" class="page-scroll">
                                    <div class="single-content-item padding-top-40px padding-bottom-40px">
                                        <h3 class="title font-size-20">Reviews</h3>
                                        <div class="review-container padding-top-30px">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4">
                                                    <div class="review-summary">
                                                        <h2>{{$star}}<span>/{{$jumlahOrder}}</span></h2>
                                                        <p>Excellent</p>
                                                        <span>Dari {{$jumlahOrder}} reviewer</span>
                                                    </div>
                                                </div><!-- end col-lg-4 -->
                                            </div>
                                        </div>
                                    </div><!-- end single-content-item -->
                                    <div class="section-block"></div>
                                </div><!-- end reviews -->
                                <div class="review-box">
                                    <div class="single-content-item padding-top-40px">
                                        <h3 class="title font-size-20">Review Pengguna</h3>
                                        <div class="comments-list padding-top-50px">
                                            <div class="comment">
                                                <div class="comment-body">
                                                    @foreach ($order as $item)
                                                    @if($item->star !== null)
                                                    <div class="meta-data">
                                                        <h3 class="comment__author">{{ $item->nama }}</h3>
                                                        <div class="meta-data-inner d-flex">
                                                            <span class="ratings d-flex align-items-center mr-1">
                                                                <?php for ($i=0; $i < $item->star; $i++) { ?>
                                                                    <i class="la la-star"></i>
                                                                <?php } ?>
                                                                <?php for ($i=0; $i < 5-$item->star; $i++) { ?>
                                                                    <i class="la la-star-o"></i>
                                                                <?php } ?>
                                                            </span>
                                                            <p class="comment__date">{{ date('d F Y', strtotime($item->tanggal)) }}</p>
                                                        </div>
                                                    </div>
                                                    <p class="comment-content">
                                                       {{ $item->review }}
                                                    </p>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="btn-box load-more text-center">
                                                <a href="/review/{{ $reklame->id_reklame }}" class="theme-btn theme-btn-small theme-btn-transparent">Lihat Semua Review</a>
                                            </div>
                                        </div><!-- end comments-list -->
                                    </div><!-- end single-content-item -->
                                </div><!-- end review-box -->
                            </div><!-- end single-content-wrap -->
                        </div>
                    </div>
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar single-content-sidebar mb-0">
                        <div class="sidebar-widget single-content-widget">
                            <div class="sidebar-widget-item">
                                <div class="sidebar-book-title-wrap mb-3">
                                    <h3>Booking Reklame</h3>
                                    @if($biodata->power_harga === 'On')
                                    <p><span class="text-form"><?= 'Rp ' . number_format($item->mulai_harga, 0, ',', '.'); ?> - <?= 'Rp ' . number_format($item->sampai_harga, 0, ',', '.'); ?></span></p>
                                    @elseif($biodata->power_harga === 'Off')
                                    <p><span class="text-form">Harga? Lakukan booking terlebih dahulu!</span></p>
                                    @endif
                                </div>
                            </div><!-- end sidebar-widget-item -->
                          
                                <div class="sidebar-widget-item">
                                    <div class="contact-form-action">
                                        <div class="input-box">
                                            <label class="label-text">Tanggal</label>
                                            <div class="form-group">
                                                <input claxss="date-range form-control" type="hidden" id="id_reklame" value="{{$reklame->id_reklame}}">
                                                <span class="la la-calendar form-icon"></span>
                                                <input class="date-range form-control" type="text" id="daterange" name="daterange" required>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end sidebar-widget-item -->
                                <div class="sidebar-widget-item">
                                    <div class="contact-form-action">
                                        <h3 class="title pb-3">Tambahkan Print</h3>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="agreeChb">
                                            <label for="agreeChb">Tambahkan Cetak Billboard</label>
                                        </div>
                                    </div>
                                </div><!-- end sidebar-widget-item -->
                                <div class="btn-box pt-2">
                                    {{-- <a href="#" onclick="prosesBooking(12)">Submit</a> --}}
                                    @if (Session()->get('email'))
                                        <button type="submit" onclick="prosesBooking()" class="theme-btn text-center w-100 mb-2"><i class="la la-shopping-cart mr-2 font-size-18"></i>Booking Sekarang</button>
                                    @else
                                        <a href="/login" onclick="prosesBooking()" class="theme-btn text-center w-100 mb-2"><i class="la la-shopping-cart mr-2 font-size-18"></i>Booking Sekarang</a>
                                    @endif
                                </div>
                           
                        </div><!-- end sidebar-widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end single-content-box -->
</section><!-- end tour-detail-area -->
<!-- ================================
    END TOUR DETAIL AREA
================================= -->

<div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg"" role="document">
        <div class="modal-content modal-lg">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-2">
                        <div class="alert bg-primary text-white alert-dismissible">
                            <div id="pesan"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="/reklame-booking" class="btn btn-primary">Reklame Dapat Dibooking</a>
        </div>
        </form>
        </div>
    </div>
</div>
@endsection

{{-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> --}}
<script>
    this.datas = new FormData();

    // untuk proses create data
    function prosesBooking() {
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            var id_reklame = $("#id_reklame").val();
            var daterange = $("#daterange").val();
            var cekin_pasang_tanggal = daterange.substring(0,2);
            var cekin_pasang_bulan = daterange.substring(3,5);
            var cekin_pasang_tahun = daterange.substring(6,10);
            var cekout_pasang_tanggal = daterange.substring(13,15);
            var cekout_pasang_bulan = daterange.substring(16,18);
            var cekout_pasang_tahun = daterange.substring(19,25);
            var cekin_pasang = cekin_pasang_tahun+'-'+cekin_pasang_bulan+'-'+cekin_pasang_tanggal;
            var cekout_pasang = cekout_pasang_tahun+'-'+cekout_pasang_bulan+'-'+cekout_pasang_tanggal;
            var tambah_cetak = $("#agreeChb").val();
            datas.append('cekin_pasang',cekin_pasang);
            datas.append('cekout_pasang',cekout_pasang);
            datas.append('tambah_cetak',tambah_cetak);
            datas.append('_token',CSRF_TOKEN);
            $.ajax({
                 url: "{{url('/booking')}}/"+id_reklame,
                 method: 'post',
                 data: datas,
                 contentType: false,
                 processData: false,
                 dataType: 'json',
            success: function(response) {
                    if(response.success == 'berhasil'){
                        window.location = `{{route('booking')}}`;
                    } else {
                        $("#exampleModal").modal('show');
                        $("#pesan").html(response.pesan);
                    }
                }
            });
        }
</script>