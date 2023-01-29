@extends('layoutAdmin.main')

@section('content')
<section>
    <div class="row mt-4">
        <div class="col-lg-3 responsive-column-l">
            <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                <div class="d-flex pb-3 justify-content-between">
                    <div class="info-content">
                        <p class="info__desc">Total Order</p>
                        <h4 class="info__title">{{ $jumlahOrder }}</h4>
                    </div><!-- end info-content -->
                    <div class="info-icon icon-element bg-4">
                        <i class="la la-shopping-cart"></i>
                    </div><!-- end info-icon-->
                </div>
                <div class="section-block"></div>
                <a href="/kelola-order" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>
            </div>
        </div><!-- end col-lg-3 -->
        <div class="col-lg-3 responsive-column-l">
            <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                <div class="d-flex pb-3 justify-content-between">
                    <div class="info-content">
                        <p class="info__desc">Menunggu Harga</p>
                        <h4 class="info__title">{{ $jumlahTungguHarga }}</h4>
                    </div><!-- end info-content -->
                    <div class="info-icon icon-element bg-3">
                        <i class="la la-star"></i>
                    </div><!-- end info-icon-->
                </div>
                <div class="section-block"></div>
                <a href="" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>
            </div>
        </div><!-- end col-lg-3 -->
        <div class="col-lg-3 responsive-column-l">
            <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                <div class="d-flex pb-3 justify-content-between">
                    <div class="info-content">
                        <p class="info__desc">Jumlah Admin</p>
                        <h4 class="info__title">{{ $jumlahAdmin }}</h4>
                    </div><!-- end info-content -->
                    <div class="info-icon icon-element bg-2">
                        <i class="la la-user"></i>
                    </div><!-- end info-icon-->
                </div>
                <div class="section-block"></div>
                <a href="/kelola-admin" class="d-flex align-items-center justify-content-between view-all">Lihat Semua <i class="la la-angle-right"></i></a>
            </div>
        </div><!-- end col-lg-3 -->
        <div class="col-lg-3 responsive-column-l">
            <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                <div class="d-flex pb-3 justify-content-between">
                    <div class="info-content">
                        <p class="info__desc">Jumlah User</p>
                        <h4 class="info__title">{{ $jumlahUser }}</h4>
                    </div><!-- end info-content -->
                    <div class="info-icon icon-element bg-1">
                        <i class="la la-users"></i>
                    </div><!-- end info-icon-->
                </div>
                <div class="section-block"></div>
                <a href="/kelola-user" class="d-flex align-items-center justify-content-between view-all">Lihat Semua <i class="la la-angle-right"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection
