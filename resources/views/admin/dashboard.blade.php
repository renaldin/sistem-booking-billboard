@extends('layoutAdmin.main')

@section('content')
<section>
    <div class="row mt-4">
        <div class="col-lg-3 responsive-column-l">
            <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                <div class="d-flex pb-3 justify-content-between">
                    <div class="info-content">
                        <p class="info__desc">Total Booking!</p>
                        <h4 class="info__title">55</h4>
                    </div><!-- end info-content -->
                    <div class="info-icon icon-element bg-4">
                        <i class="la la-shopping-cart"></i>
                    </div><!-- end info-icon-->
                </div>
                <div class="section-block"></div>
                <a href="admin-dashboard-booking.html" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>
            </div>
        </div><!-- end col-lg-3 -->
        <div class="col-lg-3 responsive-column-l">
            <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                <div class="d-flex pb-3 justify-content-between">
                    <div class="info-content">
                        <p class="info__desc">New Reviews!</p>
                        <h4 class="info__title">22</h4>
                    </div><!-- end info-content -->
                    <div class="info-icon icon-element bg-3">
                        <i class="la la-star"></i>
                    </div><!-- end info-icon-->
                </div>
                <div class="section-block"></div>
                <a href="admin-dashboard-reviews.html" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>
            </div>
        </div><!-- end col-lg-3 -->
        <div class="col-lg-3 responsive-column-l">
            <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                <div class="d-flex pb-3 justify-content-between">
                    <div class="info-content">
                        <p class="info__desc">Total Subscribers!</p>
                        <h4 class="info__title">27</h4>
                    </div><!-- end info-content -->
                    <div class="info-icon icon-element bg-2">
                        <i class="la la-envelope"></i>
                    </div><!-- end info-icon-->
                </div>
                <div class="section-block"></div>
                <a href="admin-dashboard-subscribers.html" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>
            </div>
        </div><!-- end col-lg-3 -->
        <div class="col-lg-3 responsive-column-l">
            <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                <div class="d-flex pb-3 justify-content-between">
                    <div class="info-content">
                        <p class="info__desc">New Bookmarks!</p>
                        <h4 class="info__title">25</h4>
                    </div><!-- end info-content -->
                    <div class="info-icon icon-element bg-1">
                        <i class="la la-bookmark-o"></i>
                    </div><!-- end info-icon-->
                </div>
                <div class="section-block"></div>
                <a href="admin-dashboard-wishlist.html" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection
