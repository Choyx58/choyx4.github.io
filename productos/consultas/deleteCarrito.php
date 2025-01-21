<?php
    require("../../config/dataBase.php");

    $consulta = "SELECT * FROM tblcarrito";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {

        $sqlEliminar = "DELETE FROM tblcarrito";

        if (mysqli_query($conexion, $sqlEliminar)) {
            echo "Se movieron los datos correctamente y se eliminaron todos los productos del carrito.";
            header("Location: ../../index.php");
            exit();

        } else {

            echo "Error al eliminar productos: " . mysqli_error($conexion);

        }
        
    } else {
        
        echo "Error al obtener datos de tblcarrito: " . mysqli_error($conexion);

    }
?>
