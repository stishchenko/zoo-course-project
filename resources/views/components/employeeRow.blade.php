<tr>
    <td>{{ $employee->name }}</td>
    <td>{{ $employee->surname }}</td>
    <td>{{ $employee->birthday }}</td>
    <td>{{ $employee->department }}</td>
    <td>{{ $employee->job }}</td>
    <td>
        <ul>
            @foreach($employee->animals as $animal)
                <li>{{ $animal->species }} {{ $animal->name }}</li>
            @endforeach
        </ul>
    </td>
    <td>
        <a href="{{ route('employeeData', ['id' => $employee->id]) }}" class="link link-light">View details</a>
    </td>
</tr>

