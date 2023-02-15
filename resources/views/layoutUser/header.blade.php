<header class="header-area">
    <div class="header-top-bar padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-left">
                            <ul class="list-items">
                                <li><a href="#"><i class="la la-phone mr-1"></i>(123) 123-456</a></li>
                                <li><a href="#"><i class="la la-envelope mr-1"></i>trizen@example.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-right d-flex align-items-center justify-content-end">
                            <div class="header-right-action">

                                @if (Session()->get('email'))
                                    <ul class="list-items">
                                        <li><a href="/profil"><i class="la la-user mr-1"></i>{{ Session()->get('nama') }}</a></li>
                                        <a href="/logout" class="theme-btn theme-btn-small">Logout</a>
                                    </ul>
                                @else 
                                    @if ($title === 'Register')
                                        <a href="/login" class="theme-btn theme-btn-small" >Login</a>
                                    @elseif ($title === 'Login' || $title === 'Login Admin')
                                        <a href="/register" class="theme-btn theme-btn-small theme-btn-transparent mr-1">Register</a>
                                    @else
                                        <a href="/register" class="theme-btn theme-btn-small theme-btn-transparent mr-1">Register</a>
                                        <a href="/login" class="theme-btn theme-btn-small" >Login</a>
                                    @endif
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-menu-wrapper padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="menu-wrapper">
                        <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                        <div class="logo">
                            <a href="/"><img src="{{ asset('template/images/logo.png') }}" alt="logo"></a>
                            <div class="menu-toggler">
                                <i class="la la-bars"></i>
                                <i class="la la-times"></i>
                            </div><!-- end menu-toggler -->
                        </div><!-- end logo -->
                        <div class="main-menu-content">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="/">Home</a>
                                    </li>
                                    <li>
                                        <a href="/reklame">Reklame</a>
                                    </li>
                                    @if (Session()->get('email'))
                                    <li>
                                        <a href="/booking">Booking Saya</a>
                                    </li>
                                    <li>
                                        <a href="/riwayat-booking">Riwayat Order</a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="/faq">FAQ</a>
                                    </li>
                                    @if (!Session()->get('email'))
                                    <li>
                                        @if ($title === 'Login')
                                        <a href="/register">Register</a>
                                        @else
                                        <a href="/login">Login</a>
                                        @endif
                                    </li>
                                    @endif
                                </ul>
                            </nav>
                        </div><!-- end main-menu-content -->
                    </div><!-- end menu-wrapper -->
                </div><!-- end col-lg-12 -->
            </div>
        </div>
    </div>
</header>