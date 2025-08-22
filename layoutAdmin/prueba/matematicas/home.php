<?php
session_start();
if (!isset($_SESSION['estudiante'])) {
    header("Location:/login.php=Acceso no autorizado. Debe iniciar sesión.");
    exit();
}


?>
<!DOCTYPE html>
<html lang="es">
<a href=""></a>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ecolba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .btn-fixed-width {
            min-width: 150px;

        }
    </style>
</head>


<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../../../index.php">Cerrar sesión</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">

                                    <h3 class="text-center font-weight-light my-4 ">
                                        PRUEBA MATEMATICAS
                                    </h3>
                                </div>
                                <div class="card-body">

                                    <?php
                                    include "matematica.php";


                                    if (isset($_GET['estudiante_id'])) {
                                        $estudiante_id = $_GET['estudiante_id'];
                                    } else {

                                        $estudiante_id = 'error con acceder a estudiante_id';
                                    }
                                    ?>

                                    <form action="home.php" method="post">

                                        <div>
                                            <input type='hidden' name='estudiante_id' value="<?php echo $estudiante_id; ?>" />
                                        </div>

                                        <div class="mb-3">
                                             <!-- Sección de Matemáticas -->
           

                <!-- Pregunta 1 -->
                <div class="question">
                    <p>1. Una persona que vive en Colombia tiene inversiones en dólares en Estados Unidos, y sabe que
la tasa de cambio del dólar respecto al peso colombiano se mantendrá constante este mes, siendo 1 dólar equivalente a 2.000 pesos colombianos y que su inversión, en dólares, le dará ganancias del 3 % en el mismo periodo. Un amigo le asegura que en pesos sus ganancias también serán del 3 %.
La afirmación de su amigo es</p>
                 
                    <div class="options">
                        <label><input type="radio" name="question1" value="a"> correcta, pues, sin importar las variaciones en la tasa de cambio, la proporción en que aumenta la inversión en dólares es la misma que en pesos</label>
                        <label><input type="radio" name="question1" value="b"> incorrecta, pues debería conocerse el valor exacto de la inversión para poder calcular la
cantidad de dinero que ganará.</label>
                        <label><input type="radio" name="question1" value="c"> correcta, pues el 3 % representa una proporción fija en cualquiera de las dos monedas,
puesto que la tasa de cambio permanecerá constante</label>
                        <label><input type="radio" name="question1" value="d"> incorrecta, pues el 3 % representa un incremento, que será mayor en pesos colombianos,
pues en esta moneda cada dólar representa un valor 2.000 veces mayor.</label>
                    </div>
                </div>

                <div class="question">
                    <p>2.¿Qué número viene después del 8?</p>
                    <img src="grafico_manzanas1.png" alt="Gráfico de manzanas" class="question-image">
                    <div class="options">
                        <label><input type="radio" name="question1" value="a"> 7</label>
                        <label><input type="radio" name="question1" value="b"> 9</label>
                        <label><input type="radio" name="question1" value="c"> 10</label>
                        <label><input type="radio" name="question1" value="d"> 8</label>
                    </div>
                </div>
                                        </div>


                                        <div class="modal-footer justify-content-center ">
                                            <input class="btn btn-success " type="submit" name="enviar" value="Enviar">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>