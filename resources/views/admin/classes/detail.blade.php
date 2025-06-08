@extends('layouts.admin.app')

@section('content')
    <div class="header alert alert-info">
        <p style="text-align: center" class="h1">Danh sách lớp học phần của môn {{$course->name}}</p>
        <p style="text-align: center" class="h3">Học kỳ {{$semester->code}}</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-between">
            <button class="btn btn-secondary btn-md d-flex gap-1 align-items-center"
                onclick="window.location.href='{{route('admin.classes.show', ['semes' => $semester->code, 'falculty' => $course->blfalculty->abbreviation])}}'">
                <ion-icon name="arrow-back-outline"></ion-icon>
                <span>Trở về</span>
            </button>
        </div>
        <div class="content-display">
            <form class="fluid-container d-flex flex-column gap-5" action="{{route('admin.classes.assign')}}" method="POST">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-lg d-flex align-items-center gap-1">
                        <ion-icon name="save-outline"></ion-icon>
                        <span>Lưu thông tin</span>
                    </button>
                </div>
                @method('PUT')
                @csrf
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Mã lớp</th>
                            <th scope="col">Số sinh viên</th>
                            <th scope="col">Hệ số lớp</th>
                            <th scope="col">Giảng viên phụ trách</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr>
                                <td>{{$class->code}}</td>
                                <td>{{$class->std_nums}}</td>
                                <td>{{$class->coeff}}</td>
                                <td>
                                    <select name="profs[{{$class->code}}]" class="form-select">
                                        @if ($class->prof_id == null)
                                            <option selected hidden value="">Chọn giảng viên</option>
                                            @foreach($class->course->blfalculty->professors as $prof)
                                                <option value="{{ $prof->pid }}">{{ $prof->fullname }}</option>
                                            @endforeach
                                        @else
                                            @foreach($class->course->blfalculty->professors as $prof)
                                                @if ($prof->pid == $class->prof_id)
                                                    <option value="{{ $prof->pid }}" selected>{{ $prof->fullname }}</option>
                                                @else
                                                    <option value="{{ $prof->pid }}">{{ $prof->fullname }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm d-flex align-items-center gap-1"
                                        data-bs-toggle="modal" data-bs-target="#_dropClass_{{$class->code}}">
                                        <ion-icon name="stop-circle-outline"></ion-icon>
                                        <span>Đóng lớp học phần</span>
                                    </button>
                                    {{-- @include('admin.classes.components.close', ['class' => $class]) --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>

@endsection