@extends('layouts.accountant.app')

@section('content')


    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Quản Lý Tiền Lương</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-end gap-2">
            <form action="{{route('accountant.salary.eval')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-md btn-success d-flex align-items-center gap-1">
                    <ion-icon name="calculator-outline"></ion-icon>
                    <span>Tính tiền lương cho kỳ này</span>
                </button>
            </form>
        </div>
        <div class="content-display">
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
                                    @include('accountant.salary.components.semester', ['year' => $year])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection