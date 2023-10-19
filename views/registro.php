<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <!-- [SOLUCION] Asegurarse de utilizar HTTPS en producción para proteger los datos del usuario al enviarlos. -->
        <form action="../controllers/guardado.php" method="post">
            <h2 class="mb-4">Bienvenido, por favor regístrate</h2>
            
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" required>
            </div>
            
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <!-- [SOLUCION] Cambiar el tipo de input para proteger visualmente la contraseña ingresada. -->
                <input type="password" class="form-control" name="contrasena" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
