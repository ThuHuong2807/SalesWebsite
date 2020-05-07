@extends('backend.master.master')
@section('title','Quản Lý Thẻ Meta')
@section('product')
    class="active"
@endsection
@section('content')
	@if (session('thongbao'))
	<script>
		alert("{{ session('thongbao') }}");
	</script>
	@endif
	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Quản Lý Thẻ Meta</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Thẻ Meta Cho Sản Phẩm {{ $product->product_name }}</div>
					<div class="panel-body">	
						<form action="admin/meta/add-meta" method="post">
							@csrf
							<input type="hidden" name="product_id" value="{{ $product->product_id }}">
							<input name="product_meta_name" type="text"class="form-control ">
							<button type="submit" class="btn btn-success">Thêm Thẻ Meta</button>
						</form>
						
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Nội Dung  Thẻ Meta Trên Website Của Sản Phẩm {{ $product->product_name }}</th>
											<th>Tên Sản Phẩm Liên Kết</th>
											<th>Quản lý</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($product->meta as $item)
											<tr>
												<td>{{ $item->product_meta_id }}</td>
												<form action="admin/meta/edit-meta" method="post">
													@csrf
													<td>
														<input type="hidden" name="product_meta_id" value="{{ $item->product_meta_id }}">
														<input type="hidden" name="product_id" value="{{ $product->product_id  }}">
														<input type="text"class="form-control "name="product_meta_name" value="{{ $item->product_meta_name }}">
													</td>
													<td>{{ $product->product_name }} || ID={{ $product->product_id }}</td>
													<td>
														<button class="btn btn-warning" type="submit"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</button >
														<a onclick='return del_cate()' href="admin/meta/delete-meta/{{ $item->product_meta_id }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
													</td>
												</form>

											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->


	</div>
	<!--end main-->
<script>
	function del_cate()
		{
			return confirm('Bạn muốn xoá không?');
		}

</script>
@endsection

@section('script') 
    @parent
@endsection

