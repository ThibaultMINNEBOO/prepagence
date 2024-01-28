<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | PrepAgence</title>
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">PrepAgence</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            @php
            $route = request()->route()->getName();
            @endphp

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{ route('property.index') }}" @class(["nav-link", 'active' => str_contains($route, 'property.')])>Biens</a>
                    </li>
                </ul>

                <div class="ms-auto">
                    <ul class="navbar-nav gap-2">
                        @auth
                            <li class="nav-item">
                                <a href="{{ route('admin.property.index') }}" class="nav-link">Administration</a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">Se déconnecter</button>
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
</body>
</html>
