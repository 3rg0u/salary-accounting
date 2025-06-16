@extends('layouts.accountant.app')

@section('content')


    <div class="header">
        <p style="text-align: center" class="h1 alert alert-info">QL Tiền Lương</p>
    </div>

    <div class="body">
        <div class="content-display">
            <div class="content-formula d-flex flex-column align-items-center justify-content-center gap-3">
                <p class="h1 alert alert-secondary">
                    Công Thức Tính Tiền Lương
                </p>
                <p class="h4"><b>Số tiết quy đổi</b> = <b>Số tiết thực tế</b> * (<b>Hệ số học phần</b> + <b>Hệ số lớp</b>)
                </p>
                <p class="h4"><b>Tiền dạy mỗi lớp</b> = <b>Số tiết quy đổi</b> * <b>Hệ số giáo viên</b> * <b>Tiền dạy một
                        tiết</b></p>
                <form action="{{route('accountant.salary.eval')}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-lg btn-success d-flex align-items-center gap-1 py-3">
                        <ion-icon name="calculator-outline"></ion-icon>
                        <span>Tính tiền lương cho kỳ này</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection