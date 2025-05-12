<div class="modal fade" id="_editPassword_{{$professor->id}}" tabindex="-1" aria-labelledby="editInfor"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfor">Thay đổi mật khẩu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.professor.pw-edit', ['id' => $professor->id])}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu mới:</label>
                        <input type="password" class="form-control w-100" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Xác nhận mật khẩu mới:</label>
                        <input type="password" class="form-control w-100" id="password-confirm" name="password-confirm">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-md d-flex align-items-center gap-1"
                            data-bs-dismiss="modal">
                            <ion-icon name="close-circle-outline"></ion-icon>
                            <span style="text-align:center">Đóng</span>
                        </button>
                        <button type="submit" class="btn btn-success btn-md d-flex align-items-center gap-1">
                            <ion-icon name="checkmark-circle-outline"></ion-icon>
                            <span style="text-align:center">Cập nhật</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>