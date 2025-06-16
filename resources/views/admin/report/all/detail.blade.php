@extends('layouts.admin.app')

@section('content')


    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Thống Kê Tiền Lương Giảng Viên Học Kỳ {{$semester->code}}
        </p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-start gap-2">
            <button class="btn btn-secondary btn-lg d-flex align-items-center gap-1"
                onclick="window.location.href='{{ route('admin.report.all.index') }}'">
                <ion-icon name="arrow-back-circle-outline"></ion-icon>
                <span style="text-align: center">Trở về</span>
            </button>
        </div>
        <div class="content-display">
            @if ($prof_bills->count() == 0)
                <div class="fluid-continer d-flex align-items-center justify-content-center">
                    <p class="h3">Chưa có thông tin nào trong hệ thống.</p>
                </div>

            @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Mã GV</th>
                            <th scope="col">Tên GV</th>
                            <th scope="col">Học vị</th>
                            <th scope="col">Khoa trực thuộc</th>
                            <th scope="col">Số lớp phụ trách trong kỳ</th>
                            <th scope="col">Số tiền lương</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prof_bills as $prof_id => $bills)
                            <tr>
                                <td>{{$prof_id}}</td>
                                <td>{{$bills[0]->professor->fullname}}</td>
                                <td>{{$bills[0]->professor->refs}}</td>
                                <td>{{$bills[0]->professor->falculty}}</td>
                                <td>{{$bills[0]->professor->classes($semester->code)->count()}}</td>
                                <td>{{ number_format($bills->sum('amount'), 0, ',', '.') }}₫</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm d-flex align-items-center gap-1"
                                        data-bs-toggle="modal" data-bs-target="#_classes_prof_{{$prof_id}}">
                                        <ion-icon name="information-circle-outline"></ion-icon>
                                        <span>Xem chi tiết các lớp phụ trách</span>
                                    </button>
                                    @include('admin.report.all.components.class', ['prof_id' => $prof_id, 'classes' => $bills])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection