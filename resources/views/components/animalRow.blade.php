@foreach($animal->feeds as $index => $feed)
    <tr>
        @if($index == 0)
            <td rowspan="{{ count($animal->feeds) }}">{{ $animal->name }}</td>
            <td rowspan="{{ count($animal->feeds) }}">{{ $animal->species }}</td>
            <td rowspan="{{ count($animal->feeds) }}">{{ $animal->birthday }}</td>
            <td rowspan="{{ count($animal->feeds) }}">{{ $animal->gender }}</td>
            <td rowspan="{{ count($animal->feeds) }}">
                <ul>
                    @foreach($animal->employees as $employee)
                        <li>{{ $employee->job }} {{ $employee->name }} {{ $employee->surname }}</li>
                    @endforeach
                </ul>
            </td>
        @endif
        <td>{{ $feed->type }}</td>
        <td>{{ $feed->name }}</td>
        <td>{{ $feed->pivot->portion}}</td>
        @if($index == 0)
            <td rowspan="{{ count($animal->feeds) }}">
                <a href="{{ route('animalData', ['id' => $animal->id]) }}" class="link link-light">View details</a>
            </td>
        @endif
    </tr>
@endforeach
