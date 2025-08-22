<?php
include("../../../conexion.php");

if (isset($_POST['enviar'])) {
    $campos_requeridos = [
        'estudiante_id', 'respuesta1', 'respuesta2', 'respuesta3', 'respuesta4', 'respuesta5'
    ];

    $completo = true;
    foreach ($campos_requeridos as $campo) {
        if (!isset($_POST[$campo]) || strlen(trim($_POST[$campo])) < 1) {
            $completo = false;
            break;
        }
    }

    if ($completo) {
        $estudiante_id = trim($_POST['estudiante_id']);
        $respuestas = [];
        foreach ($campos_requeridos as $campo) {
            if ($campo != 'estudiante_id') {
                $respuestas[$campo] = trim($_POST[$campo]);
            }
        }

        $respuestas_correctas = [
            'respuesta1' => 'A',
            'respuesta2' => 'C',
            'respuesta3' => 'B',
            'respuesta4' => 'A',
            'respuesta5' => 'B'
        ];

        

        $aciertos = 0;
        $feedback = [];

        foreach ($respuestas_correctas as $pregunta => $respuesta_correcta) {
            if ($respuestas[$pregunta] == $respuesta_correcta) {
                $aciertos++;
            } else {
                $feedback[] = "❌ " . ucfirst($pregunta) . ": " . $retroalimentacion[$pregunta];
            }
        }

        $total_preguntas = count($respuestas_correctas);
        $porcentaje_aciertos = ($aciertos / $total_preguntas) * 100;

        $inserte = "INSERT INTO matematicas (estudiante_id, " . implode(', ', array_keys($respuestas)) . ", porcentaje_aciertos) 
                    VALUES ('$estudiante_id', '" . implode("', '", $respuestas) . "', '$porcentaje_aciertos')";

        $resultado = mysqli_query($conexion, $inserte);

        if ($resultado) {
            ?>
            <script>
                var estudiante_id = "<?php echo $estudiante_id; ?>";
                var porcentaje_aciertos = "<?php echo $porcentaje_aciertos; ?>";
                var feedback = <?php echo json_encode($feedback); ?>;

                let message = "Porcentaje de aciertos: " + porcentaje_aciertos + "%\n\nRetroalimentación:\n";
                feedback.forEach(fb => message += fb + "\n");

                alert(message);
                window.location.href = "../../index.php?estudiante_id=" + estudiante_id;
            </script>
            <?php
            exit();
        } else {
            echo "Error: " . mysqli_error($conexion);
            echo '<h2 class="danger">Error al registrar la prueba</h2>';
        }
    } else {
        echo '<h2 class="danger">Por favor, completa todos los campos</h2>';
    }
}
?>
