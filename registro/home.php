<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:/login.php=Acceso no autorizado. Debe iniciar sesión.");
    exit();
}
?>
<a href=""></a>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecolba</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="../img/escudooriginal1.png" type="image/png">
    <style>
        
    body {
        margin: 0;
        padding: 0;
        background-color:rgb(228, 226, 226); /* Fondo general si lo necesitas */
    }
    .container {
        max-width: 600px;
        margin: 5% auto;
        padding: 20px;
        background-color: white; /* Fondo blanco para el contenido */
    }
    .row {
        margin: 0;
        padding: 0;
        
        border-radius: 8px;
    }
    .col {
        padding: 20px;
        background-color: white!important; /* Fondo detrás del banner y botón */
    }
    .btn {
        margin: 10px 0;
        background-color:#2ab3aa;
        color:rgb(26, 25, 25);

        
    }
    img.banner {
        max-width: 100%;
        height: auto;
    }
</style>
   
</head>
<?php
include("registro.php");
?>

<body>
    <div class="container rounded shadow">
        <div class="row align-items-stretch shadow-lg p-3 mb-5 bg-body rounded">
            <div class="col bg-white rounded-end">
            <div class="text-end">
                    <img src="../img/escudooriginal1.png" width="150" alt="Logo" />
                </div>

                <h2 class="fw-bold text-center mt-4">REGISTRO ESTUDIANTES</h2>
                
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label for="text" class="form-label">Nombre:</label>
                        <input type="text" name="estudiante" placeholder="Nombre completo" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="inputState" class="form-label">Tipo documento:</label>
                        <select id="inputState" name="tipo_documento" class="form-select form-control">
                            <option selected disabled>Seleccione un tipo documento</option>
                            <option>Cédula de ciudadanía</option>
                            <option>Tarjeta de identidad</option>
                            <option>Documento extranjería</option>
                        </select>
                      
                    </div>
                    <div class="mb-4">
                        <label for="NumeroDocumento" class="form-label">Número documento:</label>
                        <input type="number" id="numero_documento" name="numero_documento" placeholder="Número de documento" class="form-control" min="0" required>
                    </div>
                    <div class="mb-4">
                        <label for="inputState" class="form-label">Grado:</label>
                        <select id="inputState" name="grado" class="form-select form-control">
                            <option selected disabled>Seleccione un grado</option>
                            
                           
                            <!-- Grado 11 -->
                            <option>11:A</option>
                            <option>11:B</option>
                            <option>11:C</option>
                            <option>11:D</option>
                            <option>11:E</option>

                            <hr>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña:</label>
                        <div class="input-group">
                            <input type="password" id="password" name="contraseña" placeholder="Ingrese una contraseña" class="form-control">
                            <span class="toggle-password" onclick="togglePasswordVisibility()">👁️</span>
                        </div>
                    </div>
                    <div class="d-grid">
                        <input class="btn btn-dark" type="submit" name="register" value="Registrar">
                        <a href="../consulta/estudiantes.php" class="text-center "><svg style="color:red" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1" />
                            </svg></a>
                            <a href=""></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="responseModalLabel">Mensaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="responseMessage">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="location.href='../index.php'">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>

    <script>

        
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const togglePassword = document.querySelector('.toggle-password');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePassword.textContent = '🙈'; 
            } else {
                passwordInput.type = 'password';
                togglePassword.textContent = '👁️'; 
            }
        }
    </script>
</body>

</html>