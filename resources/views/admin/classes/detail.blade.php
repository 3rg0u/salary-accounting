@extends('layouts.admin.app')

@section('content')
    <div class="header alert alert-info">
        <p style="text-align: center" class="h1">Danh sách lớp học phần của môn {{$course->name}}</p>
        <p style="text-align: center" class="h3">Học kỳ {{$semester->code}}</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-between">
            <button class="btn btn-secondary btn-md d-flex gap-1 align-items-center"
                onclick="window.location.href='{{route('admin.classes.show', ['semes' => $semester->code, 'falculty' => $course->blfalculty->abbreviation])}}'">
                <ion-icon name="arrow-back-outline"></ion-icon>
                <span>Trở về</span>
            </button>
        </div>
        <div class="content-display">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Mã lớp</th>
                        <th scope="col">Giảng viên phụ trách</th>
                        <th scope="col">Số sinh viên`</th>
                        <th scope="col">Hệ số lớp</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                        <tr>
                            <td>{{$class->code}}</td>
                            <td>
                                @if ($class->professor == null)
                                    -
                                @else
                                    {{$class->professor->fullname}}
                                @endif
                            </td>
                            <td>{{$class->std_nums}}</td>
                            <td>{{$class->coeff}}</td>
                            <td class="d-flex flex-row justify-content-start gap-2">
                                <button type="button" class="btn btn-info btn-sm d-flex align-items-center gap-1"
                                    data-bs-toggle="modal" data-bs-target="#_assignProfessor_{{$class->code}}">
                                    <ion-icon name="add-circle-outline"></ion-icon>
                                    <span>Chỉ định giảng viên</span>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm d-flex align-items-center gap-1"
                                    data-bs-toggle="modal" data-bs-target="#_dropClass_{{$class->code}}">
                                    <ion-icon name="stop-circle-outline"></ion-icon>
                                    <span>Đóng lớp</span>
                                </button>
                                @include('admin.classes.components.assign', ['class' => $class])
                                @include('admin.classes.components.close', ['class' => $class])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection