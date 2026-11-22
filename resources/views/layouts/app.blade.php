<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Kos')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #263238;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: #236b45;
            color: white;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .brand {
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 22px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .nav-links a:hover {
            color: #d5f5df;
        }

        main {
            width: 100%;
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
            flex: 1;
        }

        footer {
            background: #1d5438;
            color: white;
            text-align: center;
            padding: 18px 15px;
            margin-top: 30px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 16px 20px;
            }

            .brand {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ route('home') }}" class="brand">
            Sistem Informasi Kos
        </a>

        <div class="nav-links">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('rooms.index') }}">Data Kamar</a>
        </div>
    </nav>

        <main>
    @if (session('success'))
        <div style="background:#d1fae5; color:#065f46; padding:14px 18px; margin-bottom:20px; border:1px solid #6ee7b7; border-radius:8px;">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</main>

    <footer>
        <p>© {{ date('Y') }} Sistem Informasi Kos</p>
        <p>M. Naufal Sirajuddin | NIM 2457401024</p>
    </footer>

</body>
</html>