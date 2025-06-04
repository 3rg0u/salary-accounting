@extends('layouts.admin.app')

@section('content')
    <div class="header alert alert-info">
        <p style="text-align: center" class="h1">Danh Sách Lớp Học Phần Đã Mở</p>
        <p style="text-align: center" class="h1">Năm học {{$semester->academicyear->code}}</p>
        <p style="text-align: center" class="h1">Học kì {{$semester->code}}</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-between">
            <button class="btn btn-secondary btn-md d-flex gap-1 align-items-center"
                onclick="window.location.href='{{route('admin.classes.history')}}'">
                <ion-icon name="arrow-back-outline"></ion-icon>
                <span>Trở về</span>
            </button>
        </div>
        <div class="content-display">
            @if ($semester->openedClasses == null)
                <div class="fluid-continer d-flex align-items-center justify-content-center">
                    <p class="h3">Hiện chưa có dữ liệu để hiển thị</p>
                </div>

            @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Mã lớp học phần</th>
                            <th scope="col">Tên học phần</th>
                            <th scope="col">Khoa trực thuộc</th>
                            <th scope="col">Giảng viên phụ trách</th>
                            <th scope="col">Số sinh viên</th>
                            <th scope="col">Hệ số lớp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($semester->openedClasses as $class)
                            <tr>
                                <td>{{$class->code}}</td>
                                <td>{{$class->course->name}}</td>
                                <td>{{$class->course->falculty}}</td>
                                @if ($class->professor == null)
                                    <td>-</td>

                                @else
                                    <td>{{$class->professor->fullname}}</td>

                                @endif
                                <td>{{$class->std_nums}}</td>
                                <td>{{$class->coeff}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection