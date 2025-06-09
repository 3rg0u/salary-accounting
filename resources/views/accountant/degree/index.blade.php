@extends('layouts.accountant.app')

@section('content')


    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">Quản Lý Hệ Số Bằng Cấp</p>
    </div>

    <div class="body">

        <div class="content-display">
            @if ($degrees->count() == 0)
                <div class="fluid-continer d-flex align-items-center justify-content-center">
                    <p class="h3">Chưa có danh mục bằng cấp nào trong hệ thống!</p>

                </div>

            @else
                <form class="fluid-container d-flex flex-column gap-5" action="{{route('accountant.degree.config')}}"
                    method="POST">
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
                                <th scope="col">Tên đầy đủ</th>
                                <th scope="col">Tên viết tắt</th>
                                <th scope="col">Số lượng GV</th>
                                <th scope="col">Hệ số</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($degrees as $degree)
                                <tr>
                                    <td>{{$degree->fullname}}</td>
                                    <td>{{$degree->abbreviation}}</td>
                                    <td>{{$degree->profs->count()}}</td>
                                    <td>
                                        <input style="width: 50px" type="number" name="coeffs[{{$degree->abbreviation}}]"
                                            value="{{$degree->coeff}}" min="0" step="0.01">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            @endif
        </div>
    </div>

@endsection