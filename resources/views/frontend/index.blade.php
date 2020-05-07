@extends('frontend.master.master')
@section('title','Shop Quần Áo DEV-TM')
@section('index')
    class="active"
@endsection
@section('content')
<div class="colorlib-shop">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
				<h2><span>Shop Thời Trang </span></h2>
			</div>
		</div>
	</div>
</div>
    <div id="colorlib-featured-product">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="product" class="f-product-1" style="background-image: url(public/frontend/images/item-1.jpg);">
                        <div class="desc">
                            <h2>Thời<br> Thượng</h2>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="product" class="f-product-2" style="background-image: url(public/frontend/images/item-2.jpg);">
                                <div class="desc">
                                    <h2>Update <br>Mẫu Mới <br>Liên Tục</h2>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="product" class="f-product-2" style="background-image: url(public/frontend/images/item-4.jpg);">
                                <div class="desc">
                                    <h2>Sale <br>20% <br>off</h2>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-12">
                            <a href="product" class="f-product-2" style="background-image: url(public/frontend/images/item-3.jpg);">
                                <div class="desc">
                                    <h2>Shoes <br>for <br>men</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="colorlib-intro" class="colorlib-intro" style="background-image: url(public/frontend/images/cover-img-1.jpg);"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="intro-desc">
                        <div class="text-salebox">
                            <div class="text-lefts">
                                <div class="sale-box">
                                    <div class="sale-box-top">
                                        <h2 class="number">45</h2>
                                        <span class="sup-1">%</span>
                                        <span class="sup-2">Off</span>
                                    </div>
                                    <h2 class="text-sale">Sale</h2>
                                </div>
                            </div>
                            <div class="text-rights">
                                <h3 class="title">Số Lượng Có Hạn!</h3>
                                <p> Mua sắm thả ga với khuyễn mại cực khủng </p>
                                <p><a href="product" class="btn btn-primary">Mua Sắm </a>
                                <a href="#" class="btn btn-primary btn-outline">Read more</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="colorlib-shop">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                    <h2><span>Sản phẩm mua nhiều nhất</span></h2>
                    <p> Được Sắp Xếp và Đánh Giá Trên Tiêu Chí Của Khách Hàng
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 text-center">
                        <div class="product-entry">
                            <div class="product-img" style="background-image: url(public/backend/img/product-img/{{ $product->product_img }});">
                                <p class="tag"><span class="new">New</span></p>
                                <div class="cart">
                                    <p>
                                        <span class="addtocart"><a href="product/product-detail/{{ $product->product_id }}/{{ $product->product_slug }}.html"><i
                                                    class="icon-shopping-cart"></i></a></span>
                                        <span><a href="product/product-detail/{{ $product->product_id }}/{{ $product->product_slug }}.html"><i class="icon-eye"></i></a></span>
                                    </p>
                                </div>
                            </div>
                            <div class="desc">
                                <h3><a href="product/product-detail/{{ $product->product_id }}/{{ $product->product_slug }}.html">{{ $product->product_name }}</a></h3>
                                <p class="price"><span>{{ number_format( $product->product_price,0,'',',') }} VNĐ</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row text-center" id="more-product" >
                <a href="product" class="btn btn-primary">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Xem Thêm Sản Phẩm Khác
                </a>
            </div>
        </div>
    </div>
@endsection