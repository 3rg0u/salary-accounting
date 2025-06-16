<div class="modal fade" id="_addCourse" tabindex="-1" aria-labelledby="editInfor" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfor">Thêm học phần cho khoa {{$falculty->fullname}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.courses.create', ['falculty' => $falculty->abbreviation])}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên học phần:</label>
                        <input type="text" class="form-control w-100" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="cred_hours" class="form-label">Số tín chỉ:</label>
                        <input type="number" class="form-control w-100" id="cred_hours" name="cred_hours">
                    </div>
                    <div class="mb-3">
                        <label for="cls_hours" class="form-label">Số tiết:</label>
                        <input type="number" class="form-control w-100" id="cls_hours" name="cls_hours">
                    </div>
                    <div class="mb-3">
                        <label for="coeff" class="form-label">Hệ số học phần:</label>
                        <input type="number" min="0" step="0.1" class="form-control w-100" id="coeff" name="coeff">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-md d-flex align-items-center gap-1"
                            data-bs-dismiss="modal">
                            <ion-icon name="close-circle-outline"></ion-icon>
                            <span style="text-align:center">Đóng</span>
                        </button>
                        <button type="submit" class="btn btn-success btn-md d-flex align-items-center gap-1">
                            <ion-icon name="checkmark-circle-outline"></ion-icon>
                            <span style="text-align:center">Tạo học phần</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>