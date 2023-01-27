@extends('layoutUser.main')

@section('content')

<!-- ================================
    START USER AREA
================================= -->
<section class="user-area padding-top-100px padding-bottom-60px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <h3 class="title font-size-24">Partner Information</h3>
                <div class="card-item user-card card-item-list mt-4 mb-0">
                    <div class="card-img">
                        <img src="{{ asset('template/images/team7.jpg') }}" alt="user image" class="h-auto">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">TechyDevs</h3>
                        <p class="card-meta">Member since April 2016</p>
                        <div class="d-flex justify-content-between pt-3">
                            <ul class="list-items list-items-2 flex-grow-1">
                                <li><span>Email:</span>contact@techydevs.com</li>
                                <li><span>Phone:</span>+22 12345678</li>
                                <li><span>Address:</span>2701 Spence Pl, Knoxville, USA</li>
                                <li><span>Company:</span><a href="#">PT. Techydevs</a></li>
                                <li><span>Website Company:</span><a href="#">techydevs.com</a></li>
                                <li>
                                    <span>Logo Company:</span><img class="user-pro-img" style="width: 8rem;" src="{{ asset('template/images/team1.jpg') }}" alt="user-image">
                                </li>
                            </ul>
                             <ul class="list-items flex-grow-1">
                                <li><h3 class="title">Verifications</h3></li>
                                <li class="d-flex justify-content-between align-items-center"><span class="color-text-2 font-weight-medium mr-2">Phone</span><span class="theme-btn theme-btn-small theme-btn-rgb theme-btn-danger-rgb">Not verified</span></li>
                                <li class="d-flex justify-content-between align-items-center"><span class="color-text-2 font-weight-medium mr-2">Email</span><span class="theme-btn theme-btn-small theme-btn-rgb">Verified</span></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end user-area -->
<!-- ================================
    END USER AREA
================================= -->


@endsection