<div class="modal fade" id="_editInfor_{{$falculty->abbreviation}}" tabindex="-1" aria-labelledby="editInfor"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfor">Cập nhật thông tin khoa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.falculty.edit', ['id' => $falculty->id])}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Tên đầy đủ:</label>
                        <input type="text" class="form-control w-100" id="fullname" name="fullname"
                            value="{{$falculty->fullname}}">
                    </div>
                    <div class="mb-3">
                        <label for="abbreviation" class="form-label">Tên viết tắt:</label>
                        <input type="text" class="form-control w-100" id="abbreviation" name="abbreviation"
                            value="{{$falculty->abbreviation}}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả (nếu có):</label>
                        <textarea name="description" class="form-control w-100" id="description" cols="30"
                            rows="10">{{$falculty->description}}</textarea>
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