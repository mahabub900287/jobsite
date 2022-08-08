
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="#"><img src="{{ asset('backend/img/logo/logo.png') }}" class="main-logo" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <ul class="side-menu">
                <li class="slide {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a class="side-menu__item" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home side-icon"></i><span class="side-menu__label">Dashboard</span></a>
                </li>
                <li class="slide {{ Request::is('admin/menus*') ? 'active' : '' }}">
                    <a class="side-menu__item" href="">
                        <i class="fas fa-bars side-icon"></i><span class="side-menu__label">Menus</span></a>
                </li>
                <div class="bg-light py-2">
                  <li class="side-item side-item-category pt-1">Manage Section</li>
                </div>

        </ul>
    </div>
</aside>
