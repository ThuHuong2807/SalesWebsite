@extends('frontend.master.master')
@section('title','Giỏ Hàng Của Bạn')
@section('cart')
class="active"
@endsection
@section('content')
<div class="colorlib-shop">
	<div class="container">
		<div class="row row-pb-md">
			<div class="col-md-10 col-md-offset-1">
				<div class="process-wrap">
					<div class="process text-center active">
						<p><span>01</span></p>
						<h3>Giỏ hàng</h3>
					</div>
					<div class="process text-center">
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
		<div class="row row-pb-md">
			<div class="col-md-10 col-md-offset-1">
				<div class="product-name">
					<div class="one-forth text-center">
						<span>Chi tiết sản phẩm</span>
					</div>
					<div class="one-eight text-center">
						<span>Giá</span>
					</div>
					<div class="one-eight text-center">
						<span>Số lượng</span>
					</div>
					<div class="one-eight text-center">
						<span>Tổng</span>
					</div>
					<div class="one-eight text-center">
						<span>Xóa</span>
					</div>
				</div>
				@foreach ($cart as $product)
				<div class="product-cart">
					<div class="one-forth">
						<div class="product-img"
							style="background-image: url(public/backend/img/product-img/{{$product->options->img }});">
						</div>
						<div class="display-tc">
							<h3 align="left">{{ $product->name }}</h3>
							@foreach ($product->options->attr as $key=>$value)
							<div class="col-md-6 col-sm- text-center"><strong
									align="left">{{ $key }}:{{ $value }}</strong></div>
							@endforeach
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<span class="price">{{ number_format($product->price,0,'',',') }} VNĐ</span>
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<input onchange=" update_qty('{{ $product->rowId }}',this.value) " type="number"
								id="quantity" name="quantity" class="form-control input-number text-center"
								value="{{ $product->qty }}" min="1" max="100">
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<span class="price">{{ number_format($product->price*$product->qty,0,'',',') }} VNĐ</span>
						</div>
					</div>


					<div class="one-eight text-center">
						<div class="display-tc">
							<a onclick="return del_cate('{{$product->name }}')"
								href="product/removecart/{{ $product->rowId }}" class="closed"></a>
						</div>
					</div>
				</div>
				@endforeach

			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="total-wrap">
					<div class="row">
						<div class="col-md-8">
						</div>
						<div class="col-md-3 col-md-push-1 text-center">
							<div class="total">
								<div class="sub">
									<p><span>Tổng:</span> <span>{{ $total }} VNĐ</span></p>
								</div>
								<div class="grand-total">
									<p><span><strong>Tổng cộng:</strong></span> <span>{{ $total }} VNĐ</span></p>
									<a href="product/checkout.html" class="btn btn-primary">Thanh toán <i
											class="icon-arrow-right-circle"></i></a>
								</div>
							</div>
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
				<h2><span>Có thể Bạn quan tâm</span></h2>
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

@endsection

@section('script_cart')
<script>
	function del_cate(name)
		{
			return confirm('Bạn muốn xoá sản phẩm : '+name+' ?');
		}
		function update_qty(rowId,qty)
		{
			$.get('product/update-cart/'+rowId+'/'+qty,
				function()
				{
				window.location.reload();
				}
			);
		}
</script>

@endsection