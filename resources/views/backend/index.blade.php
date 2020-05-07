@extends('backend.master.master')
@section('title','Trang Chủ Quản Trị')
@section('index')
    class="active"
@endsection
@section('content')
	@if (session('user_level'))
        <script>
            alert("{{ session('user_level') }}");
        </script>
	@endif
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                                <use xlink:href="#stroked-home"></use>
                            </svg></a></li>
                <li class="active">Tổng quan</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tổng quan</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-md-4 col-xs-6 col-6">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-4 col-lg-4 widget-left">
                            <span class="glyphicon glyphicon-signal icon-50" aria-hidden="true"></span>
                        </div>
                        <div class="col-sm-8 col-lg-8 widget-right">
                            <div class="large">{{ number_format($doanhthu,0,'',',') }} VNĐ</div>
                            <div class="text-muted"><h4>Doanh thu tháng {{ count($data) }}</h4></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6 col-6">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-4 col-lg-4 widget-left">
                            <span class="glyphicon glyphicon-ok icon-50" aria-hidden="true"></span>
                        </div>
                        <div class="col-sm-8 col-lg-8 widget-right">
                            <div class="large">{{ $OrderProcessedOfTotal }} </div>
                            <div class="text-muted"><h4>Tổng Số Đơn Hàng Đã Xử Lí</h4> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6 col-6">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-4 col-lg-4 widget-left">
                            <span class="glyphicon glyphicon-ok icon-50" aria-hidden="true"></span>
                        </div>
                        <div class="col-sm-8 col-lg-8 widget-right">
                            <div class="large">{{ $OrderProcessedOfYear }}</div>
                            <div class="text-muted"><h4>Tổng Số Đơn Hàng Đã Xử Lí Trong Năm</h4></div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-4 col-xs-6 col-6">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-4 col-lg-4 widget-left">
                            <span class="glyphicon glyphicon-ok icon-50" aria-hidden="true"></span>
                        </div>
                        <div class="col-sm-8 col-lg-8 widget-right">
                            <div class="large">{{ $OrderProcessedOfMonth }} </div>
                            <div class="text-muted"><h4>Tổng Số Đơn Hàng Đã Xử Lí tháng 7</h4></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6 col-6">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-4 col-lg-4 widget-left">
                            <span class="glyphicon glyphicon-pushpin icon-50" aria-hidden="true"></span>
                        </div>
                        <div class="col-sm-8 col-lg-8 widget-right">
                            <div class="large">{{ $OrderNoProcessedOfMonth }}</div>
                            <div class="text-muted"><h4>Tổng Số Đơn Hàng Chưa Xử Lí</h4></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6 col-6">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-4 col-lg-4 widget-left">
                            <span class="glyphicon glyphicon-hand-right icon-50" aria-hidden="true"></span>
                        </div>
                        <div class="col-sm-8 col-lg-8 widget-right">
                            <div class="large">{{ $product }}</div>
                            <div class="text-muted"><h4>Tổng Sản Phẩm</h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Biểu đồ doanh thu</div>
                    <div class="panel-body">
                        <div class="canvas-wrapper">
                            <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->

    </div>
    <!--end main-->

@endsection
@section('script')
    <script src="public/backend/js/jquery-1.11.1.min.js"></script>
	<script src="public/backend/js/bootstrap.min.js"></script>
	<script src="public/backend/js/easypiechart.js"></script>
	<script src="public/backend/js/easypiechart-data.js"></script>
    <script src="public/backend/js/bootstrap-datepicker.js"></script>
@endsection
@section('data') 
    <script>
        var lineChartData = {
                labels : [
                    @foreach($data as $thang=>$doanhthu)
                    "{{ $thang }}",
                    @endforeach
                    
                ],
                datasets : [
                
                    {
                        label: "My Second dataset",
                        fillColor : "rgba(48, 164, 255, 0.2)",
                        strokeColor : "rgba(48, 164, 255, 1)",
                        pointColor : "rgba(48, 164, 255, 1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(48, 164, 255, 1)",
                        data : [
                            @foreach($data as $thang=>$doanhthu)
                            {{ $doanhthu }},
                            @endforeach
                        ]
                    }
                ]
            }
            window.onload = function(){
                var chart1 = document.getElementById("line-chart").getContext("2d");
                window.myLine = new Chart(chart1).Line(lineChartData, {
                    responsive: true
                });
                var chart2 = document.getElementById("bar-chart").getContext("2d");
                window.myBar = new Chart(chart2).Bar(barChartData, {
                    responsive : true
                });
                var chart3 = document.getElementById("doughnut-chart").getContext("2d");
                window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {responsive : true
                });
                var chart4 = document.getElementById("pie-chart").getContext("2d");
                window.myPie = new Chart(chart4).Pie(pieData, {responsive : true
                });
                
            };
    </script> 
@endsection