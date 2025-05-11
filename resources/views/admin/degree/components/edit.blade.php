<div class="modal fade" id="_editInfor_{{$degree->id}}" tabindex="-1" aria-labelledby="editInfor" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfor">Cập nhật thông tin danh mục bằng cấp</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.degree.edit', ['id' => $degree->id])}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Tên đầy đủ:</label>
                        <input type="text" class="form-control w-100" id="fullname" name="fullname"
                            value="{{$degree->fullname}}">
                    </div>
                    <div class="mb-3">
                        <label for="abbreviation" class="form-label">Tên viết tắt:</label>
                        <input type="text" class="form-control w-100" id="abbreviation" name="abbreviation"
                            value="{{$degree->abbreviation}}">
                    </div>
                    <div class="mb-3">
                        <label for="coeff" class="form-label">Hệ số:</label>
                        <input type="number" class="form-control w-100" id="coeff" name="coeff"
                            value="{{$degree->coeff}}" step="0.01">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-md d-flex align-items-center gap-1"
                            data-bs-dismiss="modal">
                            <ion-icon name="close-circle-outline"></ion-icon>
                            <span style="text-align:center">Đóng</span>
                        </button>
                        <button type="submit" class="btn btn-success btn-md d-flex align-items-center gap-1">
                            <ion-icon name="checkmark-circle-outline"></ion-icon>
                            <span style="text-align:center">Lưu thông tin</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>