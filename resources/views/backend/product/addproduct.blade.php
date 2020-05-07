@extends('backend.master.master')
@section('title','Thêm Sản Phẩm')
@section('product')
class="active"
@endsection
@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <form  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="panel panel-primary">
                        <form action="" method="POST"></form>
                        <div class="panel-heading">Thêm sản phẩm</div>
                        <div class="panel-body">
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-8">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Danh mục</label>
                                                <select name="product_category" class="form-control">
                                                    {{ GetCategory($category,0,'',0) }}
                                                </select>
                                            </div>
                                            @if ($errors->has('product_code'))
                                                    <div class="alert alert-danger" role="alert">
                                                    <strong>{{ $errors->first('product_code') }}</strong>
                                                    </div>
                                            @endif
                                            <div class="form-group">
                                                <label>Mã sản phẩm</label>
                                                <input required type="text" name="product_code" class="form-control" value="{{ old('product_code') }}">
                                            </div>
                                            @if ($errors->has('product_name'))
                                                    <div class="alert alert-danger" role="alert">
                                                    <strong>{{ $errors->first('product_name') }}</strong>
                                                    </div>
                                            @endif
                                            <div class="form-group">
                                                <label>Tên sản phẩm</label>
                                                <input required type="text" name="product_name" value="{{ old('product_name') }}" class="form-control">
                                            </div>
                                            @if ($errors->has('product_price'))
                                                    <div class="alert alert-danger" role="alert">
                                                    <strong>{{ $errors->first('product_price') }}</strong>
                                                    </div>
                                            @endif
                                            <div class="form-group">
                                                <label>Giá sản phẩm (Giá chung)</label>
                                                <input required type="number" name="product_price" value="{{ old('product_price') }}" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Trạng thái</label>
                                                <select required name="product_featured" class="form-control">
                                                    <option class="active" value="1">Còn hàng</option>
                                                    <option value="0">Hết hàng</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Sản Phẩm Nổi Bật</label>
                                                <select required name="product_state" class="form-control">
                                                    <option class="active" value="1">Nổi Bật</option>
                                                    <option value="0">Không Nổi Bật</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Ảnh sản phẩm</label>
                                                <input id="img" type="file" name="product_img" class="form-control hidden"
                                                    onchange="changeImg(this)">
                                                <img id="avatar" class="thumbnail" width="100%" height="350px"
                                                    src="public/backend/img/import-img.png">
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('product_info'))
                                            <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('product_info') }}</strong>
                                            </div>
                                    @endif
                                    <div class="form-group">
                                        <label>Thông tin</label>
                                        <textarea required id="product_info" name="product_info" style="width: 100%;height: 100px;">{{ old('product_info') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-4">

                                    <div class="panel panel-default">
                                        <div class="panel-body tabs">
                                                @if ($errors->has('attribute_name'))
                                                    <div class="alert alert-danger" role="alert">
                                                    <strong>{{ $errors->first('attribute_name') }}</strong>
                                                    </div>
                                                @endif
                                            <label>Các thuộc Tính <a href="admin/attr"><span class="glyphicon glyphicon-cog"></span>Tuỳ chọn</a></label>
                                                @if (session('thongbao'))
                                                    <script>
                                                        alert("{{ session('thongbao') }}");
                                                    </script>
                                                @endif
                                            <ul class="nav nav-tabs">
                                                @php
                                                $i=1;
                                                @endphp
                                                @foreach ($attrs as $attr)
                                                <li @if($i==1) class='active' @endif><a href="#tab{{ $attr->attribute_id }}"data-toggle="tab">{{ $attr->attribute_name }}</a></li>
                                                @php
                                                $i=2;
                                                @endphp
                                                @endforeach

                                                <li><a href="#tab-add" data-toggle="tab">+</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                @foreach ($attrs as $attr)
                                                    <div class="tab-pane fade @if($i==2) active @endif  in" id="tab{{ $attr->attribute_id }}">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    @foreach ($attr->values as $value)
                                                                        <th>{{ $value->values_value }}</th>
                                                                    @endforeach
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if ($errors->has('attr'))
                                                                    <div class="alert alert-danger" role="alert">
                                                                    <strong>{{ $errors->first('attr') }}</strong>
                                                                    </div>
                                                                @endif
                                                                <tr required>
                                                                    @foreach ($attr->values as $value)
                                                                        <td> <input class="form-check-input"  type="checkbox" name="attr[{{ $attr->attribute_id }}][]" value="{{ $value->values_id }}"> </td>
                                                                    @endforeach
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <hr>
                                                        @if ($errors->has('values_value'))
                                                            <div class="alert alert-danger" role="alert">
                                                            <strong>{{ $errors->first('values_value') }}</strong>
                                                            </div>
                                                        @endif
                                                        {{--  input của add value  --}}
                                                        <div class="form-group">
                                                            <form action="admin/attr/add-value" method="POST">
                                                                @csrf
                                                                <label for="">Thêm Giá Trị cho thuộc tính</label>
                                                                <input type="hidden" name="attr_id" value="{{ $attr->attribute_id }}">
                                                                <input name="values_value" value="{{ old('values_value') }}" type="text" class="form-control" aria-describedby="helpId" placeholder="">
                                                                <div> <button class="btn btn-success" type="submit">Thêm</button></div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    @php
                                                    $i=3;
                                                    @endphp
                                                @endforeach
                                                {{--  in của add attr  --}}
                                                <div class="tab-pane fade" id="tab-add">
                                                    <form action="admin/attr" method="POST">
                                                        @csrf
                                                            <div class="form-group">
                                                                <label for="">Tên thuộc tính mới</label>
                                                                <input type="text" value="{{ old('attribute_name') }}"  required class="form-control" name="attribute_name" aria-describedby="helpId" placeholder="">
                                                            </div>
                                                        <button type="submit"  class="btn btn-success"> <span class="glyphicon glyphicon-plus"></span>Thêm thuộc tính</button>
                                                    </form>
                                                </div>
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
                            </div>
                            <div class="row">
                                @if ($errors->has('product_describe'))
                                    <div class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('product_describe') }}</strong>
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea id="product_describe" required name="product_describe"
                                            style="width: 100%;height: 100px;" >{{ old('product_describe') }}</textarea>
                                        <script>
                                                var editor = CKEDITOR.replace('product_describe');
                                        </script>
                                    </div>

                                    <button class="btn btn-success" type="submit">Thêm sản phẩm</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <!--/.row-->
    </div>
    <!--end main-->
@endsection
@section('script')
    <script>
        $('#calendar').datepicker({});
            ! function($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
                    $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);

            $(window).on('resize', function() {
                if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function() {
                if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
            });

            function changeImg(input) {
                //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    //Sự kiện file đã được load vào website
                    reader.onload = function(e) {
                        //Thay đổi đường dẫn ảnh
                        $('#avatar').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(document).ready(function() {
                $('#avatar').click(function() {
                    $('#img').click();
                });
            });
            var lineChartData = {
                labels: [],
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

            window.onload = function() {
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