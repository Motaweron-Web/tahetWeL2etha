
<!-- JQUERY JS -->
<script src="{{url('assets/admin')}}/js/jquery-3.4.1.min.js"></script>
@toastr_js
@toastr_render
<!-- BOOTSTRAP JS -->
<script src="{{url('assets/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('assets/admin')}}/plugins/bootstrap/js/popper.min.js"></script>

<!-- SPARKLINE JS-->
<script src="{{url('assets/admin')}}/js/jquery.sparkline.min.js"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{url('assets/admin')}}/js/circle-progress.min.js"></script>

<!-- RATING STARJS -->
<script src="{{url('assets/admin')}}/plugins/rating/jquery.rating-stars.js"></script>

<!-- EVA-ICONS JS -->
<script src="{{url('assets/admin')}}/iconfonts/eva.min.js"></script>

<!--HORIZONTAL JS-->
<script src="{{url('assets/admin')}}/plugins/horizontal-menu/horizontal-menu.js"></script>

<!-- CUSTOM SCROLLBAR JS-->
<script src="{{url('assets/admin')}}/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- STICKY JS -->
<script src="{{url('assets/admin')}}/js/stiky.js"></script>

<!-- INTERNAL CHARTJS CHART JS -->
<script src="{{url('assets/admin')}}/plugins/chart/Chart.bundle.js"></script>
<script src="{{url('assets/admin')}}/plugins/chart/utils.js"></script>

<!-- INTERNAL PIETY CHART JS -->
<script src="{{url('assets/admin')}}/plugins/peitychart/jquery.peity.min.js"></script>
<script src="{{url('assets/admin')}}/plugins/peitychart/peitychart.init.js"></script>
<!-- INTERNAL APEXCHART JS -->
<script src="{{url('assets/admin')}}/js/apexcharts.js"></script>

{{--<!--INTERNAL  INDEX JS -->--}}
{{--<script src="{{url('assets/admin')}}/js/index1.js"></script>--}}
<!-- SIDEBAR JS -->
<script src="{{url('assets/admin')}}/plugins/sidebar/sidebar-rtl.js"></script>

<!-- CUSTOM JS -->
<script src="{{url('assets/admin')}}/js/custom.js"></script>

<!-- Switcher JS -->
<script src="{{url('assets/admin')}}/switcher/js/switcher-rtl.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //for input number validation
    $(document).on('keyup','.numbersOnly',function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
</script>

@yield('js')
