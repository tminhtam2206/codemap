@extends('layouts.admin')
@section('title', 'Bảng Điều Khiển')
@section('content')
<div class="page">
    <div class="page-inner">
        <header class="page-title-bar">
            <div class="d-flex flex-column flex-md-row">
                <p class="lead">
                    <span class="font-weight-bold">Xin chào, {{ getName() }}.</span>
                    <span class="d-block text-muted">Đây là những gì đang xảy ra với website của bạn ngày hôm nay.</span>
                </p>
                <div class="ml-auto">
                    <div class="dropdown">
                        <button class="btn btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Tuần này</span><i class="fa fa-fw fa-caret-down"></i></button>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-section">
            <div class="section-block">
                <div class="metric-row">
                    <div class="col-lg-9">
                        <div class="metric-row metric-flush">
                            <div class="col">
                                <a href="{{ route('admin.list_member') }}" class="metric metric-bordered align-items-center">
                                    <h2 class="metric-label">THÀNH VIÊN</h2>
                                    <p class="metric-value h3">
                                        <sub><i class="fas fa-users"></i></sub>
                                        <span class="value">{{ $member }}</span>
                                    </p>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route('admin.list_post') }}" class="metric metric-bordered align-items-center">
                                    <h2 class="metric-label">BÀI ĐĂNG</h2>
                                    <p class="metric-value h3">
                                        <sub><i class="fas fa-layer-group"></i></sub>
                                        <span class="value"> {{ $post }}</span>
                                    </p>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route('admin.list_tags') }}" class="metric metric-bordered align-items-center">
                                    <h2 class="metric-label">THẺ TAG</h2>
                                    <p class="metric-value h3">
                                        <sub><i class="fas fa-tags"></i></sub>
                                        <span class="value"> {{ $tag }}</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <span class="metric metric-bordered">
                            <div class="metric-badge">
                                <span class="badge badge-lg badge-success"><span class="oi oi-media-record pulse mr-1"></span> DUNG LƯỢNG DATABASE</span>
                            </div>
                            <p class="metric-value h3">
                                <sub><i class="fas fa-database"></i></sub>
                                <span class="value"> {{ getSizeDB() }}</span>
                            </p>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-fluid">
                        <div class="card-body">
                            <h3 class="card-title mb-4">LƯỢT XEM</h3>
                            <div class="chartjs" style="height: 492px">
                                <canvas id="completion-tasks"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    "use strict";

    function _classCallCheck(instance, Constructor) {
        if (!(instance instanceof Constructor)) {
            throw new TypeError("Cannot call a class as a function");
        }
    }

    function _defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
            var descriptor = props[i];
            descriptor.enumerable = descriptor.enumerable || false;
            descriptor.configurable = true;
            if ("value" in descriptor) descriptor.writable = true;
            Object.defineProperty(target, descriptor.key, descriptor);
        }
    }

    function _createClass(Constructor, protoProps, staticProps) {
        if (protoProps) _defineProperties(Constructor.prototype, protoProps);
        if (staticProps) _defineProperties(Constructor, staticProps);
        return Constructor;
    }
    // Dashboard Demo
    // =============================================================
    var DashboardDemo =
        /*#__PURE__*/
        function() {
            function DashboardDemo() {
                _classCallCheck(this, DashboardDemo);
                this.init();
            }
            _createClass(DashboardDemo, [{
                key: "init",
                value: function init() {
                    // event handlers
                    this.completionTasksChart();
                }
            }, {
                key: "completionTasksChart",
                value: function completionTasksChart() {
                    var data = {
                        labels: ['{{ date("d-m-Y", strtotime($day1)) }}', '{{ date("d-m-Y", strtotime($day2)) }}', '{{ date("d-m-Y", strtotime($day3)) }}', '{{ date("d-m-Y", strtotime($day4)) }}', '{{ date("d-m-Y", strtotime($day5)) }}', '{{ date("d-m-Y", strtotime($day6)) }}', '{{ date("d-m-Y", strtotime($day7)) }}'],
                        datasets: [{
                            backgroundColor: Looper.getColors('brand').indigo,
                            borderColor: Looper.getColors('brand').indigo,
                            data: ['{{ $val_day1 }}', '{{ $val_day2 }}', '{{ $val_day3 }}', '{{ $val_day4 }}', '{{ $val_day5 }}', '{{ $val_day6 }}', '{{ $val_day7 }}']
                        }] // init chart bar
                    };
                    var canvas = $('#completion-tasks')[0].getContext('2d');
                    var chart = new Chart(canvas, {
                        type: 'bar',
                        data: data,
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            },
                            title: {
                                display: false
                            },
                            scales: {
                                xAxes: [{
                                    gridLines: {
                                        display: true,
                                        drawBorder: false,
                                        drawOnChartArea: false
                                    },
                                    ticks: {
                                        maxRotation: 0,
                                        maxTicksLimit: 7
                                    }
                                }],
                                yAxes: [{
                                    gridLines: {
                                        display: true,
                                        drawBorder: false
                                    },
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 100
                                    }
                                }]
                            }
                        }
                    });
                }
            }]);
            return DashboardDemo;
        }();
    /**
     * Keep in mind that your scripts may not always be executed after the theme is completely ready,
     * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
     */
    $(document).on('theme:init', function() {
        new DashboardDemo();
    });
</script>

@endsection