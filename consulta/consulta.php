<?php   
    session_start();
    include('../conexion.php');

    if (isset($_POST['usuario']) && isset($_POST['contraseña']) ) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $usuario = validate($_POST['usuario']); 
    $contraseña = validate($_POST['contraseña']);

    if (empty($usuario)) {
        header("Location: index.php?error=El Usuario Es Requerido");
        exit();
    }elseif (empty($contraseña)) {
        header("Location: index.php?error=La clave Es Requerida");
        exit();
    }else{

     

        $Sql = "SELECT * FROM administrador WHERE usuario = '$usuario' AND contraseña='$contraseña'";
        $result = mysqli_query($conexion, $Sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['usuario'] === $usuario && $row['contraseña'] === $contraseña) {
                $_SESSION['usuario'] = $row['usuario'];
                
                $_SESSION['id'] = $row['id'];
                header("Location:./estudiantes.php");
                exit();
            }else {
                header("Location: index.php?error=El usuario o la clave son incorrectas");
                exit();
            }

        }else {
            header("Location: index.php?error=El usuario o la clave son incorrectas");
            exit();
        }
    }

} else {
    header("Location: index.php");
            exit();
}

