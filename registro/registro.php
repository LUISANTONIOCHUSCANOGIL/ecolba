<?php
include("../conexion.php");

if(isset($_POST['register'])){
    if(
        strlen($_POST['estudiante']) >= 1 &&
        strlen($_POST['tipo_documento']) >= 1 &&
        strlen($_POST['numero_documento']) >= 1 &&
        strlen($_POST['grado']) >= 1 &&
        strlen($_POST['contraseña']) >= 1
    ){
        $nombre = trim($_POST['estudiante']);
        $tipo_documento = trim($_POST['tipo_documento']);
        $numero_documento = trim($_POST['numero_documento']);
        $grado = trim($_POST['grado']);
        $contraseña = trim($_POST['contraseña']);
        
        
        $consulta = "SELECT * FROM estudiante WHERE numero_documento = '$numero_documento'";
        $resultado_consulta = mysqli_query($conexion, $consulta);
        
        if(mysqli_num_rows($resultado_consulta) > 0) {
            echo '<script type="text/javascript">',
                 'alert("Existe un usuario con el mismo número de documento");',
                 'window.location.href = "./home.php";', 
                 '</script>';
        } else {
            
            $registro = "INSERT INTO estudiante (estudiante, tipo_documento, numero_documento, grado, contraseña)
                         VALUES('$nombre', '$tipo_documento', '$numero_documento', '$grado', '$contraseña')";
            $resultado = mysqli_query($conexion, $registro);

            if($resultado){
                echo '<script type="text/javascript">',
                     'alert("¡Tu registro se ha completado exitosamente!");',
                     'window.location.href = "../consulta/estudiantes.php";',
                     '</script>';
            } else {
                echo '<script type="text/javascript">',
                     'alert("Ocurrió un error al registrar el usuario. Por favor, intenta nuevamente.");',
                     'window.location.href = "./home.php";',
                     '</script>';
            }
        }
        
    } else {
        echo '<script type="text/javascript">',
             'alert("Por favor, llena todos los campos.");',
             'window.location.href = "./home.php";',
             '</script>';
    }
}
?>
