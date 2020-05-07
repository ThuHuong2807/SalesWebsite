@extends('backend.master.master')
@section('title','Thêm Biến Thể'    )
@section('variant')
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
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Biến thể</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Biến thể</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="col-md-12">
            <div class="panel panel-default">
                <form method="post">
                    @csrf
                    <div class="panel-heading" align='center'>
                        Giá cho từng biến thể sản phẩm : {{ $product->product_name }} ({{ $product->product_code }})
                    </div>
                    <div class="panel-body" align='center'>
                        <table class="panel-body">
                            <thead>
                                <tr>
                                    <th width='33%'>Biến thể</th>
                                    <th width='33%'>Giá (có thể trống)</th>
                                    <th width='33%'>Tuỳ chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product->variant as $variant)
                                    <tr>
                                        <td scope="row">
                                            @foreach ($variant->values as $value)
                                                {{ $value->attribute->attribute_name }} : {{ $value->values_value }} |
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input name="variant[{{ $variant->variant_id }}]" class="form-control" placeholder="Giá cho biến thể" value="{{ $variant->variant_price }}">
                                            </div>
                                        </td>
                                        <td>
                                            <a id="" onclick='return del_cate()'  class="btn btn-warning" href="admin/variant/delete-variant/{{ $variant->variant_id }}" role="button">Xoá</a>
                                        </td>
                                    </tr>             
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div align='right'><button class="btn btn-success" type="submit"> Cập nhật </button> <a class="btn btn-warning"
                            href="admin/product" role="button">Bỏ qua</a></div>
                </form>
            </div>
        </div>





    </div>
    <script>
	function del_cate()
	{
		return confirm('Bạn muốn xoá không?');
	}
</script>
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
        });

        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function () {
            $('#avatar').click(function () {
                $('#img').click();
            });
        });


        var lineChartData = {
            labels: [


            ],
            datasets: [

                {
                    label: "My Second dataset",
                    fillColor: "rgba(48, 164, 255, 0.2)",
                    strokeColor: "rgba(48, 164, 255, 1)",
                    pointColor: "rgba(48, 164, 255, 1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(48, 164, 255, 1)",
                    data: []
                }
            ]

        }

        window.onload = function () {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive: true
            });
            var chart2 = document.getElementById("bar-chart").getContext("2d");
            window.myBar = new Chart(chart2).Bar(barChartData, {
                responsive: true
            });
            var chart3 = document.getElementById("doughnut-chart").getContext("2d");
            window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {
                responsive: true
            });
            var chart4 = document.getElementById("pie-chart").getContext("2d");
            window.myPie = new Chart(chart4).Pie(pieData, {
                responsive: true
            });

        };
    </script>
@endsection

