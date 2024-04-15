<div class="card text-bg-dark border-light m-3">
    <div class="card-header">Employee Data</div>
    <div class="card-body">
        <h5 class="card-title">{{ $employee->name }} {{ $employee->surname }}</h5>
        <div class="card-text">Birthday: {{ $employee->birthday }} </div>
        <div class="card-text">Department: {{ $employee->department }} </div>
        <div class="card-text">Job: {{ $employee->job }} </div>
    </div>
</div>
