@extends('layouts.admin.app')

@section('content')
    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Quản Lý Giảng Viên</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-end">
            <button class="btn btn-success btn-lg d-flex gap-1 align-items-center"
                onclick="window.location.href='{{ route('admin.professor.create') }}'">
                <ion-icon name="add-circle-outline"></ion-icon>
                <span>Thêm giảng viên mới</span>
            </button>
        </div>
        <div class="content-display">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Khoa</th>
                        <th scope="col">Học vị</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($professors as $professor)
                        <tr>
                            <td>{{$professor->id}}</td>
                            <td>{{$professor->fullname}}</td>
                            <td>{{$professor->email}}</td>
                            <td>{{$professor->falculty}}</td>
                            <td>{{$professor->refs}}</td>
                            <td class="d-flex flex-row justify-content-start gap-2">
                                <button type="button" class="btn btn-info btn-sm d-flex align-items-center gap-1"
                                    data-bs-toggle="modal" data-bs-target="#_editInfor_{{$professor->id}}">
                                    <ion-icon name="create-outline"></ion-icon>
                                    <span>Cập nhật thông tin</span>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm d-flex align-items-center gap-1"
                                    data-bs-toggle="modal" data-bs-target="#_dropInfor_{{$professor->id}}">
                                    <ion-icon name="trash-outline"></ion-icon>
                                    <span>Xóa bỏ</span>
                                </button>
                                @include('admin.professor.components.edit', ['professor' => $professor])
                                @include('admin.professor.components.delete', ['professor' => $professor])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection