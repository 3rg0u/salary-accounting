@extends('layouts.admin.app')

@section('content')
    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Quản Lý Học Vụ</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-end">
            <button class="btn btn-success btn-lg d-flex gap-1 align-items-center"
                onclick="window.location.href='{{ route('admin.affairs.create') }}'">
                <ion-icon name="add-circle-outline"></ion-icon>
                <span>Mở thêm năm học mới</span>
            </button>
        </div>
        <div class="content-display">
            @if ($years->count() == 0)
                <div class="fluid-continer d-flex align-items-center justify-content-center">
                    <p class="h3">Hiện tại chưa có năm học nào được mở</p>

                </div>

            @else
                <div class="fluid-container d-flex flex-row gap-5">
                    @foreach ($years as $year)
                        @include('admin.affairs.components.card', ['data' => $year])
                    @endforeach
                </div>
            @endif
        </div>
    </div>

@endsection