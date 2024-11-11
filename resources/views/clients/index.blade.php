@extends('app')
@php
    $is_admin = Auth::check() ? Auth::user()->isadmin : 0;
    $user_name = Auth::check() ? Auth::user()->name : 'NewCommer';
    $side_navcontent = ['Danh sách' => 'list', 'Tìm kiếm' => 'search'];
@endphp
@section('content')

    <body class="sb-nav-fixed">
        @include('component.topNavigation', [$is_admin])
        <div id="layoutSidenav">
            @include('component.sideNavigation', [$user_name])
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 my-4">
                        @yield('content_data')
                    </div>
                </main>
                @include('layouts.footer')
            </div>
        </div>
    </body>
@endsection
