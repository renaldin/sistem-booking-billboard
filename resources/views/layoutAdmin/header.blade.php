<div class="row">
    <div class="col-lg-12">
        <div class="menu-wrapper">
            <div class="logo mr-5">
                <a href="index-2.html"><img src="{{ asset('foto_biodata/'.$biodata->logo) }}" style="width: 100px;" alt="logo"></a>
                <div class="menu-toggler">
                    <i class="la la-bars"></i>
                    <i class="la la-times"></i>
                </div>
                <div class="user-menu-open">
                    <i class="la la-user"></i>
                </div>
            </div>
            <div class="nav-btn ml-auto">
                <div class="notification-wrap d-flex align-items-center">
                    <div class="notification-item">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" id="userDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm flex-shrink-0 mr-2"><img src="@if(Session()->get('foto')){{ asset('foto_admin/'.Session()->get('foto')) }} @else {{ asset('foto_admin/default1.jpg') }} @endif" alt="team-img"></div>
                                    <span class="font-size-14 font-weight-bold">{{ Session()->get('nama') }}</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-reveal dropdown-menu-md dropdown-menu-right">
                                <div class="dropdown-item drop-reveal-header user-reveal-header">
                                    <h6 class="title text-uppercase">Selamat Datang!</h6>
                                </div>
                                <div class="list-group drop-reveal-list user-drop-reveal-list">
                                    <a href="/profil-admin" class="list-group-item list-group-item-action">
                                        <div class="msg-body">
                                            <div class="msg-content">
                                                <h3 class="title"><i class="la la-user mr-2"></i>Profil</h3>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="/kelola-order" class="list-group-item list-group-item-action">
                                        <div class="msg-body">
                                            <div class="msg-content">
                                                <h3 class="title"><i class="la la-shopping-cart mr-2"></i>Orders</h3>
                                            </div>
                                        </div><!-- end msg-body -->
                                    </a>
                                    <div class="section-block"></div>
                                    <a href="/logout" class="list-group-item list-group-item-action">
                                        <div class="msg-body">
                                            <div class="msg-content">
                                                <h3 class="title"><i class="la la-power-off mr-2"></i>Logout</h3>
                                            </div>
                                        </div><!-- end msg-body -->
                                    </a>
                                </div>
                            </div><!-- end dropdown-menu -->
                        </div>
                    </div><!-- end notification-item -->
                </div>
            </div>
        </div>
    </div>
</div>