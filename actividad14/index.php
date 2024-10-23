<?php
    session_start();

    if (!isset($_SESSION['data'])) {
        header("location: ../Actividad14/login.php");
    }

    include("getProductos.php");
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="d-flex">
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
        <div class="flex-grow-1" style="margin-left: 250px;">
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

                        <div class="dropdown ms-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                mdo
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item">Profile</a></li>
                                <li><a class="dropdown-item">Settings</a></li>
                                <li><a class="dropdown-item" href="../Actividad14/logOut.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
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
                                    <button
                                        class="btn btn-warning btn-editar"
                                        data-id="<?php echo $tarjeta['id']; ?>"
                                        data-name="<?php echo $tarjeta['name']; ?>"
                                        data-slug="<?php echo $tarjeta['slug']; ?>"
                                        data-description="<?php echo $tarjeta['description']; ?>"
                                        data-feature="<?php echo isset($tarjeta['features']) ? $tarjeta['features'] : ''; ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditar">
                                        Editar
                                    </button>

                                    <button
                                        onclick="eliminar(<?php echo $tarjeta['id']; ?>)"
                                        class="btn btn-danger">
                                        Eliminar
                                    </button>

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
                    <form id="formAgregar" method="POST" action="productController.php">
                        <div class="mb-3">
                            <label for="nameProduct" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nameProduct" name="nameProduct" required>
                        </div>
                        <div class="mb-3">
                            <label for="Slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="Slug" name="Slug" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="feature" class="form-label">Features</label>
                            <input type="text" class="form-control" id="feature" name="feature" required>
                        </div>

                        <input type="hidden" name="action" value="add">
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
                    <form id="formEditar" method="POST" action="productController.php">
                        <div class="mb-3">
                            <label for="nameEditar" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nameEditar" name="nameEditar" required>
                        </div>
                        <div class="mb-3">
                            <label for="slugEditar" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slugEditar" name="slugEditar" required>
                        </div>
                        <div class="mb-3">
                            <label for="descriptionEditar" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descriptionEditar" name="descriptionEditar" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="featureEditar" class="form-label">Features</label>
                            <input type="text" class="form-control" id="featureEditar" name="featureEditar" required>
                        </div>

                        <input type="hidden" id="productId" name="productId">
                        <input type="hidden" name="action" value="update">

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal para eliminar Producto -->
        <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalAgregarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="formEliminar" method="POST" action="productController.php">

                        <input type="hidden" id="eliminarProductId" name="eliminarProductId">
                        <input type="hidden" name="action" value="delete">

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnsEditar = document.querySelectorAll('.btn-editar');

            btnsEditar.forEach(btn => {
                btn.addEventListener('click', () => {
                    const id = btn.getAttribute('data-id');
                    const name = btn.getAttribute('data-name');
                    const slug = btn.getAttribute('data-slug');
                    const description = btn.getAttribute('data-description');
                    const feature = btn.getAttribute('data-feature');


                    document.getElementById('productId').value = id;
                    document.getElementById('nameEditar').value = name;
                    document.getElementById('slugEditar').value = slug;
                    document.getElementById('descriptionEditar').value = description;
                    document.getElementById('featureEditar').value = feature;
                });
            });
        });
    </script>

    <script>

        function eliminar(id){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    
                    document.getElementById('eliminarProductId').value = id;
                    document.getElementById('formEliminar').submit();

                    swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                    });
                }
                });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
