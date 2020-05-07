@extends('backend.master.master')
@section('title','Quản Lý Thuộc Tính')
@section('attr')
    class="active"
@endsection
@section('content')
    @if (session('thongbao'))
        <script>
            alert("{{ session('thongbao') }}");
        </script>
    @endif
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href=""></use>
                    </svg></a></li>
            <li class="active">Danh mục</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý thuộc tính</h1>

        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @foreach ($attrs as $attr)
                        <div class="row magrin-attr">
                            <div class="col-md-2 panel-blue widget-left text-center">
                                <strong class="large">{{ $attr->attribute_name }}</strong>
                                <a class="delete-attr" onclick='return del_cate()' href="admin/attr/delete-attr/{{ $attr->attribute_id }}"><i class="fas fa-times"></i></a>
                                <a class="edit-attr" href="admin/attr/edit-attr/{{ $attr->attribute_id }}"><i class="fas fa-edit"></i></a>
                            </div>
                            <div class="col-md-10 widget-right boxattr">
                                @foreach ($attr->values as $item)
                                    <div class="text-attr">{{ $item->values_value }}
                                        <a href="admin/edit-attr/{{ $item->values_id }}" class="edit-value"><i class="fas fa-edit"></i></a>
                                        <a onclick='return del_cate()' href="admin/attr/delete-value/{{ $item->values_id }}" class="del-value"><i class="fas fa-times"></i></a>
                                    </div>


                                @endforeach
                                <div class="text-attr"><a href="admin/product/add-product" ><i class="fas fa-plus-circle"></i></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <!--/.row-->
</div>
<!--/.main-->  
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