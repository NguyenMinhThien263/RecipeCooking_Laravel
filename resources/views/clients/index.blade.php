@extends('app')
@php
    $side_navcontent = ['danh sach' => 'list', 'timkiem' => 'search'];
@endphp
@section('content')

    <body class="sb-nav-fixed">
        @include('component.topNavigation')
        <div id="layoutSidenav">
            @include('component.sideNavigation')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    </div>
                </main>
                @include('layouts.footer')
            </div>
        </div>
    </body>
@endsection
