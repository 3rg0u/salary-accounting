@extends('layouts.admin.app')

@section('content')


    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Học Kì Mở Trong Năm Học {{$year->code}}</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-between">
            <button class="btn btn-secondary btn-lg d-flex align-items-center gap-1"
                onclick="window.location.href='{{ route('admin.affairs.index') }}'">
                <ion-icon name="arrow-back-circle-outline"></ion-icon>
                <span style="text-align: center">Trở về</span>
            </button>
            <button type="button" class="btn btn-success btn-lg d-flex align-items-center gap-1" data-bs-toggle="modal"
                data-bs-target="#_createSemester">
                <ion-icon name="add-circle-outline"></ion-icon>
                <span style="text-align: center">Mở học kì mới</span>
            </button>
            @include('admin.affairs.components.sem_create', ["year" => $year])
        </div>
        <div class="content-display">
            @if ($semesters->count() == 0)
                <div class="fluid-continer d-flex align-items-center justify-content-center">
                    <p class="h3">Chưa có học kì nào được mở trong năm học này.</p>
                </div>
            @else
                <div class="fluid-container d-flex flex-row gap-5">
                    @foreach ($semesters as $semester)
                        <div class="eg-card">
                            <div class='eg-link'>
                                <p class="h5">{{$semester->code}}</p>
                                <span class="h7">Start: {{$semester->start}}</span>
                                <br>
                                <span class="h7">End: {{$semester->end}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

@endsection