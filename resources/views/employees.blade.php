@extends('layout')

@section('title', 'Employees')

@section('content')
    <div class="container text-center">
        <table class="table table-bordered align-middle mt-3 mb-4">
            <thead>
            <tr class="align-middle">
                <th>Name</th>
                <th>Surname</th>
                <th>Birthday</th>
                <th>Department</th>
                <th>Job</th>
                <th>Animals</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($employees as $employee)
                @include('components.employeeRow', ['employee' => $employee])
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
