@extends('backend.master.master')
@section('title','Danh Sách Đơn Hàng')
@section('user_registered')
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
			<li class="active">Đăng ký nhận mail</li>
		</ol>
	</div>
	<!--/.row-->
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">

			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách ký nhận mail</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<table class="table table-bordered" style="margin-top:20px;">
								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th>email</th>
										<th>Thời gian đăng ký</th>
										<th>Quản Lý</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($registered as $item)
									<tr>
										<td>{{ $item->users_registered_id }}</td>
										<td>{{ $item->users_registered_email }}</td>
										<td>{{ Carbon\Carbon::parse($item->created_at)->format('H:i:s ; d/m/Y') }}</td>
										<td>
											<a onclick='return del_cate()' href="admin/user-registered/delete-registered/{{ $item->users_registered_id }}"class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>Xóa</a>
										</td>
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
<script>
	function del_cate()
	{
		return confirm('Bạn muốn xoá không?');
	}
</script>
<!--end main-->
@endsection
@section('script')
@parent
@endsection