<div class="modal fade" id="_config_wage" tabindex="-1" aria-labelledby="editInfor" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfor">Cập nhật tiền lương của năm học {{$year->code}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('accountant.wage.config')}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="amount" class="form-label">Số tiền:</label>
                        <input type="number" class="form-control w-100" name="amount" min='10000' step="0.1" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả (nếu có):</label>
                        <textarea name="description" cols="30" class="form-control w-100"></textarea>
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