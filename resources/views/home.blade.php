<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .hero {
            padding: 120px 0;
            text-align: center;
        }

        footer {
            background: #212529;
            color: white;
            text-align: center;
            padding: 15px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                Inventory App
            </a>

            <div class="navbar-nav">
                <a class="nav-link active" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('products.index') }}">Product</a>
                <a class="nav-link" href="{{ route('categories.index') }}">Category</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main>
        <div class="container hero">
            <h1 class="display-4 fw-bold">Inventory App</h1>
            
            <p class="lead">
                Selamat datang pada aplikasi inventaris sederhana Laravel.
            </p>

            <div class="mt-4">
                <a href="{{ route('products.index') }}"
                   class="btn btn-primary me-2">
                    Kelola Produk
                </a>

                <a href="{{ route('categories.index') }}"
                   class="btn btn-success">
                    Kelola Kategori
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        © 2026 Inventory App - Manajemen Informatika PNP
    </footer>

</body>
</html>