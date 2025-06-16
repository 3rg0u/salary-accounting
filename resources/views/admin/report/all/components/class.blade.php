<div class="modal fade" id="_classes_prof_{{$prof_id}}" tabindex="-1" aria-labelledby="editInfor" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfor">Danh sách lớp phụ trách bởi {{$prof_id}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($classes->count() == null)
                    <p class="h3">Hiện chưa có dữ liệu để hiển thị.</p>
                @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Mã lớp</th>
                                <th scope="col">Tên môn</th>
                                <th scope="col">Số sinh viên</th>
                                <th scope="col">Lương giảng dạy</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                                <tr>
                                    <td>{{$class->cls_code}}</td>
                                    <td>{{$class->class->course->name}}</td>
                                    <td>{{$class->class->std_nums}}</td>
                                    <td>{{ number_format($class->amount, 0, ',', '.') }}₫</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
</div>