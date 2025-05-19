@extends('layouts.admin.app')

@section('content')


    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Thêm Danh Mục Bằng Cấp Mới</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-start">
            <button class="btn btn-secondary btn-lg d-flex align-items-center gap-1"
                onclick="window.location.href='{{ route('admin.degree.index') }}'">
                <ion-icon name="arrow-back-circle-outline"></ion-icon>
                <span style="text-align: center">Trở về</span>
            </button>
        </div>
        <div class=" content-display">
            <div class="container-fluid">
                <div class="show-form m-auto d-flex align-items-center w-25 py-5">
                    <form action="{{route('admin.degree.create')}}" method="post" class="w-100">
                        @csrf
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Tên đầy đủ:</label>
                            <input type="text" class="form-control w-100" id="fullname" name="fullname">
                        </div>
                        <div class="mb-3">
                            <label for="abbreviation" class="form-label">Tên viết tắt:</label>
                            <input type="text" class="form-control w-100" id="abbreviation" name="abbreviation">
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