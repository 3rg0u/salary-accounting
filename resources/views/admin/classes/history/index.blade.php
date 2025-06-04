@extends('layouts.admin.app')

@section('content')
    <div class="header alert alert-info">
        <p style="text-align: center" class="h1">Lịch Sử Học Vụ</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-end">
        </div>
        <div class="content-display">
            @if ($years == null)
                <div class="fluid-continer d-flex align-items-center justify-content-center">
                    <p class="h3">Hiện chưa có dữ liệu để hiển thị</p>
                </div>

            @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Mã năm học</th>
                            <th scope="col">Thời gian bắt đầu</th>
                            <th scope="col">Thời gian kết thúc</th>
                            <th scope="col">Số học kỳ đã mở</th>
                            <th scope="col">Hành động</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($years as $year)
                            <tr>
                                <td>{{$year->code}}</td>
                                <td>{{$year->start}}</td>
                                <td>{{$year->end}}</td>
                                <td>{{$year->semesters->count()}}</td>
                                <td class="d-flex flex-row justify-content-start gap-2 flex-shrink-0">
                                    <button type="button" class="btn btn-info btn-sm d-flex align-items-center gap-1"
                                        data-bs-toggle="modal" data-bs-target="#_historyYear_{{$year->code}}">
                                        <ion-icon name="information-circle-outline"></ion-icon>
                                        <span>Xem chi tiết các học kì</span>
                                    </button>
                                    @include('admin.classes.history.his_semes', ['year' => $year])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection