<!-- FAVICON -->
<link rel="shortcut icon" type="image/x-icon" href="{{$setting->logo}}" />

<!-- TITLE -->
<title>@yield('title')</title>

<!-- BOOTSTRAP CSS -->
<link href="{{url('assets/admin')}}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

<!-- STYLE CSS -->
<link href="{{url('assets/admin')}}/css-rtl/style.css" rel="stylesheet"/>
<link href="{{url('assets/admin')}}/css-rtl/skin-modes.css" rel="stylesheet"/>
<link href="{{url('assets/admin')}}/css-rtl/dark-style.css" rel="stylesheet"/>

<!-- CUSTOM SCROLL BAR CSS-->
<link href="{{url('assets/admin')}}/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

<!--- FONT-ICONS CSS -->
<link href="{{url('assets/admin')}}/css/icons.css" rel="stylesheet"/>

<!-- SIDEBAR CSS -->
<link href="{{url('assets/admin')}}/plugins/sidebar/sidebar.css" rel="stylesheet">

<!-- INTERNAL SINGLE-PAGE CSS -->
<link href="{{url('assets/admin')}}/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">
<!-- COLOR SKIN CSS -->
<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{url('assets/admin')}}/colors/color1.css" />

<!-- Switcher CSS -->
<link href="{{url('assets/admin')}}/switcher/css/switcher-rtl.css" rel="stylesheet">
<link href="{{url('assets/admin')}}/switcher/demo.css" rel="stylesheet">
@yield('css')
@toastr_css
