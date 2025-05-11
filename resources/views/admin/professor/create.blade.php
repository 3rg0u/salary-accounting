@extends('layouts.admin.app')

@section('content')


    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Thêm Giảng Viên Mới</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-start">
            <button class="btn btn-secondary btn-lg d-flex align-items-center gap-1"
                onclick="window.location.href='{{ route('admin.professor.index') }}'">
                <ion-icon name="arrow-back-circle-outline"></ion-icon>
                <span style="text-align: center">Trở về</span>
            </button>
        </div>
        <div class=" content-display">
            <div class="container-fluid">
                <div class="show-form m-auto d-flex align-items-center w-25 py-5">
                    <form action="{{route('admin.professor.create')}}" method="post" class="w-100">
                        @csrf
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Họ và tên:</label>
                            <input type="text" class="form-control w-100" id="fullname" name="fullname">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control w-100" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu:</label>
                            <input type="password" class="form-control w-100" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Xác nhận mật khẩu:</label>
                            <input type="password" class="form-control w-100" id="password-confirm" name="password-confirm">
                        </div>
                        <div class='mb-3'>
                            <label for="falculty" class="form-controller">Khoa:</label>
                            <select name="falculty" class="form-select">
                                <option selected disabled hidden>Chọn khoa</option>
                                @foreach($falculties as $falculty)
                                    <option value="{{ $falculty }}">{{ $falculty }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class='mb-3'>
                            <label for="falculty" class="form-controller">Học vị:</label>
                            <select name="refs" class="form-select">
                                <option selected disabled hidden>Chọn học vị</option>
                                @foreach($references as $refs)
                                    <option value="{{ $refs }}">{{ $refs }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 d-flex justify-content-end">
                            <button type="submit" class='btn btn-success btn-lg d-flex align-items-center gap-1'>
                                <ion-icon name="checkmark-circle-outline"></ion-icon>
                                <span style="text-align: center">Tạo</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection