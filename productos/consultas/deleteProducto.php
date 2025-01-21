<?php
    require("../../config/dataBase.php");

    if (isset($_POST["idCarrito"])) {
        $idCarrito = $_POST['idCarrito'];

        eliminarCarrito($idCarrito, $conexion); 
    }

    function eliminarCarrito($idCarrito, $conexion){
        
        $consulta = "DELETE FROM tblcarrito WHERE idCarrito = '$idCarrito'";
        
        try {

            $resultado = mysqli_query($conexion, $consulta);
            
            if ($resultado) {
                                   
            } else {

                throw new Exception("Error en la consulta: " . mysqli_error($conexion));
            }

        } catch (Exception $e) {

            echo 'Error: ' . $e->getMessage();

        }
        
        echo '<script>';
        echo 'alert("Producto Eliminado del Carrito");';
        echo 'window.location.href = "../favorito.php"';
        echo '</script>';
    }
?>

