@extends('layout')

@section('title', 'Feed Data')

@section('content')
    <div class="row mt-3">
        <a href="{{ route('feeds') }}" class="link link-light"><i class="bi bi-arrow-left-short"></i>Back to
            Feeds</a>
    </div>
    <div class="row">
        <div class="col-3">
            @include('components.feedCard', ['feed' => $feed])
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
                    <th>Portion</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                @foreach($feed->animals as $animal)
                    <tr>
                        <td>{{ $animal->name }}</td>
                        <td>{{ $animal->species }}</td>
                        <td>{{ $animal->birthday }}</td>
                        <td>{{ $animal->gender }}</td>
                        <td>{{ $animal->pivot->portion }}</td>
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
