<div class="sidebar-nav sidebar--nav">
    <div class="sidebar-nav-body">
        <div class="author-content">
            <div class="d-flex align-items-center">
                <div class="author-bio">
                    <h4 class="author__title">{{ Session()->get('nama') }}</h4>
                    <span class="author__meta">Welcome to Admin Panel</span>
                </div>
            </div>
        </div>
        <div class="sidebar-menu-wrap">
            <ul class="sidebar-menu toggle-menu list-items">
                <li class="@if($title === 'Dashboard') page-active @endif"><a href=""><i class="la la-dashboard mr-2"></i>Dashboard</a></li>
                <li><a href=""><i class="la la-box mr-2"></i>Data Reklame</a></li>
                <li><a href=""><i class="la la-check mr-2"></i>Konfirmasi Pemesanan</a></li>
                <li class="@if($title === 'Data Admin') page-active @endif"><a href="/kelola-admin"><i class="la la-users mr-2"></i>Data Admin</a></li>
                <li class="@if($title === 'Data User') page-active @endif" ><a href="/kelola-user"><i class="la la-user mr-2"></i>Data User</a></li>
                <li><a href="/logout"><i class="la la-power-off mr-2"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</div>