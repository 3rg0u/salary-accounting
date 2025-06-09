@extends('layouts.accountant.app')

@section('content')


    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Quản Lý Hệ Số Lớp</p>
    </div>

    <div class="body">
        <div class="navigation d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-success btn-md d-flex align-items-center gap-1" data-bs-toggle="modal"
                data-bs-target="#_config_coeff">
                <ion-icon name="add-circle-outline"></ion-icon>
                <div>
                    <span style="text-align: center">Cấu hình hệ số lớp</span>
                    <br>
                    <span style="text-align: center">cho năm học hiện tại</span>
                </div>
            </button>
            <button type="button" class="btn btn-secondary btn-md d-flex align-items-center gap-1" data-bs-toggle="modal"
                data-bs-target="#_standard_coeff">
                <ion-icon name="information-circle-outline"></ion-icon>
                <div>
                    <span style="text-align: center">Quy định về hệ số</span>
                </div>
            </button>
            @include('accountant.classes.components.config', ['year' => $opening])
            @include('accountant.classes.components.standard')
        </div>
        <div class="content-display">
            @if ($coeffs->count() == 0)
                <div class="fluid-continer d-flex align-items-center justify-content-center">
                    <p class="h3">Chưa có thông tin nào trong hệ thống</p>

                </div>

            @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Mã năm học</th>
                            <th scope="col">Thời gian bắt đầu</th>
                            <th scope="col">Thời gian kết thúc</th>
                            <th scope="col">Hệ số <b>a</b></th>
                            <th scope="col">Hệ số <b>b</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coeffs as $coeff)
                            <tr>
                                <td>{{$coeff->year_code}}</td>
                                <td>{{$coeff->academic_year->start}}</td>
                                <td>{{$coeff->academic_year->end}}</td>
                                <td>{{$coeff->lowerbound}}</td>
                                <td>{{$coeff->upperbound}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection