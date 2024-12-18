<?php
session_start();

// Verificar si la sesión contiene datos de usuario
if (!isset($_SESSION['data'])) {
    // Redirigir usando la URL amigable de 'login'
    header("location: /Unidad-4R/unidad-4/actividad14/login"); 
    exit;
}

// Verificar si hay datos del producto en la sesión
if (isset($_SESSION['producto'])) {
    $producto = $_SESSION['producto'];
    $imageUrl = $producto['cover'];
    $price = isset($producto['presentations'][0]['price'][0]['amount']) ? $producto['presentations'][0]['price'][0]['amount'] : 0;
    $brandName = isset($producto['brand']['name']) ? $producto['brand']['name'] : 'Sin Marca';
    $brandDescription = isset($producto['brand']['description']) ? $producto['brand']['description'] : 'Descripción no disponible';
} else {
    echo "No se encontraron datos del producto.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white vh-100 p-3 d-none d-md-block">
            <h5>Sidebar</h5>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="/Unidad-4R/unidad-4/actividad14/inicio">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white">Customers</a>
                </li>
            </ul>
            <div class="position-absolute bottom-0 p-3">
                <img src="/Unidad-4R/unidad-4/actividad14/img/Bootstrap_logo.svg.png" class="rounded-circle me-2" alt="User Image">
                <span>mdo</span>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand">Navbar Scroll</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Ejemplo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Ejemplo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled">Ejemplo</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                        <div class="dropdown ms-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                mdo
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item">Profile</a></li>
                                <li><a class="dropdown-item">Settings</a></li>
                                <li><a class="dropdown-item" href="/Unidad-4R/unidad-4/actividad14/logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Product Details -->
            <div class="container mt-2">
                <h1>Detalle del Producto</h1>

                <div class="card m-3">
                    <h5 class="card-header"><?= htmlspecialchars($producto['features']); ?></h5>
                    <div class="row p-3">
                        <div class="col-4">
                            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="<?= htmlspecialchars($imageUrl); ?>" class="d-block w-100" alt="<?= htmlspecialchars($producto['name']); ?>">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($producto['name']); ?></h5>
                                <p>Precio: $<?= number_format($price, 2); ?></p>
                                <p class="card-text"><?= htmlspecialchars($producto['description']); ?></p>
                                
                                <!-- Brand Info -->
                                <div class="brand-info mt-3">
                                    <h4>Marca: <?= htmlspecialchars($brandName); ?></h4>
                                    <p><?= htmlspecialchars($brandDescription); ?></p>
                                </div>

                                <!-- Tags Section -->
                                <div class="tags mt-3">
                                    <h5>Etiquetas:</h5>
                                    <ul class="list-unstyled">
                                        <?php foreach ($producto['tags'] as $tag): ?>
                                            <li><?= htmlspecialchars($tag['name']); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                                <a class="btn btn-primary mt-3" href="/Unidad-4R/unidad-4/actividad14/producto/<?= htmlspecialchars($producto['id']); ?>">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
