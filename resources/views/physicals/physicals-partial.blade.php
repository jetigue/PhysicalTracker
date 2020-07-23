@foreach($physicals as $physical)
    <li>
        <a href="{{ $physical->path() }}">
            {{ $physical->athlete->first_name }} {{ $physical->athlete->last_name }} ({{ $physical->exam_date }})
        </a>

    </li>
@endforeach
