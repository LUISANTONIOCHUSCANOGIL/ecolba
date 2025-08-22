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
                    <li><a class="dropdown-item" href="index.php">Cerrar sesión</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <!--Formulario-->
                                        <h3 class="text-center font-weight-light my-4 ">
                                            RESPUESTA PRUEBA TECNICA
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="container card-body">
                                            <div class="table-responsive">
                                                <table id="#" class="table table-bordered table-hover">
                                                <thead>
                                                        <tr>
                                                            <th class="text-center">Número de Documento</th>
                                                            <th class="text-center">Nombre Estudiante</th>
                                                            <th class="text-center">Respuesta</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        // Incluye el archivo de conexión
                                                        include '../conexion.php';


                                                        

                                                        // Obtener el número de documento de la solicitud
                                                        $doc_number = isset($_GET['doc_number']) ? $_GET['doc_number'] : '';

                                                        // Prepara la consulta con o sin filtro
                                                        if ($doc_number) {
                                                            $sql = "SELECT * FROM estudiante WHERE numero_documento LIKE ?";
                                                            $stmt = $conexion->prepare($sql);
                                                            $search_term = "%" . $doc_number . "%";
                                                            $stmt->bind_param("s", $search_term);
                                                        } else {
                                                            $sql = "SELECT * FROM estudiante";
                                                            $stmt = $conexion->prepare($sql);
                                                        }

                                                        $stmt->execute();
                                                        $result = $stmt->get_result();

                                                        if ($result->num_rows > 0) {
                                                            // Muestra los datos de cada fila
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<tr>";
                                                                echo "<td class='text-center'>" . htmlspecialchars($row["numero_documento"]) . "</td>";
                                                                echo "<td class='text-center'>" . htmlspecialchars($row["estudiante"]) . "</td>";
                                                                echo "<td class='text-center'>
                                                                        <form action='reporte.php' method='get'>
                                                                            <input class='btn btn-success' value='Ver respuestas' type='submit'/>
                                                                            <input type='hidden' name='estudiante_id' value='" . htmlspecialchars($row["id"]) . "' />
                                                                        </form>
                                                                      </td>";
                                                                echo "</tr>";
                                                            }
                                                        } else {
                                                            echo "<tr><td colspan='3' class='text-center'>No se encontraron resultados</td></tr>";
                                                        }

                                                        // Cierra la conexión
                                                        $conexion->close();
                                                        ?>


                                                    </tbody>

                                                    <div class="mb-3">

                                                        <a href="../registro/home.php" target="_blank" class='btn btn-warning'> Registrar Estudiante</a>
                                                    </div>
                                                    <div class="container mb-4">
                                                        <form id="searchForm" method="GET" class="d-flex align-items-center">
                                                            <input type="text" class="form-control me-2 flex-grow-1 mb-3" name="doc_number" placeholder="Buscar por número de documento" aria-label="Buscar" value="<?php echo isset($_GET['doc_number']) ? htmlspecialchars($_GET['doc_number']) : ''; ?>">
                                                            <button class="btn btn-success me-2 mb-3" type="submit">Buscar</button>
                                                            <a href="./estudiantes.php" class="btn btn-danger mb-3">Limpiar búsqueda</a>
                                                        </form>
                                                    </div>



                                                </table>
                                            </div>
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
    
</body>

</html>