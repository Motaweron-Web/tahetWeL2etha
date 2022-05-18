<!doctype html>
<html lang="en" dir="rtl">
<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Yoha –  HTML5 Bootstrap Admin Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
          content="admin dashboard html template, admin dashboard template bootstrap 4, analytics dashboard templates, best admin template bootstrap 4, best bootstrap admin template, bootstrap 4 template admin, bootstrap admin template premium, bootstrap admin ui, bootstrap basic admin template, cool admin template, dark admin dashboard, dark admin template, dark dashboard template, dashboard template bootstrap 4, ecommerce dashboard template, html5 admin template, light bootstrap dashboard, sales dashboard template, simple dashboard bootstrap 4, template bootstrap 4 admin">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>تسجيل الدخول</title>

    {{--/////////////// css ///////////////--}}
    @include('admin.layouts.assets.css')
    {{--/////////////// css ///////////////--}}
</head>

<body class="">


<!-- BACKGROUND-IMAGE -->
<div class="login-img">

    <!-- GLOABAL LOADER -->
    <div id="global-loader">
        <img src="{{url('assets/admin')}}/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- End GLOABAL LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="">
            <div class="col col-login mx-auto">
                <div class="text-center">
                    <img src="{{$setting->logo}}" class="header-brand-img" alt="">
                </div>
            </div>
            <!-- CONTAINER OPEN -->
            <div class="container-login100">
                <div class="wrap-login100 p-6">
                    <form id="LoginForm" action="{{route('admin.login')}}" class="login100-form validate-form">
                        @csrf
								<span class="login100-form-title">
									تسجيل الدخول
								</span>
                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="email" placeholder="Email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
										<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                             width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path
                                                d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path
                                                d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg>
									</span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
										<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                             width="24"><g fill="none"><path d="M0 0h24v24H0V0z"/><path
                                                    d="M0 0h24v24H0V0z" opacity=".87"/></g><path
                                                d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z"
                                                opacity=".3"/><path
                                                d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg>
									</span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" id="loginButton" class="login100-form-btn btn-primary">
                                دخول
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--END PAGE -->
</div>
<!-- END MAIN -->
{{--/////////////// js ///////////////--}}
@include('admin.layouts.assets.js')
<script>
    $("form#LoginForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $('#LoginForm').attr('action');
        $.ajax({
            url:url,
            type: 'POST',
            data: formData,
            beforeSend: function(){
                $('#loginButton').html('<span style="margin-left: 4px;">جاري التسجيل</span><span class="spinner-border spinner-border-sm mr-2" ' +
                    ' ></span> ').attr('disabled', true);

            },
            complete: function(){


            },
            success: function (data) {
                if (data == 200){
                    toastr.success('تم تسجيل الدخول بنجاح');
                    window.setTimeout(function() {
                        window.location.href='{{route('admin.index')}}';
                    }, 1000);
                }else {
                    toastr.error('wrong password');
                    $('#loginButton').html('دخول').attr('disabled', false);
                }

            },
            error: function (data) {
                if (data.status === 500) {
                    $('#loginButton').html('دخول').attr('disabled', false);
                    toastr.error('هناك خطأ ما');
                }
                else if (data.status === 422) {
                    $('#loginButton').html('دخول').attr('disabled', false);
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value,key);
                            });

                        } else {
                        }
                    });
                }else {
                    $('#loginButton').html('دخول').attr('disabled', false);

                    toastr.error('there in an error');
                }
            },//end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });

</script>

</body>

</html>
