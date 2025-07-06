<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Edukasi Konten Digital')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4a90e2; /* A nice, friendly blue */
            --light-bg: #f0f4f8; /* A very light blue-gray */
            --card-shadow: rgba(0, 0, 0, 0.08);
            --dark-blue: #2c3e50; /* Dark slate blue for footer */
        }

        body {
            background-color: var(--light-bg);
        }
        .navbar.bg-dark {
            background-color: var(--primary-color) !important;
        }
        .footer.bg-dark {
            background-color: var(--dark-blue) !important;
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transition: background-color 0.2s;
        }
        .btn-primary:hover {
            background-color: #357ABD; /* A slightly darker blue */
            border-color: #357ABD;
        }
        .card {
            border: none;
            box-shadow: 0 2px 10px var(--card-shadow);
            transition: transform .2s, box-shadow .2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px var(--card-shadow);
        }
        .card-title a {
            color: #333;
            text-decoration: none;
        }
        .card-title a:hover {
            color: var(--primary-color);
        }
        .dropdown-item:active {
             background-color: var(--primary-color);
        }
        /* Login/Register card header */
        .card-header.bg-dark {
            background-color: #343a40 !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">EduKonten</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tips') }}">Tips</a>
                    </li>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->is_admin)
                                    <li><a class="dropdown-item" href="{{ route('admin.materi.index') }}">Admin Dashboard</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('materi.create') }}">Tambah Materi</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        @yield('content')
    </div>

    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container text-center">
            <span class="text-white">© 2025 Edukasi Konten Digital. All Rights Reserved.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
