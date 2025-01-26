<?php require 'config.php'; ?>
<?php include 'header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="text-center mb-4">Registro de Usuario</h2>
        <form action="register_process.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Registrarse</button>
        </form>
        <div class="mt-3 text-center">
            ¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>