<div class="modal fade" id="_openNewClass" tabindex="-1" aria-labelledby="editInfor" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfor">Mở thêm lớp học phần mới</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.classes.create', ['falculty' => $falculty->abbreviation])}}" method="POST">
                    @csrf
                    <div class='mb-3'>
                        <label for="course_code" class="form-controller">Tên học phần:</label>
                        <select name="course_code" class="form-select">
                            <option selected hidden value="">Chọn học phần</option>
                            @foreach($falculty->courses as $course)
                                <option value="{{ $course->code }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cls_nums" class="form-label">Số lớp mở:</label>
                        <input type="number" class="form-control w-100" id="cls_nums" name="cls_nums">
                    </div>
                    <div class="mb-3">
                        <label for="std_nums" class="form-label">Số sinh viên mỗi lớp:</label>
                        <input type="number" class="form-control w-100" id="std_nums" name="std_nums">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-md d-flex align-items-center gap-1"
                            data-bs-dismiss="modal">
                            <ion-icon name="close-circle-outline"></ion-icon>
                            <span style="text-align:center">Đóng</span>
                        </button>
                        <button type="submit" class="btn btn-success btn-md d-flex align-items-center gap-1">
                            <ion-icon name="checkmark-circle-outline"></ion-icon>
                            <span style="text-align:center">Mở lớp</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>