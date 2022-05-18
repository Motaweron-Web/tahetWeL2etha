<!doctype html>
<html lang="en" dir="rtl">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{$setting->title}}">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="php admin panel template, laravel dashboard template, best laravel admin panel, laravel admin dashboard, laravel dashboard template, best admin panel for laravel, laravel admin dashboard template, laravel admin template bootstrap 4, laravel bootstrap admin template, best admin panel for laravel, php admin panel template, laravel admin dashboard, laravel admin template bootstrap 4, laravel bootstrap admin template, laravel admin dashboard template,">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{$setting->logo}}" />

    <!-- TITLE -->
    <title>{{$setting->title}}</title>

    @include('admin.layouts.assets.css')
</head>

<body class="">

<!-- GLOBAL-LOADER -->
<div id="global-loader" >
    <img src="{{url('assets/admin')}}/images/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- /GLOBAL-LOADER -->

<!-- GLOBAL-LOADER -->
<div id="custom-loader" style="display: none;">
    <img src="{{url('assets/admin')}}/images/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- /GLOBAL-LOADER -->
<!-- PAGE -->
<div class="page">
    <div class="page-main">
        <!-- HEADER -->
    @include('admin.layouts.inc.header')

    @include('admin.layouts.inc.navbar')
    <!-- Header -->
    @include('admin.layouts.inc.sidebar')
    <!--Content-area open-->
        <div class="content-area">
            <div class="container">
                @yield('content')
            </div>
        </div>
        <!-- CONTAINER END -->
    </div>
    @include('admin.layouts.inc.footer')
</div>
@include('admin.layouts.assets.js')
</body>

</html>
