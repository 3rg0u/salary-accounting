<div class="modal fade" id="_editInfor_{{$professor->id}}" tabindex="-1" aria-labelledby="editInfor" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfor">Cập nhật thông tin giảng viên</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.professor.edit', ['id' => $professor->id])}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Họ và tên:</label>
                        <input type="text" class="form-control w-100" id="fullname" name="fullname"
                            value="{{$professor->fullname}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control w-100" id="email" name="email"
                            value="{{$professor->email}}">
                    </div>
                    <div class='mb-3'>
                        <label for="falculty" class="form-controller">Khoa:</label>
                        <select name="falculty" class="form-select">
                            @foreach($falculties as $falculty)
                                @if ($falculty == $professor->falculty)
                                    <option value="{{ $falculty }}" selected>{{ $falculty }}</option>

                                @else

                                    <option value="{{ $falculty }}">{{ $falculty }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class='mb-3'>
                        <label for="falculty" class="form-controller">Học vị:</label>
                        <select name="refs" class="form-select">
                            @foreach($references as $refs)
                                @if ($refs == $professor->refs)
                                    <option value="{{ $refs }}" selected>{{ $refs }}</option>

                                @else

                                    <option value="{{ $refs }}">{{ $refs }}</option>
                                @endif
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