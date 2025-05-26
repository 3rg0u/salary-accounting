<div class="modal fade" id="_createSemester" tabindex="-1" aria-labelledby="editInfor" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfor">Mở học kì mới</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.affairs.semester.create', ['year' => $year->code])}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="start" class="form-label">Ngày bắt đầu:</label>
                        <input type="date" class="form-control w-100" id="start" name="start">
                    </div>
                    <div class="mb-3">
                        <label for="end" class="form-label">Ngày kết thúc:</label>
                        <input type="date" class="form-control w-100" id="end" name="end">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-md d-flex align-items-center gap-1"
                            data-bs-dismiss="modal">
                            <ion-icon name="close-circle-outline"></ion-icon>
                            <span style="text-align:center">Đóng</span>
                        </button>
                        <button type="submit" class="btn btn-success btn-md d-flex align-items-center gap-1">
                            <ion-icon name="checkmark-circle-outline"></ion-icon>
                            <span style="text-align:center">Mở học kì</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>