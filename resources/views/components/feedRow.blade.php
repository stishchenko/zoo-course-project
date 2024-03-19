@foreach($feed->animals as $index => $animal)
    <tr>
        @if($index == 0)
            <td rowspan="{{ count($feed->animals) }}">{{ $feed->name }}</td>
            <td rowspan="{{ count($feed->animals) }}">{{ $feed->type }}</td>
            <td rowspan="{{ count($feed->animals) }}">{{ $feed->manufacturer }}</td>
            <td rowspan="{{ count($feed->animals) }}">{{ $feed->price }}</td>
            <td rowspan="{{ count($feed->animals) }}">{{ $feed->expiration_date }}</td>
            <td rowspan="{{ count($feed->animals) }}">{{ $feed->unit }}</td>
            <td rowspan="{{ count($feed->animals) }}">{{ $feed->total_amount }}</td>
        @endif
        <td>{{ $animal->species }}</td>
        <td>{{ $animal->name }}</td>
        <td>{{ $animal->pivot->portion}}</td>
    </tr>
@endforeach
