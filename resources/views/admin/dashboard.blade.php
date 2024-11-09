@extends('app')
@php
    $side_navcontent = ['user' => 'user', 'recipe' => 'recipe'];
@endphp
@section('content')

    <body class="sb-nav-fixed">
        @include('component.topNavigation')
        <div id="layoutSidenav">
            @include('component.sideNavigation', [$side_navcontent])
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div class="wrap-title">
                                <h1 class="mt-4">@yield('title-content')</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">@yield('title-content')</li>
                                </ol>
                            </div>
                            @if (Route::is('recipe'))
                                <a class="btn btn-primary" href="{{ route('recipe.add') }}">Add</a>
                            @endif
                        </div>

                        {{-- @include('admin.tabledata') --}}
                        @yield('data')
                    </div>
                </main>
                @include('layouts.footer')
            </div>
        </div>
    </body>
@endsection
