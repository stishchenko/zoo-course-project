@extends('layout')

@section('title', 'Employee Data')

@section('content')
    <div class="row mt-3">
        <a href="{{ route('employees') }}" class="link link-light"><i class="bi bi-arrow-left-short"></i>Back to
            Employees</a>
    </div>
    <div class="row">
        <div class="col-3">
            @include('components.employeeCard', ['employee' => $employee])
        </div>
    </div>
    <div class="row mt-2 ms-1">
        <div class="col">
            <h4 id="toggleAnimals"><a class="link link-light">Animals <i class="bi bi-caret-down-fill"></i></a></h4>
            <table id="animalsTable" class="table table-bordered align-middle" style="display: none;">
                <thead>
                <tr class="align-middle">
                    <th>Name</th>
                    <th>Species</th>
                    <th>Birthday</th>
                    <th>Gender</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                @foreach($employee->animals as $animal)
                    <tr>
                        <td>{{ $animal->name }}</td>
                        <td>{{ $animal->species }}</td>
                        <td>{{ $animal->birthday }}</td>
                        <td>{{ $animal->gender }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#toggleAnimals").click(function () {
                $("#animalsTable").slideToggle();
            });

        });
    </script>
@endsection
