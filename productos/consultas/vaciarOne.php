<?php 
    require("../../config/dataBase.php");

    $sql = "DELETE FROM tblcarritoone";

    if ($conexion->query($sql) === TRUE) {

        echo "Se eliminaron todos los productos del carrito correctamente.";

            header("Location: ../../index.php");
            
    } else {
        
        echo "Error al eliminar productos: " . $conexion->error;
    }

?>