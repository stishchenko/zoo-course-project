@extends('layout')

@section('title', 'Feeds')

@section('content')
    <div class="container text-center">
        <table class="table table-bordered align-middle mt-3 mb-4">
            <thead>
            <tr class="align-middle">
                <th rowspan="2">Name</th>
                <th rowspan="2">Type</th>
                <th rowspan="2">Manufacturer</th>
                <th rowspan="2">Price</th>
                <th rowspan="2">Expiration Date</th>
                <th rowspan="2">Units</th>
                <th rowspan="2">Total Amount</th>
                <th colspan="5">Animals</th>
            </tr>
            <tr>
                <th>Species</th>
                <th>Name</th>
                <th>Portion</th>
                <th rowspan="2">Feed Details</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($feeds as $feed)
                @include('components.feedRow', ['feed' => $feed])
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
