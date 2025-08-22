<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:/login.php=Acceso no autorizado. Debe iniciar sesión.");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Respuestas del Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </form>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="container">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <div class="table-responsive">
                                            <h3 class="text-center font-weight-light my-4">
                                                <?php
                                                include '../conexion.php';

                                                if (isset($_GET['estudiante_id'])) {
                                                    $estudiante_id = $_GET['estudiante_id'];                                                    
                                                    $sql = "SELECT estudiante FROM estudiante WHERE id = $estudiante_id";
                                                    $result = $conexion->query($sql);                                                   
                                                    if ($result === false) {
                                                        echo "Error en la consulta: " . $conexion->error;
                                                    } elseif ($result->num_rows > 0) {
                                                        $row = $result->fetch_assoc();
                                                        echo "Estudiante: " . $row["estudiante"];
                                                    } else {
                                                        echo "Nombre no encontrado";
                                                    }
                                                } else {
                                                    echo "Falta el parámetro estudiante_id en la URL";
                                                }
                                                ?>


                                            </h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <section id="tablaapiarios" class="table table-bordered table-hover">
                                                <div class="table-responsive">
                                                    <?php
                                                    include 'respuestaEstudiante.php';
                                                    ?>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="d-grid">
                                            <a href="estudiantes.php" class="text-center">
                                                <svg style="color:red" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                                                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>