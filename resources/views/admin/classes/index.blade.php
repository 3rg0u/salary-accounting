@extends('layouts.admin.app')

@section('content')
    <div class="header alert alert-info">
        <p style="text-align: center" class="h1">Quản Lý Lớp Học Phần</p>
        @if ($semester->exists())
            <p style="text-align: center" class="h3">Năm học {{$semester->academicyear->code}}</p>
            <p style="text-align: center" class="h3">Học kỳ {{$semester->code}}</p>

        @else

            <p style="text-align: center" class="h3">Hiện không có học kỳ nào được mở</p>
        @endif
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-end">
        </div>

        <div class="content-display">
            @if ($semester->exists())

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Tên khoa</th>
                            <th scope="col">Tên viết tắt</th>
                            <th scope="col">Số học phần đã mở đăng ký</th>
                            <th scope="col">Số học phần đã mở đăng ký lớp</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($falculties as $falculty)
                            <tr>
                                <td>{{$falculty->fullname}}</td>
                                <td>{{$falculty->abbreviation}}</td>
                                <td>{{$falculty->openedcourses()->count()}}</td>
                                <td>{{$falculty->openedclasses()->count()}}</td>
                                <td class="d-flex flex-row justify-content-start gap-2 flex-shrink-0">
                                    <button class="btn btn-info btn-md d-flex gap-1 align-items-center"
                                        onclick="window.location.href='{{ route('admin.classes.show', ['semes' => $semester->code, 'falculty' => $falculty->abbreviation]) }}'">
                                        <ion-icon name="information-circle-outline"></ion-icon>
                                        <span>Xem danh sách học phần đang mở</span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="fluid-continer d-flex align-items-center justify-content-center">
                    <p class="h3">Hiện tại không có học kì nào đang diễn ra</p>
                </div>
            @endif
        </div>
    </div>

@endsection