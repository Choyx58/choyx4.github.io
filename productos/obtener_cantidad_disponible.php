<?php
    include('../config/dataBase.php');

    $talla = $_POST['talla'];
    $color = $_POST['color'];

    $consulta_cantidad = "SELECT cantidad FROM tblinventario WHERE idTalla = '$talla' AND idColor = '$color'";
    $resultado = mysqli_query($conexion, $consulta_cantidad);

    if ($resultado) {
        
        $fila = mysqli_fetch_assoc($resultado);
        $cantidad_disponible = $fila['cantidad'];

        // Devolver la cantidad disponible como respuesta a la llamada AJAX
        echo $cantidad_disponible;

    } else {

        echo "Error al obtener la cantidad disponible";

    }

    mysqli_close($conexion);
?>
