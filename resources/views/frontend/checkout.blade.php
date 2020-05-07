@extends('frontend.master.master')
@section('title','Điền Thông Tin Thanh Toán')
@section('content')
<form method="post" class="colorlib-form">
	@csrf
	<div class="colorlib-shop">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-10 col-md-offset-1">
					<div class="process-wrap">
						<div class="process text-center active">
							<p><span>01</span></p>
							<h3>Giỏ hàng</h3>
						</div>
						<div class="process text-center active">
							<p><span>02</span></p>
							<h3>Thanh toán</h3>
						</div>
						<div class="process text-center">
							<p><span>03</span></p>
							<h3>Hoàn tất thanh toán</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
					<div class="col-md-7" id="user-info">
						<h2>Chi tiết thanh toán</h2>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Họ & Tên</label>
									<input required type="text" id="name" name="name" class="form-control" placeholder="Tên Của Bạn">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="address">Địa chỉ</label>
									<input required type="text" id="address" name="address"  class="form-control" placeholder="Nhập địa chỉ của bạn">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6">
									<label for="email">Địa chỉ email</label>
									<input  type="email" name="email" id="email" class="form-control"
										placeholder="Ex: youremail@domain.com">
								</div>
								<div class="col-md-6">
									<label for="Phone">Số điện thoại</label>
									<input required type="text" id="Phone" name="phone" class="form-control" placeholder="Ex: 0123456789">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="cart-detail">
							<h2>Tổng Giỏ hàng</h2>
							<ul>
								<li>

									<ul name="product_order">
										@foreach ($cart as $product)
											<li><span >{{ $product->qty }} x {{ $product->name }}( @foreach ($product->options->attr as $key=>$value) {{ $key}}:{{ $value  }} @endforeach )</span> <span>{{ number_format($product->price*$product->qty,0,'',',') }} VNĐ</span></li>
										@endforeach
									</ul>
								</li>

								<li><span>Tổng tiền đơn hàng</span> <span>{{ $total }} VNĐ</span></li>
							</ul>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p><button type="submit" class="btn btn-primary">Thanh toán</button></p>
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
					<h2><span>Có thể Bạn quan tâm  </span></h2>

				</div>
			</div>
			<div class="row">
			@foreach ($products as $product)
				<div class="col-md-3 text-center">
					<div class="product-entry">
						<div class="product-img" style="background-image: url(public/backend/img/product-img/{{ $product->product_img }});">
							{{--  <p class="tag"><span class="new">New</span></p>  --}}
							<div class="cart">
								<p>
									<span class="addtocart"><a href="product/product-detail/{{ $product->product_id }}/{{ $product->product_slug }}.html"><i class="icon-shopping-cart"></i></a></span>
									<span><a href="product/product-detail/{{ $product->product_id }}/{{ $product->product_slug }}.html"><i class="icon-eye"></i></a></span>


								</p>
							</div>
						</div>
						<div class="desc">
							<h3><a href="shop.html">{{ $product->product_name}}</a></h3>
							<p class="price"><span> {{ number_format($product->product_price,0,'',',') }}</span></p>
						</div>
					</div>
				</div>				
			@endforeach
			</div>
		</div>
	</div>
</form>
@endsection