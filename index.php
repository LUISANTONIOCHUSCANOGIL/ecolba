<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecolba</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="./img/escudooriginal1.png" type="image/png">
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
        background-color: white!important; 
        
        /* Fondo detrás del banner y botón */
    }
    .btn {
        margin: 10px 0;
        background-color:#2ab3aa;
        color:black;

        
    }
    img.banner {
        max-width: 250px;
        height: auto;
    }
    
</style>
</head>

<body>


    <div class="container rounded shadow">
        <div class="row align-items-stretch shadow-lg p-3 mb-5 bg-body rounded">
            
                
                
            <div class="col bg-white rounded-end">
                
                <div class="text-center">
                    <img class="banner mx-auto d-block" src="./img/escudooriginal1.png"  alt="Imagen banner"  >
                </div>
                <h2 class="fw-bold text-center mt-4">BIENVENIDOS</h2>
                <h3 class="fw-normal text-center mb-4"></h3>
                
        
                <?php
                if (isset($_GET['error'])) {
                ?>
                    <p class="error alert alert-danger">
                        <?php
                        echo $_GET['error']
                        ?>

                    </p>
                <?php
                }
                ?>
               
                
                <form action="./login/conelogin.php" method="POST">
                    <a href=""></a>


                    <div class="mb-4">
                        <label for="NumeroDocumento" class="form-label">Nº. de Identificación:</label>
                        <input type="number" id="NumeroDocumento" name="NumeroDocumento" placeholder="Número de documento" class="form-control" min="0" required>
                    </div>


                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" name="contraseña" placeholder="Contraseña" class="form-control">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Iniciar Sesión</button>

                        
                        
                    </div>
                   
                    

                </form>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>