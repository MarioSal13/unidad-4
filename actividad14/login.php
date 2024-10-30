<?php 
    session_start();

    // Cambiar la redirección para usar la URL amigable de 'inicio'
    if (isset($_SESSION['data'])) {
        header("location: /Unidad-4R/unidad-4/actividad14/inicio");
        exit();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Form Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXhW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="https://cdn.forbes.com.mx/2020/04/b_image_2_front_track_jpg-640x360.jpg" class="img-fluid rounded" alt="Car Image">
            </div>
            <div class="col-md-6 bg-light p-4">
                <img src="/Unidad-4R/unidad-4/actividad14/img/auto-logo.png" class="img-fluid mb-4 rounded w-25" alt="Logo">
                <h1>Sign into your account</h1>
                
                <!-- Modificar el 'action' del formulario para usar la URL amigable de 'control' -->
                <form method="post" action="/Unidad-4R/unidad-4/actividad14/control">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="contrasena" required>
                    </div>

                    <input type="hidden" name="access" value="access">

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
