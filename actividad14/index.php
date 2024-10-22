<?php
    session_start();

    if(!isset($_SESSION['data'])){
        header("location: ../Actividad14/login.php");
    }

    include ("getProductos.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white vh-100 p-3 d-none d-md-block position-fixed" style="width: 250px;">
            <h5>Sidebar</h5>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active text-white">Home</a>
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
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1" style="margin-left: 250px;">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand">Navbar scroll</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/Actividad14/index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Ejemplo</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- Botón Añadir -->
            <div class="container mt-3 d-flex justify-content-end">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregar">Añadir</button>
            </div>

            <!-- Tarjetas de Productos -->
            <div class="container mt-3">
                <h1>Productos</h1>
                <div class="row p-3 g-3">
                    <?php foreach ($data as $tarjeta): ?>
                        <div class="card p-1 m-2" style="width: 18rem;">
                            <img class="card-img-top" src="<?php echo $tarjeta['cover']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $tarjeta['name']; ?></h5>
                                <p class="card-text"><?php echo $tarjeta['description']; ?></p>
                                <a href="/unidad-4/actividad14/getProductSlug.php?slug=<?php echo $tarjeta['slug']; ?>" class="btn btn-primary mb-2">Go somewhere</a>
                                <div class="d-flex justify-content-between">

                                    <!-- Botón para abrir el modal de editar -->
                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditar">
                                        Editar
                                    </button>
                                    <!-- boton para eleminar un producto -->
                                    <a href="/ruta_para_eliminar.php?id=<?php echo $tarjeta['id']; ?>" class="btn btn-danger">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Añadir Producto -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalAgregarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarLabel">Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAgregar" method="POST" action="addProduct.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nameProduct" name="nameProduct" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="Slug" name="Slug" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Features</label>
                            <input type="text" class="form-control" id="feature" name="feature" required>
                        </div>

                        <input type="hidden" name="action" value="action">

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Producto -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditar" method="POST" action="/ruta_para_editar.php">
                        <input type="hidden" id="editId" name="id">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Descripción</label>
                            <textarea class="form-control" id="editDescription" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
