<div class="modal fade" id="_dropInfor_{{$professor->pid}}" tabindex="-1" aria-labelledby="dropprofessor"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dropprofessor">Xóa thông tin giảng viên</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.professor.delete', ['id' => $professor->pid])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="form-group">
                        <p>Bạn có chắc chắn muốn xóa bỏ giảng viên</p>
                        <p>"{{$professor->fullname}}" hay không?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-md d-flex align-items-center gap-1">
                            <ion-icon name="checkmark-circle-outline"></ion-icon>
                            <span style="text-align:center">Xác nhận</span>
                        </button>
                        <button type="button" class="btn btn-info btn-md d-flex align-items-center gap-1"
                            data-bs-dismiss="modal">
                            <ion-icon name="close-circle-outline"></ion-icon>
                            <span style="text-align:center">Hủy</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>