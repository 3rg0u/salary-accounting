@extends('layouts.accountant.app')

@section('content')


    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Quản Lý Tiền Giảng Dạy</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-end">
            <button type="button" class="btn btn-success btn-lg d-flex align-items-center gap-1" data-bs-toggle="modal"
                data-bs-target="#_config_wage">
                <ion-icon name="add-circle-outline"></ion-icon>
                <span style="text-align: center">Cấu hình tiền giảng dạy cho năm học hiện tại</span>
            </button>
            @include('accountant.wage.components.config', ['year' => $opening])
        </div>
        <div class="content-display">
            @if ($wages->count() == 0)
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
                            <th scope="col">Tiền lương / 1 tiết</th>
                            <th scope="col">Mô tả</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wages as $wage)
                            <tr>
                                <td>{{$wage->year_code}}</td>
                                <td>{{$wage->year->start}}</td>
                                <td>{{$wage->year->end}}</td>
                                <td>{{number_format($wage->amount, 0, ',', '.')}}₫</td>
                                <td>{{$wage->description}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection