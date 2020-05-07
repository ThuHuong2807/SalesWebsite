@extends('frontend.master.master')
@section('title','Hoàn Thành Đơn Hàng')
@section('content')
	<div class="colorlib-shop">
		<div class="container">
			<div class="row row-pb-lg">
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
						<div class="process text-center active">
							<p><span>03</span></p>
							<h3>Hoàn tất thanh toán</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1 text-center">
					<span class="icon"><i class="icon-shopping-cart"></i></span>
					<h2>Cảm ơn bạn đã mua hàng, Đơn hàng của bạn đã đặt thành công</h2>
					<p>
						<a href="" class="btn btn-primary">Trang chủ</a>
						<a href="product" class="btn btn-primary btn-outline">Tiếp tục mua sắm</a>
					</p>
				</div>
			</div>
			<div class="row mt-50">
				<div class="col-md-4">
					<h3 class="billing-title mt-20 pl-15">Thông tin đơn hàng</h3>
					<table class="order-rable">
						<tbody>
							<tr>
								<td>Đơn hàng số</td>
								<td>: {{ $customer->customer_id }}</td>
							</tr>
							<tr>
								<td>Ngày mua</td>
								<td>: {{ $customer->created_at}}</td>
							</tr>
							<tr>
								<td>Tổng tiền</td>
								<td>: {{ number_format($customer->customer_total,0,'',',') }} VNĐ</td>
							</tr>
							<tr>
								<td>Phương thức thanh toán</td>
								<td>: Chuyển Khoản</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-md-4">
					<h3 class="billing-title mt-20 pl-15">Địa chỉ thanh toán</h3>
					<table class="order-rable">
						<tbody>
							<tr>
								<td>Họ Tên</td>
								<td>: Trương Công Minh</td>
							</tr>
							<tr>
								<td>Số điện thoại</td>
								<td>: 0967962680</td>
							</tr>
							<tr>
								<td>Địa chỉ</td>
								<td>: Ngõ 68 - Triều Khúc - Thanh Xuân - Hà Nội </td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-md-4">
					<h3 class="billing-title mt-20 pl-15">Địa chỉ giao hàng</h3>
					<table class="order-rable">
						<tbody>
							<tr>
								<td>Họ Tên</td>
								<td>: {{ $customer->customer_name }}</td>
							</tr>
							<tr>
								<td>Số điện thoại</td>
								<td>: {{ $customer->customer_phone }}</td>
							</tr>
							<tr>
								<td>Địa chỉ</td>
								<td>: {{ $customer->customer_address }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="billing-form">
				<div class="row">
					<div class="col-12">
						<div class="order-wrapper mt-50">
							<h3 class="billing-title mb-10">Hóa đơn || Mã Đơn Hàng : #{{ $customer->customer_id }} </h3>
							<div class="order-list">
								<div class="list-row d-flex justify-content-between">
									<div>Sản phẩm</div>
									<div>Tổng cộng</div>
								</div>
								@foreach ($customer->order as $item)
								<div class="list-row d-flex justify-content-between">
									<div class="col-md-4" align="left">{{ $item->order_name }}(@foreach ($item->attr as $attrs){{ $attrs->attr_name }}:{{ $attrs->attr_value }} ;@endforeach)</div>
									<div class="col-md-4" align="right">x {{ $item->order_quantity }}</div>
									<div class="col-md-4" align="right"> {{ number_format($item->order_price* $item->order_quantity,0,'',',') }} VNĐ</div>
								</div>
								@endforeach

								<div class="list-row d-flex justify-content-between">
									<h6>Tổng tiền</h6>
									<div>{{ number_format($customer->customer_total,0,'',',') }} VNĐ</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection