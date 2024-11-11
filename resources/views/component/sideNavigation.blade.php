<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                @foreach ($side_navcontent as $name => $link)
                    <a class="nav-link" href="{{ route($link) }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        {{ ucfirst($name) }}
                    </a>
                @endforeach
                @auth
                    <a class="nav-link" href="{{ route('client.add') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        {{ ucfirst('Chia sẻ công thức') }}
                    </a>
                @endauth
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ $user_name }}
        </div>
    </nav>
</div>
