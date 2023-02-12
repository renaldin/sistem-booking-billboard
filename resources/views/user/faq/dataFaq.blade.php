@extends('layoutUser.main')

@section('content')

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-10">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content text-center">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">{{ $title }}</h2>
                        </div>
                        <span class="arrow-blink">
                            <i class="la la-arrow-down"></i>
                        </span>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
    <div class="bread-svg-box">
        <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
    </div><!-- end bread-svg -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START BOOKING AREA
================================= -->
<section class="booking-area padding-top-100px padding-bottom-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="form-box">
                        <div class="review-box">
                            <div class="accordion accordion-item" id="accordionExample">
                                @foreach ($faq as $item)
                                <div class="card">
                                    <div class="card-header" id="faqHeading{{ $item->id_faq }}">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link d-flex align-items-center justify-content-between" type="button" data-toggle="collapse" data-target="#faqCollapse{{ $item->id_faq }}" aria-expanded="false" aria-controls="faqCollapse{{ $item->id_faq }}">
                                                <span>{{ $item->pertanyaan }}</span>
                                                <i class="la la-minus"></i>
                                                <i class="la la-plus"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="faqCollapse{{ $item->id_faq }}" class="collapse" aria-labelledby="faqHeading{{ $item->id_faq }}" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>
                                                {{ $item->jawaban }}
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- end card -->             
                                @endforeach
                            </div>
                        </div><!-- end review-box -->
                    </div><!-- end single-content-wrap -->
                </div><!-- end form-box -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-2"></div>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end booking-area -->
<!-- ================================
    END BOOKING AREA
================================= -->


@endsection