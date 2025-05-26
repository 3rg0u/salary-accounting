<div class="modal fade" id="_assignProfessor_{{$class->code}}" tabindex="-1" aria-labelledby="editInfor"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfor">Chỉ định giảng viên phụ trách</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.classes.assign', ['class' => $class->code])}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class='mb-3'>
                        <label for="prof_id" class="form-controller">Tên học phần:</label>
                        <select name="prof_id" class="form-select">
                            <option selected hidden value="">Chọn giảng viên</option>
                            @foreach($class->course->blfalculty->professors as $professor)
                                <option value="{{ $professor->pid }}">{{ $professor->fullname }}</option>
                            @endforeach
                        </select>
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