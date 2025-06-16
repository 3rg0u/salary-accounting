@extends('layouts.master')

@section('body')
    <section class="vh-100 bg-image" style="background: rgba(33, 33, 33, 0.3);">

        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px; background-color: #bbc9f2;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Đăng nhập</h2>

                                <form action="{{ route('signin') }}" method="POST" class="was-validated">
                                    @csrf
                                    <label class="form-label mb-2" for="email">Email</label>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" name="email" class="form-control form-control-lg" autofocus
                                            required />
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label mb-2" for="password">Mật khẩu</label>
                                        <input type="password" name="password" class="form-control form-control-lg"
                                            required />
                                    </div>
                                    <div class="d-flex justify-content-center my-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection