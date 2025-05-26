<div class="eg-card">
    <a href="{{route('admin.affairs.show', ['code' => $data->code])}}" class="eg-link">
        <p class="h5">{{$data->code}}</p>
        <span class="h7">Start: {{$data->start}}</span>
        <br>
        <span class="h7">End: {{$data->end}}</span>
    </a>
</div>