@extends('layouts.admin.app')

@section('content')
    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Quản Lý Khoa</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-end">
            <button class="btn btn-success btn-lg d-flex gap-1 align-items-center"
                onclick="window.location.href='{{ route('admin.falculty.create') }}'">
                <ion-icon name="add-circle-outline"></ion-icon>
                <span>Thêm khoa mới</span>
            </button>
        </div>
        <div class="content-display">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID Khoa</th>
                        <th scope="col">Tên đầy đủ</th>
                        <th scope="col">Tên viết tắt</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($falculties as $falculty)
                        <tr>
                            <td>{{$falculty->id}}</td>
                            <td>{{$falculty->fullname}}</td>
                            <td>{{$falculty->abbreviation}}</td>
                            <td class="d-flex flex-row justify-content-start gap-2">
                                <button type="button" class="btn btn-info btn-sm d-flex align-items-center gap-1"
                                    data-bs-toggle="modal" data-bs-target="#_editInfor_{{$falculty->abbreviation}}">
                                    <ion-icon name="create-outline"></ion-icon>
                                    <span>Cập nhật thông tin</span>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm d-flex align-items-center gap-1"
                                    data-bs-toggle="modal" data-bs-target="#_dropInfor_{{$falculty->abbreviation}}">
                                    <ion-icon name="trash-outline"></ion-icon>
                                    <span>Xóa bỏ</span>
                                </button>
                                @include('admin.falculty.components.edit', ['falculty' => $falculty])
                                @include('admin.falculty.components.delete', ['falculty' => $falculty])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection