<?php
    session_start();

    if(!isset($_SESSION['data'])){
        header("location: ../Actividad6/login.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <div class="bg-dark text-white vh-100 p-3 d-none d-md-block">
            <h5>Sidebar</h5>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active text-white" >Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" >Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" >Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" >Customers</a>
                </li>
            </ul>
            <div class="position-absolute bottom-0 p-3">
                <img src="/Actividad6/img/Bootstrap_logo.svg.png" class="rounded-circle me-2 " alt="User Image">
                <span>mdo</span>
            </div>

        </div>

        <div class="flex-grow-1">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand">Navbar scroll</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/Actividad6/index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" >Ejemplo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" >Ejemplo</a>
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
                                <li><a class="dropdown-item" >Profile</a></li>
                                <li><a class="dropdown-item" >Settings</a></li>
                                <li><a class="dropdown-item" href="../Actividad6/logOut.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container mt-2">
                <h1>Dashboard</h1>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="display-1">JD</div>
                                <h5 class="card-title">Titulo de ejemplo</h5>
                                <p class="card-text">Texto De Ejemplo</p>
                                <a class="btn btn-primary" href="/Actividad6/detalleProducto.html">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="display-1">JD</div>
                                <h5 class="card-title">Titulo de ejemplo</h5>
                                <p class="card-text">Texto De Ejemplo</p>
                                <a class="btn btn-primary"  href="/Actividad6/detalleProducto.html">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="display-1">JD</div>
                                <h5 class="card-title">Titulo de ejemplo</h5>
                                <p class="card-text">Texto De Ejemplo</p>
                                <a class="btn btn-primary" href="/Actividad6/detalleProducto.html">Go somewhere</a>
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
