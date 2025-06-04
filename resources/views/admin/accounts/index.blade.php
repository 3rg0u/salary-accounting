@extends('layouts.admin.app')

@section('content')


    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Mở Tài Khoản Cho Kế Toán</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-start">
        </div>
        <div class=" content-display">
            <div class="container-fluid">
                <div class="show-form m-auto d-flex align-items-center w-25 py-5">
                    <form action="{{route('admin.account.create')}}" method="post" class="w-100">
                        @csrf
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