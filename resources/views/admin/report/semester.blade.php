@extends('layouts.admin.app')

@section('content')


    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Báo Cáo Tiền Lương Học Kỳ {{$sem_code}}</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-start">
            <button class="btn btn-secondary btn-lg d-flex align-items-center gap-1"
                onclick="window.location.href='{{ route('admin.report.index') }}'">
                <ion-icon name="arrow-back-circle-outline"></ion-icon>
                <span style="text-align: center">Trở về</span>
            </button>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                @if ($faculties->count() == 0)
                    <div class="fluid-continer d-flex align-items-center justify-content-center">
                        <p class="h3">Chưa có thông tin nào trong hệ thống</p>
                    </div>

                @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Tên khoa</th>
                                <th scope="col">Số giảng viên</th>
                                <th scope="col">Số lớp đã mở trong kỳ</th>
                                <th scope="col">Tổng lương giảng viên</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faculties as $faculty)
                                <tr>
                                    <td>{{$faculty->fullname}}</td>
                                    <td>{{$faculty->professors->count()}}</td>
                                    <td>{{$faculty->openedclasses($sem_code)->count()}}</td>
                                    <td>{{ number_format($faculty->salaries->sum('amount'), 0, ',', '.') }}₫</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Mã GV</th>
                                <th scope="col">Tên GV</th>
                                <th scope="col">Học vị</th>
                                <th scope="col">Khoa trực thuộc</th>
                                <th scope="col">Số lớp phụ trách trong kỳ</th>
                                <th scope="col">Số tiền lương</th>
                                <th scope="col">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faculties as $faculty)
                            @if ($faculty->professors->count() == 0)
                            @continue

                            @else
                            @foreach ($faculty->professors as $professor)
                            <tr>
                                <td>{{$professor->pid}}</td>
                                <td>{{$professor->fullname}}</td>
                                <td>{{$professor->degree->fullname}}</td>
                                <td>{{$professor->getfalculty->fullname}}</td>
                                <td>{{$professor->classes($sem_code)->count()}}</td>
                                <td>{{ number_format($professor->salaries($sem_code)->sum('amount'), 0, ',', '.') }}₫</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm d-flex align-items-center gap-1"
                                        data-bs-toggle="modal" data-bs-target="#_classes_prof_{{$professor->pid}}">
                                        <ion-icon name="information-circle-outline"></ion-icon>
                                        <span>Xem chi tiết các lớp phụ trách</span>
                                    </button>
                                    @include('admin.report.components.class', ['prof_id' => $professor->pid, 'classes' =>
                                    $professor->salaries($sem_code)])
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            @endforeach
                        </tbody>
                    </table> --}}
                @endif
            </div>
            <div class="container-fluid tab-pane fade show active" id="chart" role="tabpanel" aria-labelledby="chart-tab">
                <canvas id="chart-plot" class="container w-60"></canvas>
                <script>
                    var faculties = @json($faculties);

                    function renderChart() {
                        var canvas = document.getElementById('chart-plot').getContext('2d');

                        var myChart = new Chart(canvas, {
                            type: 'polarArea',
                            data: {
                                labels: faculties.map(function (faculty) {
                                    return faculty.fullname;
                                }),
                                datasets: [{
                                    label: 'Tiền lương cho giảng viên',
                                    data: faculties.map(function (faculty) {
                                        var tot = faculty.salaries.reduce(function (accumulator, bill) {
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
                                        text: 'Biểu đồ tiền lương cho các khoa trong trường',
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