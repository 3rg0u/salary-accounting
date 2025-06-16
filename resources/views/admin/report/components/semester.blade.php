<div class="modal fade" id="_salaries_year_{{$year->code}}" tabindex="-1" aria-labelledby="editInfor"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfor">Danh sách học kì đã mở trong năm học {{$year->code}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($year->semesters == null)
                    <p class="h3">Hiện chưa có dữ liệu để hiển thị</p>
                @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Mã học kì</th>
                                <th scope="col">Thời gian bắt đầu</th>
                                <th scope="col">Thời gian kết thúc</th>
                                <th scope="col">Tổng LHP</th>
                                <th scope="col">Tổng Lương</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($year->semesters as $semester)
                                <tr>
                                    <td>{{$semester->code}}</td>
                                    <td>{{$semester->start}}</td>
                                    <td>{{$semester->end}}</td>
                                    <td>{{$semester->openedClasses->count()}}</td>
                                    <td>{{ number_format($semester->salaries->sum('amount'), 0, ',', '.') }}₫</td>
                                    <td>
                                        <button class="btn btn-info btn-md d-flex gap-1 align-items-center"
                                            onclick="window.location.href='{{ route('admin.report.show', ['sem_code' => $semester->code])}}'">
                                            <ion-icon name="information-circle-outline"></ion-icon>
                                            <span>Xem chi tiết</span>
                                        </button>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
</div>