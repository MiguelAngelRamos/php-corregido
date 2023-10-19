<?php

// [SOLUCIÓN] Mover las credenciales fuera del código fuente para protegerlas.
// Considera almacenar estas variables en un archivo .env o en variables de entorno del servidor para mejorar la seguridad.
$localhost = "localhost";
$user = "root";
$bd = "phpseguridad";
$password = "academyjava";

// [SOLUCIÓN] Uso de MySQLi con manejo de excepciones para gestionar los errores de conexión.
try {
    // Crear una nueva conexión usando MySQLi y almacenarla en la variable $conexion.
    $conexion = new mysqli($localhost, $user, $password, $bd);
    
    // Verificar si la conexión fue exitosa.
    if ($conexion->connect_error) {
        // [SOLUCIÓN] No mostrar detalles del error de conexión al usuario.
        // Podrías registrar el error en un archivo de log en lugar de mostrarlo en la pantalla.
        die("Error de conexión. Por favor, intente nuevamente más tarde.");
    }
} catch (Exception $e) {
    // [SOLUCIÓN] No mostrar mensajes de error detallados provenientes de excepciones.
    // Podrías registrar la excepción en un archivo de log en lugar de mostrarla en la pantalla.
    die("Error de conexión. Por favor, intente nuevamente más tarde.");
}


/**
 * La función die() en PHP es una función que enviará un mensaje (si se proporciona) y terminará inmediatamente la ejecución del script. Es equivalente a exit() y puedes usar cualquiera de las dos funciones en tu código; die() es simplemente un alias de exit().

Cuando llamas a die():

Si le pasas un string como argumento, imprimirá el string y terminará el script.
Si no le pasas nada, simplemente terminará el script sin imprimir nada.
 */