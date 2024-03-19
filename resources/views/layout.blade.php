<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

    <meta name="theme-color" content="#712cf9">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Zoo Viewer</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('animals') ? 'active' : '' }}" aria-current="page"
                       href="{{ route('animals') }}">Animals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('employees') ? 'active' : '' }}"
                       href="{{ route('employees') }}">Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('feeds') ? 'active' : '' }}"
                       href="{{ route('feeds') }}">Feeds</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container">
    <div>
        @yield('content')
    </div>
</main>

</body>
</html>
