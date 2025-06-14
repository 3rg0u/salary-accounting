<div class="modal fade" id="_config_coeff" tabindex="-1" aria-labelledby="editInfor" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfor">Cập nhật hệ số lớp của năm học {{$year->code}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('accountant.class.config')}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="lowerbound" class="form-label">Hế số <b>a</b>:</label>
                        <input type="number" class="form-control w-100" name="lowerbound" min='30' step="1" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="upperbound" class="form-label">Hế số <b>b</b>:</label>
                        <input type="number" class="form-control w-100" name="upperbound" autofocus>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-md d-flex align-items-center gap-1"
                            data-bs-dismiss="modal">
                            <ion-icon name="close-circle-outline"></ion-icon>
                            <span style="text-align:center">Đóng</span>
                        </button>
                        <button type="submit" class="btn btn-success btn-md d-flex align-items-center gap-1">
                            <ion-icon name="checkmark-circle-outline"></ion-icon>
                            <span style="text-align:center">Lưu</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>