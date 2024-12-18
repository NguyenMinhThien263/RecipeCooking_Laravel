<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="">Recipe App</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    @if (!$is_admin)
        @include('component.searchcomponent')
    @endif
    <!-- Navbar-->
    @guest
        <a aria-label="Đăng nhập" class="" href="{{ route('login') }}">
            <span class="inline-block btn btn-white-500 bg-white">Đăng nhập</span>
        </a>
    @endguest
    @php
        $userdropdownbutton = $is_admin ? '' : 'ms-md-0';
    @endphp
    @auth
        <ul class="navbar-nav ms-auto {{ $userdropdownbutton }} me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    @endauth
</nav>
