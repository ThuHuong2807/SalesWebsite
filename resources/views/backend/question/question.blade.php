@extends('backend.master.master')
@section('title','Quản Lý Hỏi Đáp')
@section('user_question')
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
				<li><a href="admin"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Câu Hỏi</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách câu hỏi</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Tên khách hàng</th>
											<th>Email</th>
											<th>Mô tả</th>
											<th>Nội Dung</th>
											<th>Thời gian gửi</th>	
											<th>Quản Lí</th>

										</tr>
									</thead>
									<tbody>
										@foreach ($questions as $question)
										<tr>
											<td>{{ $question->user_question_id }}</td>
											<td>{{ $question->user_question_name }}</td>
											<td>{{ $question->user_question_name }}</td>
											<td>{{ $question->user_question_describe }}</td>
											<td>{{ $question->user_question_content }}</td>
											<td>{{ $question->created_at }}</td>
											<td>
												<a onclick='return del_cate()' href="admin/user-question/delete-user-question/{{ $question->user_question_id }}"class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>Xóa</a>
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

