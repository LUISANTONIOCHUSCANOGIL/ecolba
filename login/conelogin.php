<?php
session_start();
include '../conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $numeroDocumento = $_POST['NumeroDocumento'];
    $password = $_POST['contraseña'];

   
    if (empty($numeroDocumento) || empty($password)) {
        header("Location: login.php?error=Todos los campos son requeridos");
        exit();
    }

   
    $sql = "SELECT * FROM estudiante WHERE numero_documento = ? AND contraseña = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("is", $numeroDocumento, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['estudiante'] = $row['estudiante'];
        header("Location: ../layoutAdmin/index.php?id=" . $_SESSION['user_id']);

        exit();
    } else {
        header("Location:../index.php?error=Credenciales incorrectas");
        exit();
    }
} else {
    header("Location:../index.php");
    exit();
}
?>