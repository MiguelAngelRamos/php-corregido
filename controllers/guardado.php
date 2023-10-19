<?php
// [SOLUCIÓN] Separación de lógica y configuración: La conexión a la base de datos está en un archivo separado, mejorando la mantenibilidad y la seguridad.
include "../includes/conexion.php";

// [SOLUCIÓN] Verificación de datos: Antes de utilizar las variables POST, se verifica que existan para evitar warnings y notices de PHP.
if(isset($_POST['correo']) && isset($_POST['contrasena'])){
    
    // [SOLUCIÓN] Validación de correo: Aseguramos que el formato del correo es correcto antes de proceder.
    if(filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)){
        
        // [SOLUCIÓN] Hashing seguro: Utilizamos password_hash con PASSWORD_DEFAULT, lo cual usa un algoritmo fuerte y seguro para almacenar las contraseñas.
        $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
        
        // [SOLUCIÓN] Generación segura de tokens: Utilizamos random_bytes en un entorno que lo soporte, para asegurar que los tokens sean fuertes y seguros.
        $cifrado = bin2hex(random_bytes(32));
        
        // [SOLUCIÓN] Uso de consultas preparadas: Preparamos la consulta SQL antes de insertar variables para prevenir inyecciones SQL.
        $guardar = $conexion->prepare("INSERT INTO usuarios (correo, contrasena, token) VALUES (?, ?, ?)");
        
        // [SOLUCIÓN] Uso de bind_param: Vinculamos los parámetros de manera segura para evitar la inyección de SQL.
        $guardar->bind_param("sss", $_POST['correo'], $contrasena, $cifrado);
        
        // [SOLUCIÓN] Ejecución segura y verificación de la consulta: Ejecutamos la consulta preparada y verificamos su estado.
        $validacion = $guardar->execute();
        
        // [SOLUCIÓN] Redirección en lugar de mensajes directos: Redirigimos a diferentes páginas dependiendo del resultado para mejorar la UX y la seguridad.
        if($validacion){
            header("Location: ../views/registro_exitoso.php"); 
        }
        else{
            header("Location: error_registro.php"); 
        }
    }
    else{
        header("Location: error_correo.php");
    }
}
else{
    header("Location: error_datos.php");
}
?>
