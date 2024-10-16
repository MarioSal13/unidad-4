<?php
    session_start();

    if(!isset($_SESSION['data'])){
        header("location: ../Actividad13/login.php");
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
                    <a class="nav-link active text-white" href="/Actividad6/index.html">Home</a>
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
                                <a class="nav-link active" aria-current="page" >Home</a>
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
                                <li><a class="dropdown-item" href="../Actividad13/logOut.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container mt-2">
                <h1>Detalle del producto</h1>

                <div class="card m-3">
                    <h5 class="card-header">Featured</h5>
                    <div class="row p-3">

                        <div class="col-4">
                            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                                <div class="carousel-inner">
                                  <div class="carousel-item active">
                                    <img src="https://www.gravatar.com/avatar/EMAIL_MD5?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/Lasse+Rafn/128" class="d-block w-100" alt="...">
                                  </div>
                                  <div class="carousel-item">
                                    <img src="https://www.gravatar.com/avatar/EMAIL_MD5?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/Lasse+Rafn/128" class="d-block w-100" alt="...">
                                  </div>
                                  <div class="carousel-item">
                                    <img src="https://www.gravatar.com/avatar/EMAIL_MD5?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/Lasse+Rafn/128" class="d-block w-100" alt="...">
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
                                <h5 class="card-title">Special title treatment</h5>
                                <h3>$100 MXM</h3>
                                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia doloremque, pariatur magnam modi omnis blanditiis, velit enim esse, dicta quod alias autem non voluptatibus rem error facere cum. Officia, sapiente!</p>
                                <a class="btn btn-primary"  href="">Go somewhere</a>
                            </div>
                        </div>

                    </div>


                  </div>
                  <div class="card p-2 m-3">
                    <h3>Historias de busqueda</h3>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                          </tr>
                        </tbody>
                      </table>
                  </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
