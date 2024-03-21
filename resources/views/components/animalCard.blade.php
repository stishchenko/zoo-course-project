<div class="card text-bg-dark border-light m-3">
    <div class="card-header">Animal Data</div>
    <div class="card-body">
        <h5 class="card-title">{{ $animal->name }}</h5>
        <div class="card-text">Species: {{ $animal->species }} </div>
        <div class="card-text">Birthday: {{ $animal->birthday }} </div>
        <div class="card-text">Gender: {{ $animal->gender }} </div>
    </div>
</div>
