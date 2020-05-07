<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-3">
                    <div id="colorlib-logo"><h1><a href=" ">Yuki Shop</a></h1></div>
                </div>
                <div class="col-xs-9 text-right menu-1">
                    <ul>
                        <li @yield('index') ><a href="">Trang chủ</a></li>
                        <li  class="has-dropdown">
                            <a  href="product">Sản Phẩm</a>
                            {{--  <ul class="dropdown">
                                <li><a href="product/cart.html">Giỏ hàng</a></li>
                                <li><a href="product/checkout.html">Thanh toán</a></li>
                            </ul>  --}}
                        </li>
                        <li @yield('about')><a href="about.html">Giới thiệu</a></li>
                        <li @yield('contact')><a href="contact.html">Liên hệ</a></li>
                        <li @yield('cart')><a href="product/cart.html"><i class="icon-shopping-cart"></i> Giỏ hàng [{{ Cart::Content()->count() }}]</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url(public/frontend/images/img_bg_1.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h2 class="head-1">Mens</h2>
                                    <h2 class="head-2">Jeans</h2>
                                    <h2 class="head-3">Thời Trang</h2>
                                    <p class="category"><span>Áo sơ mi, quần & phụ kiện thời trang mới</span></p>
                                    <p><a href="product" class="btn btn-primary">Mua Sắm </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(public/frontend/images/img_bg_2.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h2 class="head-1">Huge</h2>
                                    <h2 class="head-2">Sale</h2>
                                    <h2 class="head-3">45% off</h2>
                                    <p class="category"><span>Áo sơ mi, quần & phụ kiện thời trang mới</span></p>
                                    <p><a href="product" class="btn btn-primary">Mua Sắm </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(public/frontend/images/img_bg_3.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h2 class="head-1">New</h2>
                                    <h2 class="head-2">Chào Hè</h2>
                                    <h2 class="head-3">Giảm Giá Đến 30% </h2>
                                    <p class="category"><span>Áo sơ mi, quần & phụ kiện thời trang mới</span></p>
                                    <p><a href="product" class="btn btn-primary">Mua Sắm </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>