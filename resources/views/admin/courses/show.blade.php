@extends('layouts.admin.app')

@section('content')
    <div class="header alert alert-info">
        <p style="text-align: center" class="h1">Danh sách lớp học phần của khoa {{$falculty->fullname}}</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-between">
            <button class="btn btn-secondary btn-md d-flex gap-1 align-items-center"
                onclick="window.location.href='{{route('admin.courses.index')}}'">
                <ion-icon name="arrow-back-outline"></ion-icon>
                <span>Trở về</span>
            </button>
            <button class="btn btn-success btn-lg d-flex gap-1 align-items-center" data-bs-toggle="modal"
                data-bs-target="#_addCourse">
                <ion-icon name="add-circle-outline"></ion-icon>
                <span>Tạo học phần mới</span>
            </button>
            @include('admin.courses.components.add', ['falculty' => $falculty])
        </div>
        <div class="content-display">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Mã học phần</th>
                        <th scope="col">Tên học phần</th>
                        <th scope="col">Số tín chỉ</th>
                        <th scope="col">Số tiết</th>
                        <th scope="col">Hệ số học phần</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->code}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->cred_hours}}</td>
                            <td>{{$course->cls_hours}}</td>
                            <td>{{$course->coeff}}</td>
                            <td class="d-flex flex-row justify-content-start gap-2">
                                <button type="button" class="btn btn-info btn-sm d-flex align-items-center gap-1"
                                    data-bs-toggle="modal" data-bs-target="#_editCourse_{{$course->code}}">
                                    <ion-icon name="create-outline"></ion-icon>
                                    <span>Cập nhật thông tin</span>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm d-flex align-items-center gap-1"
                                    data-bs-toggle="modal" data-bs-target="#_dropCourse_{{$course->code}}">
                                    <ion-icon name="trash-outline"></ion-icon>
                                    <span>Xóa bỏ</span>
                                </button>
                                @include('admin.courses.components.edit', ['course' => $course])
                                @include('admin.courses.components.delete', ['course' => $course])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection