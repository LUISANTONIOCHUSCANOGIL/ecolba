<?php
include '../conexion.php';

header('Content-Type: text/html; charset=utf-8');



$respuestas_correctas = [
    'respuesta1' => 'A',
    'respuesta2' => 'C',
    'respuesta3' => 'B',
    'respuesta4' => 'A',
    'respuesta5' => 'B'
];

if (isset($_GET['estudiante_id'])) {
    $estudiante_id = intval($_GET['estudiante_id']);

    $sql = "SELECT porcentaje_aciertos, respuesta1, respuesta2, respuesta3, respuesta4, respuesta5 FROM matematicas WHERE estudiante_id = $estudiante_id";
    $result = $conexion->query($sql);

    if ($result && $result->num_rows > 0) {
        $respuestasEstudiante = $result->fetch_assoc();
        $porcentaje_aciertos = $respuestasEstudiante['porcentaje_aciertos'];

        echo "<h3>Resultados del examen:</h3>";
        echo "<p>Porcentaje de aciertos: $porcentaje_aciertos%</p>";

        if ($porcentaje_aciertos >= 90) {
            echo "<p><strong>Calificación:</strong> Excelente ✅</p>";
        } elseif ($porcentaje_aciertos >= 70) {
            echo "<p><strong>Calificación:</strong> Bueno 👍</p>";
        } else {
            echo "<p><strong>Calificación:</strong> Necesita mejorar ⚠️</p>";
        }

        echo "<h3>Respuestas del estudiante:</h3><ul>";
        $correctas = 0;
        $incorrectas = 0;

        foreach ($respuestas_correctas as $pregunta => $respuesta_correcta) {
            $respuesta_estudiante = $respuestasEstudiante[$pregunta];
            $estado = ($respuesta_estudiante == $respuesta_correcta) ? '✅ Correcta' : '❌ Incorrecta';
            echo "<li>$pregunta: $respuesta_estudiante ($estado)</li>";
            $respuesta_estudiante == $respuesta_correcta ? $correctas++ : $incorrectas++;
        }
        echo "</ul>";

        echo "<h3>Resumen de respuestas:</h3>";
        echo "<div style='display: flex; gap: 20px;'>";
        echo "<p>✔️ Correctas: $correctas</p>";
        echo "<p>❌ Incorrectas: $incorrectas</p>";
        echo "</div>";

        $descriptorSpec = [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w']
        ];

        if ($porcentaje_aciertos < 100) {
            $respuestas = json_encode([
                'respuesta1' => $respuestasEstudiante['respuesta1'],
                'respuesta2' => $respuestasEstudiante['respuesta2'],
                'respuesta3' => $respuestasEstudiante['respuesta3'],
                'respuesta4' => $respuestasEstudiante['respuesta4'],
                'respuesta5' => $respuestasEstudiante['respuesta5']
            ]);

            

            



         

            if (is_resource($process)) {
                fwrite($pipes[0], $respuestas);
                fclose($pipes[0]);

                $output = stream_get_contents($pipes[1]);
                fclose($pipes[1]);

                $errorOutput = stream_get_contents($pipes[2]);
                fclose($pipes[2]);

                proc_close($process);

                $preguntas_ia = json_decode(trim($output), true);

                if (!empty($preguntas_ia['preguntas'])) {
                    echo "<h3>Preguntas Generadas por IA:</h3>";

                    foreach ($preguntas_ia['preguntas'] as $pregunta) {
                        $texto = $pregunta['texto'] ?? 'Pregunta no disponible';
                        $opciones = $pregunta['opciones'] ?? [];
                        $respuesta_correcta = $pregunta['respuesta_correcta'] ?? 'No disponible';

                        echo "<p><strong>$texto</strong></p>";
                        foreach (['A', 'B', 'C', 'D'] as $opcion) {
                            $opcion_texto = $opciones[$opcion] ?? "$opcion) Opción no disponible";
                            echo "<p>$opcion) $opcion_texto</p>";
                        }
                        echo "<p><strong>Respuesta correcta:</strong> $respuesta_correcta</p>";
                    }
                } else {
                    echo "<p>No se generaron preguntas adicionales.</p>";
                }
            } else {
                echo "<p>Error al ejecutar el script de generación de preguntas.</p>";
            }
        } else {
            echo "<p>¡Felicidades! Has obtenido un puntaje perfecto. 🎉 Sigue así.</p>";
        }
    } else {
        echo "<p>No se encontraron resultados para el estudiante.</p>";
    }
} else {
    echo "<p>No se proporcionó el parámetro estudiante_id.</p>";
}


$conexion->close();
