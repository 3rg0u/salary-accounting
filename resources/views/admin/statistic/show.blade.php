@extends('layouts.admin.app')

@section('content')
    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Danh Sách Giảng Viên Khoa {{$falculty->fullname}}</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-start">
            <button class="btn btn-secondary btn-lg d-flex align-items-center gap-1"
                onclick="window.location.href='{{ route('admin.stats.index') }}'">
                <ion-icon name="arrow-back-circle-outline"></ion-icon>
                <span style="text-align: center">Trở về</span>
            </button>
        </div>
        <div class="content-display">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">PID</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Học vị</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profs as $professor)
                        <tr>
                            <td>{{$professor->pid}}</td>
                            <td>{{$professor->fullname}}</td>
                            <td>{{$professor->email}}</td>
                            <td>{{$professor->refs}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection