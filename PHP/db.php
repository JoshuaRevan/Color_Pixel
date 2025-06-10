
<?php
#Nombre del server
$servername = "72.167.35.127";
#Nombre de usuario
$usernamedb = "nictechcom_admin";
#Contraseña
$passworddb = "Sucegal503503";
#Nombre de la base de datos
$dbname = "nictechcom_contacto";

$nombre = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$correo = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

# Creamos la conexión
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernamedb, $passworddb);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO Alta_Costura (nombres, apellidos, telefono, correo_electronico, asunto, mensaje) VALUES (:nombre, :apellidos, :telefono, :correo, :asunto, :mensaje)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':asunto', $asunto);
    $stmt->bindParam(':mensaje', $mensaje);

    // Verifica si los campos no están vacíos antes de realizar la inserción
    if (!empty($nombre) && !empty($apellidos) && !empty($telefono) && !empty($correo) && !empty($asunto) && !empty($mensaje)) {
        $stmt->execute();
        header("Location: ../contacto.html?success=true");
        exit;
    } else {
        header("Location: ../contacto.html?success=false");
        exit;
    }    
} catch (PDOException $e) {
    echo "Error al enviar los datos: " . $e->getMessage();
}

