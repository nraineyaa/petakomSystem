<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>


<body>
    <nav class="navbar navbar-expand-lg bg-body fixed-top">
        <div class="container">
            <a class="navbar-brand me-auto" href="/homepage">
                <img src="{{ asset('image/petakom.png') }}" alt="petakom-logo" style="width: 75px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/homepage">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('proposed.activity') }}">Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Proposal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Election</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/bulletinUserPage">Bulletin</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex ms-auto gap-3">
                <a href="{{ route('login') }}" class="btn btn-primary" type="button">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary" type="button">Register</a>
            </div>
        </div>
    </nav>

    <div style="margin-top:100px;">
        @yield('content')
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>