<?php
// Iniciar sesión al comienzo del archivo para utilizar funciones de sesión
session_start();

// Destruir la sesión para desloguear al usuario
session_destroy();

// Redirigir al usuario a la página de login
header("location:../views/login.php");

// Asegurar que el código se detiene aquí y no se ejecuta nada más después de la redirección
exit();
?>
