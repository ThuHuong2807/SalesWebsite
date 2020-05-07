@extends('backend.master.master')
@section('title','Sửa Danh Mục')
@section('category')
    class="active"
@endsection
@section('content')
	@if (session('editcategory'))
		<script>
			alert("{{ session('editcategory') }}");
		</script>
	@endif
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh mục</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý danh mục</h1>
			</div>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-5">
								<form method="POST">
									@csrf
									<div class="form-group">
										<label for="">Danh mục cha:</label>
										<select class="form-control" name="category_parent" id="">
											<option value="0">----ROOT----</option>
											{{ GetCategory($category,0,'',$cate->category_parent) }}
										</select>
									</div>
									<div class="form-group">
										<label for="">Tên Danh mục</label>
										<input type="text" required class="form-control" name="category_name" id=""
											placeholder="Tên danh mục mới" value="{{ $cate->category_name}}" >
									</div>
									@if ($errors->has('category_name'))
									<div class="alert bg-danger" role="alert">
										<svg class="glyph stroked cancel">
											<use xlink:href="#stroked-cancel"></use>
										</svg>{{$errors->first('category_name')}}<a href="#" class="pull-right"><span
												class="glyphicon glyphicon-remove"></span></a>
									</div>
									@endif
									<button type="submit" class="btn btn-primary">Sửa danh mục</button>
								</form>
							</div>
							<div class="col-md-7">
								<h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
								<div class="vertical-menu">
									<div class="item-menu active">Danh mục </div>
									{{ ShowCategory($category,0,'') }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/.col-->


		</div>
		<!--/.row-->
	</div>
	<!--/.main-->
@endsection
@section('script') 
    @parent
	<script>
		$('#calendar').datepicker({});

		! function ($) {
			$(document).on("click", "ul.nav li.parent > a > span.icon", function () {
				$(this).find('em:first').toggleClass("glyphicon-minus");
			});
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
			if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
			if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
@endsection
<script>
	function del_cate()
	{
		return confirm('Bạn muốn xoá danh mục?');
	}
</script>
</body>

</html>