@extends('layouts.admin.app')

@section('content')
    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Quản Lý Học Phần</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-end">
        </div>
        <div class="content-display">
            @if ($falculties->count() == 0)
                <div class="fluid-continer d-flex align-items-center justify-content-center">
                    <p class="h3">Hiện tại chưa có khoa nào trong trường</p>

                </div>

            @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Tên khoa</th>
                            <th scope="col">Tên viết tắt</th>
                            <th scope="col">Số học phần đã mở</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($falculties as $falculty)
                            <tr>
                                <td>{{$falculty->fullname}}</td>
                                <td>{{$falculty->abbreviation}}</td>
                                <td>{{$falculty->courses->count()}}</td>
                                <td class="d-flex flex-row justify-content-start gap-2">
                                    <button class="btn btn-info btn-md d-flex gap-1 align-items-center"
                                        onclick="window.location.href='{{ route('admin.courses.show', ['falculty' => $falculty->abbreviation]) }}'">
                                        <ion-icon name="information-circle-outline"></ion-icon>
                                        <span>
                                            Xem chi tiết các học phần của khoa
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection