<?php 
    require("../../config/dataBase.php");
    
    $consulta = "SELECT * FROM tblcarritoone";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            // Obtener los valores de la fila
            $idCarrito = $fila['idCarrito'];
            $idProducto = $fila['idProducto'];
            $idTalla = $fila['idTalla'];
            $idColor = $fila['idColor'];
            $vImagen = $fila['vImagen'];
            $vCantidad = $fila['vCantidad'];
            $vCodigo = $fila['vCodigo'];

            $insertarConsulta = "INSERT INTO tblregistro (idCarrito, idProducto, idTalla, idColor, vImagen, vCantidad, vCodigo)
                                 VALUES ('$idCarrito', '$idProducto', '$idTalla', '$idColor', '$vImagen', '$vCantidad', '$vCodigo')";

            $insercionExitosa = mysqli_query($conexion, $insertarConsulta);

            if (!$insercionExitosa) { echo "Error al insertar datos en la nueva tabla: " . mysqli_error($conexion); exit(); }
        }
    }

    $sql = "DELETE FROM tblcarritoone";

    if ($conexion->query($sql) === TRUE) {
        
        echo "Se eliminaron todos los productos del carrito correctamente.";
        header("Location: ../../index.php");

    } else {
        
        echo "Error al eliminar productos: " . $conexion->error;
    }

?>