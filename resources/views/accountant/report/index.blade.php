@extends('layouts.accountant.app')

@section('content')


    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Báo Cáo Tiền Lương</p>
    </div>

    <div class="body">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <ul class="d-flex align-items-center justify-content-center nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="chart-tab" data-bs-toggle="tab" data-bs-target="#chart" type="button"
                    role="tab" aria-controls="profile" aria-selected="true">Biểu đồ</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list" type="button" role="tab"
                    aria-controls="list" aria-selected="false">Chi tiết</button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="container-fluid tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                @if ($years->count() == 0)
                    <div class="fluid-continer d-flex align-items-center justify-content-center">
                        <p class="h3">Chưa có thông tin nào trong hệ thống</p>
                    </div>

                @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Mã năm học</th>
                                <th scope="col">Thời gian bắt đầu</th>
                                <th scope="col">Thời gian kết thúc</th>
                                <th scope="col">Số học kỳ đã mở</th>
                                <th scope="col">Tổng số tiền lương phải chi trả</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($years as $year)
                                <tr>
                                    <td>{{$year->code}}</td>
                                    <td>{{$year->start}}</td>
                                    <td>{{$year->end}}</td>
                                    <td>{{$year->semesters->count()}}</td>
                                    <td>{{ number_format($year->salaries->sum('amount'), 0, ',', '.') }}₫</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm d-flex align-items-center gap-1"
                                            data-bs-toggle="modal" data-bs-target="#_salaries_year_{{$year->code}}">
                                            <ion-icon name="information-circle-outline"></ion-icon>
                                            <span>Xem chi tiết các học kì</span>
                                        </button>
                                        @include('accountant.report.components.semester', ['year' => $year])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="container-fluid tab-pane fade show active" id="chart" role="tabpanel" aria-labelledby="chart-tab">
                <canvas id="chart-plot" class="container w-70"></canvas>
                <script>
                    var years = @json($years);

                    function renderChart() {
                        var canvas = document.getElementById('chart-plot').getContext('2d');

                        var myChart = new Chart(canvas, {
                            type: 'bar',
                            data: {
                                labels: years.map(function (item) {
                                    return item.code;
                                }),
                                datasets: [{
                                    label: 'Tiền lương cho giảng viên',
                                    data: years.map(function (year) {
                                        var tot = year.salaries.reduce(function (accumulator, bill) {
                                            return accumulator + bill.amount;
                                        }, 0);
                                        return tot;
                                    }),
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.5)',
                                        'rgba(54, 162, 235, 0.5)',
                                        'rgba(255, 206, 86, 0.5)',
                                        'rgba(75, 192, 192, 0.5)',
                                        'rgba(153, 102, 255, 0.5)',
                                        'rgba(255, 159, 64, 0.5)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    hoverBackgroundColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                plugins: {
                                    title: {
                                        position: 'bottom',
                                        display: true,
                                        text: 'Biểu đồ tiền lương cho giảng viên trong 5 năm gần nhất',
                                        font: {
                                            size: 20,
                                            family: 'Arial',
                                            weight: 'bold'
                                        },
                                        padding: {
                                            top: 10,
                                            bottom: 30
                                        }
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    }

                    $('#chart-tab').on('shown.bs.tab', function (e) {
                        renderChart();
                    });

                    renderChart();
                </script>

            </div>
        </div>


@endsection