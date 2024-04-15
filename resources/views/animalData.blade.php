@extends('layout')

@section('title', 'Animal Data')

@section('content')
    <div class="row mt-3">
        <a href="{{ route('animals') }}" class="link link-light"><i class="bi bi-arrow-left-short"></i>Back to
            Animals</a>
    </div>
    <div class="row">
        <div class="col-3">
            @include('components.animalCard', ['animal' => $animal])
        </div>
    </div>
    <div class="row mt-2 ms-1">
        <div class="col">
            <h4 id="toggleFeeds"><a class="link link-light">Feeds <i class="bi bi-caret-down-fill"></i></a></h4>
            <table id="feedsTable" class="table table-bordered align-middle" style="display: none;">
                <thead>
                <tr class="align-middle">
                    <th>Name</th>
                    <th>Type</th>
                    <th>Manufacturer</th>
                    <th>Expiration Date</th>
                    <th>Portion</th>
                    <th>Units</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                @foreach($animal->feeds as $feed)
                    <tr>
                        <td>{{ $feed->name }}</td>
                        <td>{{ $feed->type }}</td>
                        <td>{{ $feed->manufacturer }}</td>
                        <td>{{ $feed->expiration_date }}</td>
                        <td>{{ $feed->pivot->portion}}</td>
                        <td>{{ $feed->unit }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-2 ms-1">
        <div class="col">
            <h4 id="toggleEmployees"><a class="link link-light">Employees <i class="bi bi-caret-down-fill"></i></a></h4>
            <table id="employeesTable" class="table table-bordered align-middle" style="display: none;">
                <thead>
                <tr class="align-middle">
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Birthday</th>
                    <th>Department</th>
                    <th>Job</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                @foreach($animal->employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->surname }}</td>
                        <td>{{ $employee->birthday }}</td>
                        <td>{{ $employee->department }}</td>
                        <td>{{ $employee->job }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#toggleFeeds").click(function () {
                $("#feedsTable").slideToggle();
            });

            $("#toggleEmployees").click(function () {
                $("#employeesTable").slideToggle();
            });
        });
    </script>
@endsection
