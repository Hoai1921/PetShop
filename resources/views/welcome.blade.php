<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- Mirrored from htmldemo.net/marten/marten/shop-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Oct 2022 10:50:09 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Marten - Pet Food eCommerce Bootstrap 5 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/img/favicon.png')}}">
		
		<!-- all css here -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/simple-line-icons.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/meanmenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/responsive.css')}}">
        <script src="{{asset('public/frontend/js/vendor/modernizr-3.11.7.min.js')}}"></script>
    </head>
    <body>
        <header class="header-area">
            <div class="header-top theme-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="welcome-area">
                            <p>Chào Mừng Bạn Đến Với Cửa Hàng Của Chúng Tôi !</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom transparent-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-5">
                            <div class="logo pt-39">
                                <a href="{{URL::to('/home')}}"><img alt="" src="{{asset('public/frontend/img/logo/logo.png')}}"></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 d-none d-lg-block relative">
                            <div class="main-menu text-center">
                                <nav>
                                    <ul>
                                        <li><a href="{{URL::to('/home')}}">Trang Chủ</a> </li>
                                        <li><a href="about-us.html">Danh Mục</a>
                                        <ul class="submenu">
                                            @foreach($category as $key => $cate)
                                                <li>
                                                    <a href="{{URL::to('danh-muc-san-pham/'.$cate->id)}}">{{$cate->name}}</a>
                                                </li>
                                            @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="#">Thương Hiệu</a>
                                        <ul class="submenu">
                                            @foreach($brand as $key => $brand)
                                                <li>
                                                    <a href="{{URL::to('thuong-hieu-san-pham/'.$brand->id)}}">{{$brand->name}}</a>
                                                </li>
                                            @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-8 col-sm-8 col-7 relative">
                            <div class="search-login-cart-wrapper">
                                <div class="header-search same-style">
                                    <button class="search-toggle">
                                        <i class="icon-magnifier s-open"></i>
                                        <i class="ti-close s-close"></i>
                                    </button>
                                    <div class="search-content">
                                        <form action="{{URL::to('/tim-kiem')}}" method="post">
                                            {{csrf_field()}}
                                            <input type="text" name="search" placeholder="Tìm Kiếm">
                                            <button>
                                                <i class="icon-magnifier"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-login same-style">
                                    <?php
                                        $user_id = Session::get('user_id');
                                        if($user_id!=NULL){
                                            
                                    ?>
                                    <a title="Đăng Xuất" href="{{URL::to('/logout-checkout')}}"><i class="icon-user icons"></i></a>
                                    <?php
                                        }else{
                                    ?>
                                    <a title="Đăng Nhập" href="{{URL::to('/login-checkout')}}" pla><i class="icon-user icons"></i></a>
                                    <?php } ?>
                                <div class="header-cart same-style">
                                    <button class="icon-cart">
                                        <i class="icon-handbag"></i>
                                    </button>
                                    <div class="shopping-cart-content">
                                        <ul>
                                            <li class="single-shopping-cart">
                                            <a href="{{URL::to('/show-cart')}}">Giỏ Hàng</a>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <?php
                                                    $user_id = Session::get('user_id');
                                                    if($user_id!=NULL){
                                                        
                                                ?>
                                                <a href="{{URL::to('/payment')}}">Lịch Sử Mua Hàng</a>
                                                <?php
                                                    }else{
                                                ?>
                                                <a href="{{URL::to('/login-checkout')}}">Lịch Sử Mua Hàng</a>
                                                <?php } ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url({{asset('public/frontend/img/banner/banner-2.jpg')}});">
            <div class="container">
                <div class="breadcrumb-content text-center">
                <h2>Pet Shop</h2>
                    <ul>
                        <li class="active">Shop Page</li>
                    </ul>
                    </ul>
                </div>
            </div>
        </div>
        <div class="shop-area pt-100 pb-100 gray-bg">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        @yield('content')
                    </div>
                    <div class="col-lg-3">
                        <div class="shop-sidebar">
                            <div class="shop-widget">
                                <h4 class="shop-sidebar-title">Tìm Kiếm</h4>
                                <div class="shop-search mt-25 mb-50">
                                    <form action="{{URL::to('/tim-kiem')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="text" name="search" placeholder="Tìm Kiếm">
                                        <button>
                                            <i class="icon-magnifier"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="shop-widget mt-50">
                                <h4 class="shop-sidebar-title">Danh Mục</h4>
                                 <div class="shop-list-style mt-20">
                                    <ul>
                                        @foreach($category as $key => $cate)
                                            <li>
                                                <a href="{{URL::to('danh-muc-san-pham/'.$cate->id)}}">{{$cate->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="shop-widget mt-50">
                                <h4 class="shop-sidebar-title">Thương Hiệu</h4>
                                 <div class="shop-list-style mt-20">
                                    <ul>
                                        @foreach($category as $key => $cate)
                                            <li>
                                                <a href="{{URL::to('danh-muc-san-pham/'.$cate->id)}}">{{$cate->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<footer class="footer-area">
            <div class="footer-top pt-80 pb-50 gray-bg-2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="footer-widget mb-30">
                                <div class="footer-info-wrapper">
                                    <div class="footer-logo">
                                        <a href="#">
                                            <img src="{{asset('public/frontend/img/logo/logo-2.png')}}" alt="">
                                        </a>
                                    </div>
                                    <p>Trường đại học Giao Thông Vận Tải</p>    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="footer-widget mb-30 pl-50">
                                <h4 class="footer-title">Hoàng Ngọc Hân</h4>
                                <div class="footer-content">
                                    <ul>
                                        <li><a href="#">Mã sinh viên: 191212027</a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="footer-widget mb-30 pl-70">
                                <h4 class="footer-title">Nguyễn Thị Hoài</h4>
                                <div class="footer-content">
                                    <ul>
                                        <li><a href="#">Mã sinh viên: 1912013151</a></li>
                                        <li><a href="#">SĐT: 0836762388</a></li>
                                        <li><a href="#">Gmail: nguyenthihoai1921@gmail.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom gray-bg-3 pt-17 pb-15">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright text-center">
                            <p>© Chào mừng đến với cửa hàng của chúng tôi <a href="#">Petshop</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</footer>
		<!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span class="ti-close" aria-hidden="true"></span>
            </button>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="qwick-view-left">
                            <div class="quick-view-learg-img">
                                <div class="quick-view-tab-content tab-content">
                                    <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                        <img src="{{asset('public/frontend/img/quick-view/l1.jpg')}}" alt="">
                                    </div>
                                    <div class="tab-pane fade" id="modal2" role="tabpanel">
                                        <img src="{{asset('public/frontend/img/quick-view/l2.jpg')}}" alt="">
                                    </div>
                                    <div class="tab-pane fade" id="modal3" role="tabpanel">
                                        <img src="{{asset('public/frontend/img/quick-view/l3.jpg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="quick-view-list nav" role="tablist">
                                <a class="active" href="#modal1" data-bs-toggle="tab">
                                    <img src="{{asset('public/frontend/img/quick-view/s1.jpg')}}" alt="">
                                </a>
                                <a href="#modal2" data-bs-toggle="tab" role="tab">
                                    <img src="{{asset('public/frontend/img/quick-view/s2.jpg')}}" alt="">
                                </a>
                                <a href="#modal3" data-bs-toggle="tab" role="tab">
                                    <img src="{{asset('public/frontend/img/quick-view/s3.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="qwick-view-right">
                            <div class="qwick-view-content">
                                <h3>Dog Calcium Food</h3>
                                <div class="product-price">
                                    <span class="new">$20.00 </span>
                                    <span class="old">$50.00</span>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star theme-color"></i>
                                    <i class="icon-star theme-color"></i>
                                    <i class="icon-star theme-color"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do amt tempor incididun ut labore et dolore magna aliqua. Ut enim ad mi , quis nostrud veniam exercitation .</p>
                                <div class="quick-view-select">
                                    <div class="select-option-part">
                                        <label>Size*</label>
                                        <select class="select">
                                            <option value="">- Please Select -</option>
                                            <option value="">XS</option>
                                            <option value="">S</option>
                                            <option value="">M</option>
                                            <option value=""> L</option>
                                            <option value="">XL</option>
                                            <option value="">XXL</option>
                                        </select>
                                    </div>
                                    <div class="select-option-part">
                                        <label>Color*</label>
                                        <select class="select">
                                            <option value="">- Please Select -</option>
                                            <option value="">orange</option>
                                            <option value="">pink</option>
                                            <option value="">yellow</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="quickview-plus-minus">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="2" name="qtybutton" class="cart-plus-minus-box">
                                    </div>
                                    <div class="quickview-btn-cart">
                                        <a class="btn-style" href="#">add to cart</a>
                                    </div>
                                    <div class="quickview-btn-wishlist">
                                        <a class="btn-hover" href="#"><i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		
		
		<!-- all js here -->
        <script src="{{asset('public/frontend/js/vendor/jquery-v1.12.4.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/popper.js')}}"></script>
        <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/waypoints.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/elevetezoom.js')}}"></script>
        <script src="{{asset('public/frontend/js/ajax-mail.js')}}"></script>
        <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/plugins.js')}}"></script>
        <script src="{{asset('public/frontend/js/main.js')}}"></script>
    </body>

<!-- Mirrored from htmldemo.net/marten/marten/shop-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Oct 2022 10:50:09 GMT -->
</html>
