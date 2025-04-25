<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'DogTinder' }}</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (ícones) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

    <!-- CSS custom (opcional via Vite) -->
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>
<body class="bg-dark text-white">

    <nav class="navbar navbar-expand-lg navbar-dark bg-black shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/login') }}">
                <img src="https://storage.googleapis.com/a1aa/image/UuRBK8Jz9QjwgI83lJIH6NrjbLfMifKoXWmO36XPshg.jpg" alt="Logo" width="40" class="me-2">
                <strong>Cão-Panheiro</strong>
            </a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link">Produtos</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Saiba mais</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Segurança</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Suporte</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Download</a></li>
                    <li class="nav-item"><a href="{{ route('login') }}" class="btn btn-light text-dark ms-3">Entrar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        @yield('content')
    </main>

    <footer class="text-center text-muted py-4">
        <small>Todas as fotos são de modelos usadas apenas para fins ilustrativos</small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
