@extends('admin.layouts.app')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">App Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">App Dashboard</li>
            </ol>
        </div>
        <div class="mr-auto pageheader-btn">
            <a href="#" class="btn btn-primary btn-icon text-white ml-2">
                                    <span>
                                        <i class="fe fe-shopping-cart"></i>
                                    </span> Add Order
            </a>
            <a href="#" class="btn btn-secondary btn-icon text-white">
                                    <span>
                                        <i class="fe fe-plus"></i>
                                    </span> Add User
            </a>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- ROW-1 -->
    <div class="row">
        <div class="col-md-12">
            <div class="card  banner">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-lg-2 text-center">
                            <img src="https://laravel.spruko.com/yoha/Horizontal-Dark-rtl/assets/images/pngs/dash3.png" alt="img" class="w-95">
                        </div>
                        <div class="col-xl-9 col-lg-10 pl-lg-0">
                            <div class="row">
                                <div class="col-xl-7 col-lg-6">
                                    <div class="text-right text-white mt-xl-4">
                                        <h3 class="font-weight-semibold">Congratulations Steven</h3>
                                        <h4 class="font-weight-normal">You APP is Reached your targeted milestone</h4>
                                        <p class="mb-lg-0 text-white-50">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6 text-lg-center mt-xl-4">
                                    <h5 class="font-weight-semibold mb-1 text-white">App Downloads</h5>
                                    <h2 class="display-2 mb-3 number-font text-white">10M</h2>
                                    <div class="btn-list mb-xl-0">
                                        <a href="#" class="btn btn-dark mb-xl-0">Check Details</a>
                                        <a href="#" class="btn btn-white mb-xl-0" id="skip">No, Thanks</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 End-->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-md-12 col-lg-3 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body pb-0">
                    <div class="text-center mb-5">
                        <h5 class="mb-1">Total Active Users</h5>
                        <h2 class="mb-0 number-font fs-30">18,765</h2>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6 text-center border-left">
                            <p class="mb-1 text-muted fs-12">Last month</p>
                            <h5 class="mb-0 fs-14">1,876</h5>
                        </div>
                        <div class="col-6 text-center">
                            <p class="mb-1 text-muted fs-12">Last Year</p>
                            <h5 class="mb-0 fs-14">9,342</h5>
                        </div>
                    </div>
                </div>
                <div>
                    <canvas id="widget1" class=""></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-3 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body pb-0">
                    <div class="text-center mb-5">
                        <h5 class="mb-1">Total UnInstalled</h5>
                        <h2 class="mb-0  number-font fs-30">678</h2>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6 text-center border-left">
                            <p class="mb-1 text-muted fs-12">Last Week</p>
                            <h5 class="mb-0 fs-14">89</h5>
                        </div>
                        <div class="col-6 text-center">
                            <p class="mb-1 text-muted fs-12">Today</p>
                            <h5 class="mb-0 fs-14">435</h5>
                        </div>
                    </div>
                </div>
                <div>
                    <canvas id="widget2" class=""></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-6">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <h6 class="mb-1">Total Subscribes</h6>
                            </div>
                            <h3 class="text-dark count mt-0 number-font">7,986</h3>
                            <div class="progress progress-sm mt-0 mb-1 h-1">
                                <div class="progress-bar bg-orange w-75" role="progressbar"></div>
                            </div>
                            <div class="text-muted"><i class="fa fa-caret-up text-muted"></i> 10% increases</div>
                        </div>
                    </div>
                </div>
                <div class=" col-sm-12 col-md-6 col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="card-body ">
                            <div class="d-flex">
                                <h6 class="mb-1">Total Downloads</h6>
                            </div>
                            <h3 class="text-dark count mt-0 number-font">4,876</h3>
                            <div class="progress progress-sm mt-0 mb-2 h-1">
                                <div class="progress-bar bg-secondary w-45" role="progressbar"></div>
                            </div>
                            <div class="text-muted"><i class="fa fa-caret-down text-muted"></i>12% decrease</div>
                        </div>
                    </div>
                </div>
                <div class=" col-sm-12 col-md-6 col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="card-body ">
                            <div class="d-flex">
                                <h6 class="mb-1">Total Reviwes</h6>
                            </div>
                            <h3 class="text-dark count mt-0 number-font">3,768</h3>
                            <div class="progress progress-sm mt-0 mb-1 h-1">
                                <div class="progress-bar bg-secondary1 w-50" role="progressbar"></div>
                            </div>
                            <div class="text-muted"><i class="fa fa-caret-down text-muted"></i> 5% decrease</div>
                        </div>
                    </div>
                </div>
                <div class=" col-sm-12 col-md-6  col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <h6 class="mb-1">Total Shares</h6>
                            </div>
                            <h3 class="text-dark count mt-0 font-30 number-font">2,643</h3>
                            <div class="progress progress-sm mt-0 mb-1 h-1">
                                <div class="progress-bar bg-warning w-25" role="progressbar"></div>
                            </div>
                            <div class="text-muted"><i class="fa fa-caret-up text-muted"></i> 15% increase</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 CLOSED -->

    <!-- ROW-2 OPEN -->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Devices Overeview</h3>
                </div>
                <div class="card-body">
                    <div class="chart-wrapper">
                        <canvas id="devices" class="h-300"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="mb-1">Total Installed</h5>
                    <h2 class="number-font mb-2 fs-40">1,456</h2>
                    <div class="text-muted"><i class="fa fa-caret-down text-muted"></i> 23% From Last Month</div>
                    <div class="row mb-3 mt-5">
                        <div class="col text-center border-left">
                            <i class="icon icon-user-female fs-20 text-danger"></i>
                            <p class="mb-0">Male</p>
                            <h4 class="font-weight-bold mt-1 mb-0 number-font1">167</h4>
                        </div>
                        <div class="col text-center">
                            <i class="icon icon-user fs-20 text-success"></i>
                            <p class="mb-0">Female</p>
                            <h4 class="font-weight-bold mt-1 mb-0 number-font1">102</h4>
                        </div>
                    </div>
                    <div>
                        <canvas id="total-Installed" class=""></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-2 CLOSED -->

    <!-- ROW-3 OPEN-->
    <div class="row row-deck">
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top Related Applications</h3>
                </div>
                <div class="card-body p-0">
                    <div class="list d-flex align-items-center border-bottom p-3">
                        <img alt="" class="d-block avatar-md bg-transparent" src="https://laravel.spruko.com/yoha/Horizontal-Dark-rtl/assets/images/svgs/categoreis/dash-256.svg">
                        <div class="wrapper w-100 mr-3">
                            <div class="mb-0 d-flex mt-2">
                                <div>
                                    <h5 class="mb-1 font-weight-semibold">Dash App</h5>
                                    <span class="mb-0 fs-13 text-muted"><i class="fa fa-apple text-muted ml-1"></i>Mac
                                                            <small class="mr-1 fs-11 badge badge-secondary">Free</small>
                                                        </span>
                                </div>
                                <div class="mr-auto">
                                                        <span class="fs-12 text-yellow">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                    <p class="mb-0 fs-13 text-muted">5 reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list d-flex align-items-center border-bottom p-3">
                        <img alt="" class="d-block avatar-md bg-transparent" src="https://laravel.spruko.com/yoha/Horizontal-Dark-rtl/assets/images/svgs/categoreis/google-duo.svg">
                        <div class="wrapper w-100 mr-3">
                            <div class="mb-0 d-flex mt-2">
                                <div>
                                    <h5 class="mb-1 font-weight-semibold">Google Due</h5>
                                    <span class="mb-0 fs-13 text-muted"><i class="mdi mdi-android text-muted ml-1"></i>Android
                                                            <small class="mr-1 fs-11 badge badge-secondary">Free</small>
                                                        </span>
                                </div>
                                <div class="mr-auto">
                                                        <span class="fs-12 text-yellow">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                    <p class="mb-0 fs-13 text-muted">7 reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list d-flex align-items-center border-bottom p-3">
                        <img alt="" class="d-block avatar-md bg-transparent" src="https://laravel.spruko.com/yoha/Horizontal-Dark-rtl/assets/images/svgs/categoreis/evernote.svg">
                        <div class="wrapper w-100 mr-3">
                            <div class="mb-0 d-flex mt-2">
                                <div>
                                    <h5 class="mb-1 font-weight-semibold">Evernote</h5>
                                    <span class="mb-0 fs-13 text-muted"><i class="fa fa-windows text-muted ml-1"></i>Windows
                                                            <small class="mr-1 fs-11 badge badge-primary">$12</small>
                                                        </span>
                                </div>
                                <div class="mr-auto">
                                                        <span class="fs-12 text-yellow">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                    <p class="mb-0 fs-13 text-muted">9 reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list d-flex align-items-center border-bottom p-3">
                        <img alt="" class="d-block avatar-md bg-transparent" src="https://laravel.spruko.com/yoha/Horizontal-Dark-rtl/assets/images/svgs/categoreis/Shazam.svg">
                        <div class="wrapper w-100 mr-3">
                            <div class="mb-0 d-flex mt-2">
                                <div>
                                    <h5 class="mb-1 font-weight-semibold">Shazam</h5>
                                    <span class="mb-0 fs-13 text-muted"><i class="fa fa-apple text-muted ml-1"></i>Mac
                                                            <small class="mr-1 fs-11 badge badge-secondary">Free</small>
                                                        </span>
                                </div>
                                <div class="mr-auto">
                                                        <span class="fs-12 text-yellow">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                    <p class="mb-0 fs-13 text-muted">4 reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list d-flex align-items-center p-3">
                        <img alt="" class="d-block avatar-md bg-transparent" src="https://laravel.spruko.com/yoha/Horizontal-Dark-rtl/assets/images/svgs/categoreis/picasa.svg">
                        <div class="wrapper w-100 mr-3">
                            <div class="mb-0 d-flex mt-2">
                                <div>
                                    <h5 class="mb-1 font-weight-semibold">Picasa</h5>
                                    <span class="mb-0 fs-13 text-muted"><i class="fa fa-windows text-muted ml-1"></i>Windows
                                                            <small class="mr-1 fs-11 badge badge-secondary">Free</small>
                                                        </span>
                                </div>
                                <div class="mr-auto">
                                                        <span class="fs-12 text-yellow">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                    <p class="mb-0 fs-13 text-muted">6 reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-header border-bottom-0">
                    <h3 class="card-title">Top Installed Countries</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive installcountries">
                        <table class="table mb-0">
                            <tbody>
                            <tr>
                                <td><span><i class="flag flag-um ml-2"></i>USA</span></td>
                                <td><span><i class="bx bxl-android mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">6k</span></span></td>
                                <td><span><i class="bx bxl-windows mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">5k</span></span></td>
                                <td><span><i class="bx bxl-apple mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">3k</span></span></td>
                            </tr>
                            <tr>
                                <td><span><i class="flag flag-ie ml-2"></i>Ireland</span></td>
                                <td><span><i class="bx bxl-android mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">4k</span></span></td>
                                <td><span><i class="bx bxl-windows mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">6k</span></span></td>
                                <td><span><i class="bx bxl-apple mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">2k</span></span></td>
                            </tr>
                            <tr>
                                <td><span><i class="flag flag-ca ml-2"></i>Canada</span></td>
                                <td><span><i class="bx bxl-android mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">7k</span></span></td>
                                <td><span><i class="bx bxl-windows mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">2k</span></span></td>
                                <td><span><i class="bx bxl-apple mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">8k</span></span></td>
                            </tr>
                            <tr>
                                <td><span><i class="flag flag-au ml-2"></i>Australia</span></td>
                                <td><span><i class="bx bxl-android mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">1k</span></span></td>
                                <td><span><i class="bx bxl-windows mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">3k</span></span></td>
                                <td><span><i class="bx bxl-apple mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">5k</span></span></td>
                            </tr>
                            <tr>
                                <td><span><i class="flag flag-ge ml-2"></i>Georgia</span></td>
                                <td><span><i class="bx bxl-android mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">8k</span></span></td>
                                <td><span><i class="bx bxl-windows mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">4k</span></span></td>
                                <td><span><i class="bx bxl-apple mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">3k</span></span></td>
                            </tr>
                            <tr>
                                <td><span><i class="flag flag-mq ml-2"></i>France</span></td>
                                <td><span><i class="bx bxl-android mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">2k</span></span></td>
                                <td><span><i class="bx bxl-windows mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">5k</span></span></td>
                                <td><span><i class="bx bxl-apple mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">8k</span></span></td>
                            </tr>
                            <tr>
                                <td><span><i class="flag flag-in ml-2"></i>India</span></td>
                                <td><span><i class="bx bxl-android mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">4k</span></span></td>
                                <td><span><i class="bx bxl-windows mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">1k</span></span></td>
                                <td><span><i class="bx bxl-apple mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">3k</span></span></td>
                            </tr>
                            <tr>
                                <td><span><i class="flag flag-it ml-2"></i>Italy</span></td>
                                <td><span><i class="bx bxl-android mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">6k</span></span></td>
                                <td><span><i class="bx bxl-windows mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">5k</span></span></td>
                                <td><span><i class="bx bxl-apple mr-1 text-muted fs-20"></i><span class="mb-0  fs-14">2k</span></span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User Feedback</h3>
                </div>
                <div class="card-body p-0 user-feedback">
                    <div class="pl-3 pr-3 py-3 border-bottom">
                        <div class="media mt-0">
                            <div class="d-flex ml-3">
                                <a href="#"><img alt="64x64" class="avatar-md rounded-circle mr-3" src="https://laravel.spruko.com/yoha/Horizontal-Dark-rtl/assets/images/users/2.jpg"></a>
                            </div>
                            <div class="media-body">
                                <div class="d-flex">
                                    <h6 class="mt-0 mb-0 font-weight-semibold">Samantha Wilson</h6>
                                    <span class="fs-12 mr-auto text-muted">
                                                            <i class="fe fe-calendar mr-1"></i> 28 Feb 2020
                                                        </span>
                                </div>
                                <div class="d-flex">
                                    <p class="tx-12 text-muted mb-0">long established fact..</p>
                                    <small class="mr-auto text-right fs-12 text-yellow">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-3 pr-3 py-3 border-bottom">
                        <div class="media mt-0">
                            <div class="d-flex mr-3">
                                <a href="#"><img alt="64x64" class="avatar-md rounded-circle ml-3" src="https://laravel.spruko.com/yoha/Horizontal-Dark-rtl/assets/images/users/3.jpg"></a>
                            </div>
                            <div class="media-body">
                                <div class="d-flex">
                                    <h6 class="mt-0 mb-0 font-weight-semibold">Kevin North</h6>
                                    <span class="fs-12 mr-auto text-muted">
                                                            <i class="fe fe-calendar mr-1"></i> 26 Feb 2020
                                                        </span>
                                </div>
                                <div class="d-flex">
                                    <p class="tx-12 text-muted mb-0">Itaque earum rerum tenetur.</p>
                                    <small class="mr-auto text-right fs-12 text-yellow">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-3 pr-3 py-3 border-bottom">
                        <div class="media mt-0">
                            <div class="d-flex mr-3">
                                <a href="#"><img alt="64x64" class="avatar-md rounded-circle ml-3" src="https://laravel.spruko.com/yoha/Horizontal-Dark-rtl/assets/images/users/12.jpg"></a>
                            </div>
                            <div class="media-body">
                                <div class="d-flex">
                                    <h6 class="mt-0 mb-0 font-weight-semibold">Steven Fisher</h6>
                                    <span class="fs-12 mr-auto text-muted">
                                                            <i class="fe fe-calendar mr-1"></i> 18 Feb 2020
                                                        </span>
                                </div>
                                <div class="d-flex">
                                    <p class="tx-12 text-muted mb-0">Itaque earum rerum tenetur.</p>
                                    <small class="mr-auto text-right fs-12 text-yellow">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-3 pr-3 py-3 border-bottom">
                        <div class="media mt-0">
                            <div class="d-flex mr-3">
                                <a href="#"><img alt="64x64" class="avatar-md rounded-circle ml-3" src="https://laravel.spruko.com/yoha/Horizontal-Dark-rtl/assets/images/users/5.jpg"></a>
                            </div>
                            <div class="media-body">
                                <div class="d-flex">
                                    <h6 class="mt-0 mb-0 font-weight-semibold">Cathie Madonna</h6>
                                    <span class="fs-12 mr-auto text-muted">
                                                            <i class="fe fe-calendar mr-1"></i> 12 Feb 2020
                                                        </span>
                                </div>
                                <div class="d-flex">
                                    <p class="tx-12 text-muted mb-0">Itaque earum rerum tenetur.</p>
                                    <small class="mr-auto text-right fs-12 text-yellow">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-3 pr-3 py-3">
                        <div class="media mt-0">
                            <div class="d-flex mr-3">
                                <a href="#"><img alt="64x64" class="avatar-md rounded-circle ml-3" src="https://laravel.spruko.com/yoha/Horizontal-Dark-rtl/assets/images/users/6.jpg"></a>
                            </div>
                            <div class="media-body">
                                <div class="d-flex">
                                    <h6 class="mt-0 mb-0 font-weight-semibold">Joanne Taylor</h6>
                                    <span class="fs-12 mr-auto text-muted">
                                                            <i class="fe fe-calendar mr-1"></i> 12 Feb 2020
                                                        </span>
                                </div>
                                <div class="d-flex">
                                    <p class="tx-12 text-muted mb-0">Itaque earum rerum tenetur.</p>
                                    <small class="mr-auto text-right fs-12 text-yellow">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-3 CLOSED -->

    <!-- ROW-4 OPEN -->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header ">
                    <h3 class="card-title">New Invoice List</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive service">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead>
                            <tr>
                                <th>Invoice ID</th>
                                <th>Category</th>
                                <th>Purchase Date</th>
                                <th>Price</th>
                                <th>Due Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>#INV-348</td>
                                <td>Android</td>
                                <td>07-02-2020</td>
                                <td class="font-weight-semibold fs-15">$89</td>
                                <td>17-12-2020</td>
                                <td>
                                    <a class="btn btn-primary btn-sm text-white mb-1" data-original-title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a> <a class="btn btn-danger btn-sm text-white mb-1" data-original-title="Delete" data-toggle="tooltip"><i class="fa fa-trash-o"></i></a><br>
                                </td>
                            </tr>
                            <tr>
                                <td>#INV-186</td>
                                <td>Windows</td>
                                <td>02-92-2020</td>
                                <td class="font-weight-semibold fs-15">$14,276</td>
                                <td>14-12-2020</td>
                                <td>
                                    <a class="btn btn-primary btn-sm text-white mb-1" data-original-title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a> <a class="btn btn-danger btn-sm text-white mb-1" data-original-title="Delete" data-toggle="tooltip"><i class="fa fa-trash-o"></i></a><br>
                                </td>
                            </tr>
                            <tr>
                                <td>#INV-831</td>
                                <td>Business Apps</td>
                                <td>30-01-2020</td>
                                <td class="font-weight-semibold fs-15">$25,000</td>
                                <td>04-12-2020</td>
                                <td>
                                    <a class="btn btn-primary btn-sm text-white mb-1" data-original-title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a> <a class="btn btn-danger btn-sm text-white mb-1" data-original-title="Delete" data-toggle="tooltip"><i class="fa fa-trash-o"></i></a><br>
                                </td>
                            </tr>
                            <tr>
                                <td>#INV-672</td>
                                <td>Mac</td>
                                <td>25-01-2020</td>
                                <td class="font-weight-semibold fs-15">$50.00</td>
                                <td>07-12-2020</td>
                                <td>
                                    <a class="btn btn-primary btn-sm text-white mb-1" data-original-title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a> <a class="btn btn-danger btn-sm text-white mb-1" data-original-title="Delete" data-toggle="tooltip"><i class="fa fa-trash-o"></i></a><br>
                                </td>
                            </tr>
                            <tr>
                                <td>#INV-428</td>
                                <td>Android</td>
                                <td>24-01-2020</td>
                                <td class="font-weight-semibold fs-15">$99.99</td>
                                <td>11-12-2020</td>
                                <td>
                                    <a class="btn btn-primary btn-sm text-white mb-1" data-original-title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a> <a class="btn btn-danger btn-sm text-white mb-1" data-original-title="Delete" data-toggle="tooltip"><i class="fa fa-trash-o"></i></a><br>
                                </td>
                            </tr>
                            <tr>
                                <td>#INV-543</td>
                                <td>Windows</td>
                                <td>22-01-2020</td>
                                <td class="font-weight-semibold fs-15">$145</td>
                                <td>12-12-2020</td>
                                <td>
                                    <a class="btn btn-primary btn-sm text-white mb-1" data-original-title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a> <a class="btn btn-danger btn-sm text-white mb-1" data-original-title="Delete" data-toggle="tooltip"><i class="fa fa-trash-o"></i></a><br>
                                </td>
                            </tr>
                            <tr>
                                <td>#INV-986</td>
                                <td>Mac</td>
                                <td>18-01-2020</td>
                                <td class="font-weight-semibold fs-15">$378</td>
                                <td>07-12-2020</td>
                                <td>
                                    <a class="btn btn-primary btn-sm text-white mb-1" data-original-title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a> <a class="btn btn-danger btn-sm text-white mb-1" data-original-title="Delete" data-toggle="tooltip"><i class="fa fa-trash-o"></i></a><br>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
    </div>
    <!-- ROW-4 CLOSED -->
@endsection
