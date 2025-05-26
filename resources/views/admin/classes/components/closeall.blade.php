<div class="modal fade" id="_dropCourse_{{$course->code}}" tabindex="-1" aria-labelledby="dropdegree"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dropdegree">Đóng học phần {{$course->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.classes.closeall', ['course' => $course->code])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="form-group">
                        <p>Bạn có chắc chắn rằng muốn đóng tất cả các lớp học phần</p>
                        <p>"{{$course->name}}" hay không?</p>
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