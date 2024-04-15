@extends('layout')

@section('title', 'Animals')

@section('content')
    <div class="container text-center">
        <table class="table table-bordered align-middle mt-3 mb-4">
            <thead>
            <tr class="align-middle">
                <th rowspan="2">Name</th>
                <th rowspan="2">Species</th>
                <th rowspan="2">Birthday</th>
                <th rowspan="2">Gender</th>
                <th rowspan="2">Employees</th>
                <th colspan="5">Feeds</th>
            </tr>
            <tr>
                <th>Type</th>
                <th>Name</th>
                <th>Portion</th>
                <th rowspan="2">Animal Details</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($animals as $animal)
                @include('components.animalRow', ['animal' => $animal])
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
