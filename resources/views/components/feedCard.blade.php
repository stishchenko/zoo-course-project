<div class="card text-bg-dark border-light m-3">
    <div class="card-header">Feed Data</div>
    <div class="card-body">
        <h5 class="card-title">{{ $feed->name }}</h5>
        <div class="card-text">Type: {{ $feed->type }} </div>
        <div class="card-text">Manufacturer: {{ $feed->manufacturer }} </div>
        <div class="card-text">Price: {{ $feed->price }} </div>
        <div class="card-text">Expiration date: {{ $feed->expiration_date }} </div>
        <div class="card-text">Unit: {{ $feed->unit }} </div>
        <div class="card-text">Total amount: {{ $feed->total_amount }} </div>
    </div>
</div>
