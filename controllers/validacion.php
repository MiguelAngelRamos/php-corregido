<?php

include "../includes/conexion.php"; // Incluir el archivo que realiza la conexión a la base de datos.

session_start(); // Iniciar la sesión para poder utilizar la variable $_SESSION.

// [SOLUCIÓN] Validar que los datos de POST estén establecidos y no sean nulos.
//* Verificación de datos de POST: Verificando que los datos necesarios estén presentes usando isset().
if(isset($_POST['correo']) && isset($_POST['contrasena'])){
    
    // [SOLUCIÓN] Sanitizar los datos de entrada para evitar XSS.
    $Correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $Contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);

    // [SOLUCIÓN SQLi] Utilizar consultas preparadas para evitar SQL Injection.
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE Correo = ?"); 
    $stmt->bind_param("s", $Correo);
    
    /**
        La "s" en la función bind_param de MySQLi en PHP indica el tipo de dato que se va a vincular a los marcadores de posición en la sentencia SQL. En MySQLi, los tipos de datos posibles que puedes usar son los siguientes:

        "s": cadena de caracteres (string)
        "i": número entero (integer)
        "d": número decimal (double)
        "b": blob, se enviará en paquetes (binary)
     */
    $stmt->execute(); // Ejecutar la consulta preparada.
    
    $resultado = $stmt->get_result(); // Obtener el resultado de la consulta.
    
    if($resultado->num_rows === 0) {
        // No se encontraron usuarios con ese correo.
        echo "Datos erroneos. Intentelo nuevamente!";
    } else {
        $usuario = $resultado->fetch_assoc(); // Obtener el primer usuario que coincida.
        
        // [SOLUCIÓN] Utilizar password_verify para comprobar contraseñas hasheadas.
        if(password_verify($Contrasena, $usuario['contrasena'])){
            $_SESSION['user'] = $Correo;
            header("location:../index.php");  // Redirigir al usuario al inicio.
        } else {
            echo "Datos erroneos. Intentelo nuevamente!";
        }
    }
} else {
    echo "Datos no proporcionados. Intentelo nuevamente!";
}
