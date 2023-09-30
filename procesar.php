<!DOCTYPE html>
<html>
<head>
    <title>Resultados</title>
</head>
<body>
    <h1>Resultados</h1>

    <?php
    // Obtén los datos enviados desde el formulario
    $cedulas = $_POST['cedula'];
    $nombres = $_POST['nombre'];
    $matematicas = $_POST['matematicas'];
    $fisica = $_POST['fisica'];
    $programacion = $_POST['programacion'];

    $numAlumnos = count($cedulas);

    // Inicializa contadores
    $promedioMatematicas = 0;
    $promedioFisica = 0;
    $promedioProgramacion = 0;
    $aprobadosMatematicas = 0;
    $aprobadosFisica = 0;
    $aprobadosProgramacion = 0;
    $reprobadosMatematicas = 0;
    $reprobadosFisica = 0;
    $reprobadosProgramacion = 0;
    $aprobadosTodas = 0;
    $aprobadosUnaSola = 0;
    $aprobadosDosMaterias = 0;
    $notaMaximaMatematicas = 0;
    $notaMaximaFisica = 0;
    $notaMaximaProgramacion = 0;

    // Calcula los resultados
    for ($i = 0; $i < $numAlumnos; $i++) {
        $promedioAlumno = ($matematicas[$i] + $fisica[$i] + $programacion[$i]) / 3;
        $promedioMatematicas += $matematicas[$i];
        $promedioFisica += $fisica[$i];
        $promedioProgramacion += $programacion[$i];

        if ($matematicas[$i] >= 9.5) {
            $aprobadosMatematicas++;
        } else {
            $reprobadosMatematicas++;
        }

        if ($fisica[$i] >= 9.5) {
            $aprobadosFisica++;
        } else {
            $reprobadosFisica++;
        }

        if ($programacion[$i] >= 9.5) {
            $aprobadosProgramacion++;
        } else {
            $reprobadosProgramacion++;
        }

        if (($matematicas[$i] >= 9.5 && $fisica[$i] < 9.5 && $programacion[$i] < 9.5) ||
        ($matematicas[$i] < 9.5 && $fisica[$i] >= 9.5 && $programacion[$i] < 9.5) ||
        ($matematicas[$i] < 9.5 && $fisica[$i] < 9.5 && $programacion[$i] >= 9.5)) {
        $aprobadosUnaSola++;
    }

        if ($matematicas[$i] >= 9.5 && $fisica[$i] >= 9.5 && $programacion[$i] >= 9.5) {
        $aprobadosTodas++;
    }


        if (($matematicas[$i] >= 9.5 && $fisica[$i] >= 9.5 && $programacion[$i] < 9.5) ||
    ($matematicas[$i] >= 9.5 && $fisica[$i] < 9.5 && $programacion[$i] >= 9.5) ||
    ($matematicas[$i] < 9.5 && $fisica[$i] >= 9.5 && $programacion[$i] >= 9.5)) {
    $aprobadosDosMaterias++;
    }


        $notaMaximaMatematicas = max($notaMaximaMatematicas, $matematicas[$i]);
        $notaMaximaFisica = max($notaMaximaFisica, $fisica[$i]);
        $notaMaximaProgramacion = max($notaMaximaProgramacion, $programacion[$i]);
    }

    // Calcula promedios
    $promedioMatematicas /= $numAlumnos;
    $promedioFisica /= $numAlumnos;
    $promedioProgramacion /= $numAlumnos;

    // Muestra los resultados
    echo "<p>Promedio de Matemáticas: $promedioMatematicas</p>";
    echo "<p>Promedio de Física: $promedioFisica</p>";
    echo "<p>Promedio de Programación: $promedioProgramacion</p>";

    echo "<p>Numero de Alumnos Aprobados en Matemáticas: $aprobadosMatematicas</p>";
    echo "<p>Numero de Alumnos Reprobados en Matemáticas: $reprobadosMatematicas</p>";
    echo "<p>Numero de Alumnos Aprobados en Física: $aprobadosFisica</p>";
    echo "<p>Numero de Alumnos Reprobados en Física: $reprobadosFisica</p>";
    echo "<p>Numero de Alumnos Aprobados en Programación: $aprobadosProgramacion</p>";
    echo "<p>Numero de Alumnos Reprobados en Programación: $reprobadosProgramacion</p>";

    echo "<p>Numero de Alumnos que Aprobaron Todas las Materias: $aprobadosTodas</p>";
    echo "<p>Numero de Alumnos que Aprobaron una Sola Materia: $aprobadosUnaSola</p>";
    echo "<p>Numero de Alumnos que Aprobaron Dos Materias: $aprobadosDosMaterias</p>";

    echo "<p>Nota Máxima en Matemáticas: $notaMaximaMatematicas</p>";
    echo "<p>Nota Máxima en Física: $notaMaximaFisica</p>";
    echo "<p>Nota Máxima en Programación: $notaMaximaProgramacion</p>";
    ?>

</body>
</html>
