@extends('layouts.admin.app')

@section('content')
    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Quản Lý Danh Mục Bằng Cấp</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-end">
            <button class="btn btn-success btn-lg d-flex gap-1 align-items-center"
                onclick="window.location.href='{{ route('admin.degree.create') }}'">
                <ion-icon name="add-circle-outline"></ion-icon>
                <span>Thêm danh mục mới</span>
            </button>
        </div>
        <div class="content-display">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên đầy đủ</th>
                        <th scope="col">Tên viết tắt</th>
                        <th scope="col">Hệ số</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($degrees as $degree)
                        <tr>
                            <td>{{$degree->id}}</td>
                            <td>{{$degree->fullname}}</td>
                            <td>{{$degree->abbreviation}}</td>
                            <td>{{$degree->coeff}}</td>
                            <td class="d-flex flex-row justify-content-start gap-2">
                                <button type="button" class="btn btn-info btn-sm d-flex align-items-center gap-1"
                                    data-bs-toggle="modal" data-bs-target="#_editInfor_{{$degree->id}}">
                                    <ion-icon name="create-outline"></ion-icon>
                                    <span>Cập nhật thông tin</span>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm d-flex align-items-center gap-1"
                                    data-bs-toggle="modal" data-bs-target="#_dropInfor_{{$degree->id}}">
                                    <ion-icon name="trash-outline"></ion-icon>
                                    <span>Xóa bỏ</span>
                                </button>
                                @include('admin.degree.components.edit', ['degree' => $degree])
                                @include('admin.degree.components.delete', ['degree' => $degree])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection