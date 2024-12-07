<?php
// Incluir la clase PHP para el logo
include_once 'Logo.php';

// Crear una instancia de la clase Logo con la ruta del logo
$logo = new Logo('file');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Enlazar a Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex align-items-center justify-content-center h-100">
                    <!-- Columna para imagen -->
                    <div class="col-md-8 col-lg-7 col-xl-6">
                        <!-- Cambiar la imagen a través del PHP -->
                        <img src="<?php echo $logo->getLogo(); ?>" class="img-fluid" alt="Logo Image">
                    </div>
                    <!-- Columna para el formulario de Login -->
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                        <form action="#" method="POST">
                            <!-- Email input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form1Example13">Email address</label>
                                <input type="email" id="form1Example13" class="form-control form-control-lg" required placeholder=" " />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form1Example23">Password</label>
                                <input type="password" id="form1Example23" class="form-control form-control-lg" required placeholder=" " />
                            </div>

                            <div class="d-flex justify-content-around align-items-center mb-4">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                                </div>
                                <a href="#!" class="text-decoration-none">Forgot password?</a>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </form>

                        <div class="text-center mt-3">
                            <p>Don't have an account? <a href="register.html" class="text-decoration-none">Sign up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Enlazar a Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
