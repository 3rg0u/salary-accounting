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
                <p>Hien chua co nam hoc nao duoc mo</p>
            @else
                @foreach ($years as $year)
                    <div class="fluid-container">

                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection