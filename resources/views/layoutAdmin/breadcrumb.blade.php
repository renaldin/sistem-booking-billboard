<div class="row align-items-center">
    <div class="col-lg-6">
        <div class="breadcrumb-content">
            <div class="section-heading">
                <h2 class="sec__title font-size-30 text-white">{{ $subTitle }}</h2>
            </div>
        </div><!-- end breadcrumb-content -->
    </div><!-- end col-lg-6 -->
    <div class="col-lg-6">
        <div class="breadcrumb-list text-right">
            <ul class="list-items">
                @if ($title)
                <li>{{ $title }}</li>
                @endif

                @if ($subTitle)
                    <li>{{ $subTitle }}</li>
                @endif
            </ul>
        </div><!-- end breadcrumb-list -->
    </div><!-- end col-lg-6 -->
</div>