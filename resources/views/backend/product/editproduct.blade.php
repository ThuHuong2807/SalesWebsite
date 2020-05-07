@extends('backend.master.master')
@section('title','Sửa Sản Phẩm')
@section('product')
class="active"
@endsection
@section('content')
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Sửa sản phẩm {{ $product->product_name }} ({{ $product->product_code }})
                    </div>
                    <div class="panel-body">
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-8">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Danh mục</label>
                                                <select name="product_category" class="form-control">
                                                    {{ GetCategory($category,0,'',$product->product_id) }}
                                                </select>
                                            </div>
                                            @if ($errors->has('product_code'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('product_code') }}</strong>
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <label>Mã sản phẩm</label>
                                                <input required type="text" name="product_code" class="form-control"
                                                    value="{{ $product->product_code }}">
                                            </div>
                                            @if ($errors->has('product_name'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('product_name') }}</strong>
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <label>Tên sản phẩm</label>
                                                <input required type="text" name="product_name" class="form-control"
                                                    value="{{ $product->product_name }}">
                                            </div>
                                            @if ($errors->has('product_price'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('product_price') }}</strong>
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <label>Giá sản phẩm (Giá chung)</label> <a
                                                    href="admin/variant/{{ $product->product_id }}"><span
                                                        class="glyphicon glyphicon-chevron-right"></span>
                                                    Giá theo biến thể</a>
                                                <input required type="number" name="product_price" class="form-control"
                                                    value="{{ $product->product_price }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Trạng thái</label>
                                                <select required name="product_state" class="form-control">
                                                    <option @if($product->product_state==1) selected @endif value="1">Còn
                                                        hàng</option>
                                                    <option @if($product->product_state==0) selected @endif value="0">Hết
                                                        hàng</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Sản Phẩm Nổi Bật</label>
                                                <select required name="product_featured" class="form-control">
                                                    <option @if($product->product_featured==1) selected @endif value="1">Nổi
                                                        Bật</option>
                                                    <option @if($product->product_featured==0) selected @endif
                                                        value="0">Không Nổi Bật</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            @if ($errors->has('product_img'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('product_img') }}</strong>
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <label>Ảnh sản phẩm</label>
                                                <input id="img" type="file" name="product_img" class="form-control hidden"
                                                    onchange="changeImg(this)">
                                                <img id="avatar" class="thumbnail" width="100%" height="350px"
                                                    src="public/backend/img/product-img/{{ $product->product_img }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Thông tin</label>
                                        <textarea required name="product_info"
                                            style="width: 100%;height: 100px;">{{ $product->product_info }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body tabs">
                                            <ul class="nav nav-tabs">
                                                @php
                                                $i=1;
                                                @endphp
                                                @foreach ($attrs as $attr)
                                                <li @if($i==1) class='active' @endif><a href="#tab{{ $attr->attribute_id }}"
                                                        data-toggle="tab">{{ $attr->attribute_name }}</a></li>
                                                @php
                                                $i=2;
                                                @endphp
                                                @endforeach
                                            </ul>
                                            <div class="tab-content">
                                                @foreach ($attrs as $attr)
                                                <div class="tab-pane fade @if($i==2) active @endif  in"
                                                    id="tab{{ $attr->attribute_id }}">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                @foreach ($attr->values as $value)
                                                                <th>{{ $value->values_value }}</th>
                                                                @endforeach
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($errors->has('value'))
                                                            <div class="alert alert-danger" role="alert">
                                                                <strong>{{ $errors->first('value') }}</strong>
                                                            </div>
                                                            @endif
                                                            <tr required>
                                                                @foreach ($attr->values as $value)
                                                                <td> <input class="form-check-input"
                                                                        @if(check_value($product,$value->values_id)) checked
                                                                    @endif type="checkbox"
                                                                    name="value[{{ $attr->attribute_name }}][]"
                                                                    value="{{ $value->values_id }}"> </td>
                                                                @endforeach
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <hr>
                                                </div>
                                                @php
                                                $i=3;
                                                @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <p></p>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Miêu tả</label>
                                                <textarea id="product_describe" required name="product_describe"
                                                    style="width: 100%;height: 100px;">{{ $product->product_describe }}</textarea>
                                                <script>
                                                    var editor = CKEDITOR.replace('product_describe');
                                                </script>
                                            </div>
                                            <button class="btn btn-success" name="add-product" type="submit">Sửa sản
                                                phẩm</button>
                                            <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
 @section('script')
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