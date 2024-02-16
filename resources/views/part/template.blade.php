<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>@yield('title')</title>
    @include('part/css_link')
    @livewireStyles
</head>

<body>
    <!-- Sidenav -->
    @if (optional(auth()->user())->level==null)

    @else
    @include('part/side_nav')
    @endif
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('part/top_nav')
        <!-- Header -->
        @include('part/header')
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card bg-white">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h1 style="text-align: center">@yield('judul_halaman')</h1>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 1%;">
                            @yield('konten')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScripts -->
    @include('part/javascript_link')
    @livewireScripts
</body>
</html>
