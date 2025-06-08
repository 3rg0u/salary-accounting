@extends('layouts.admin.app')

@section('content')
    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Thống Kê Giảng Viên</p>
    </div>

    <div class="body">
        <div class="content-display">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID Khoa</th>
                        <th scope="col">Tên Khoa</th>
                        <th scope="col">Tên Viết Tắt</th>
                        <th scope="col">SL Giảng Viên</th>
                        <th scope="col">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $falculty)
                        <tr>
                            <td>{{$falculty->id}}</td>
                            <td>{{$falculty->fullname}}</td>
                            <td>{{$falculty->abbreviation}}</td>
                            <td>{{$falculty->professors->count()}}</td>
                            <td class="d-flex flex-row justify-content-start gap-2">
                                <button class="btn btn-info btn-sm d-flex gap-1 align-items-center"
                                    onclick="window.location.href='{{ route('admin.stats.show', ['id' => $falculty->id]) }}'">
                                    <ion-icon name="information-circle-outline"></ion-icon>
                                    <span>Xem chi tiết</span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection