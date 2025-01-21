<?php
    require("../config/dataBase.php");

    if(isset($_POST["favoritos"])) {

        $idProducto = $_POST['idProducto'];
        $idColor = $_POST['idColor'];
        $idTalla = $_POST['idTalla'];
        $vImagen = isset($_POST['vImagen']) ? $_POST['vImagen'] : ''; // Verificación de existencia
        $vCantidad = $_POST['vCantidadSeleccionada'];

        insertarCarrito($idProducto,$idColor,$idTalla,$vImagen,$vCantidad,$conexion);  
    
    }elseif(isset($_POST["comprar"])){

        $idProducto = $_POST['idProducto'];
        $idColor = $_POST['idColor'];
        $idTalla = $_POST['idTalla'];
        $vImagen = isset($_POST['vImagen']) ? $_POST['vImagen'] : ''; // Verificación de existencia
        $vCantidad = $_POST['vCantidadSeleccionada'];

        insertarCarritoOne($idProducto,$idColor,$idTalla,$vImagen,$vCantidad,$conexion);  
    }

    function insertarCarrito($idProducto, $idColor, $idTalla, $vImagen, $vCantidad, $conexion){
        // Consulta para verificar si la talla ya está en el carrito
        $consultaExistencia = "SELECT idTalla FROM tblcarrito WHERE idTalla = '$idTalla'";
        $resultadoExistencia = mysqli_query($conexion, $consultaExistencia);
        
        if(mysqli_num_rows($resultadoExistencia) == 0) {
            $ConsutaSQL = "INSERT INTO tblcarrito (idProducto, idColor, idTalla, vImagen, vCantidad) VALUES ('$idProducto','$idColor','$idTalla','$vImagen','$vCantidad')";
          
            try {
                $resultado = mysqli_query($conexion, $ConsutaSQL);
                if ($resultado) {
                        echo '<script>';
                        echo 'alert("Producto Añadido al Carrito");';
                        echo 'window.location.href = "favorito.php"';
                        echo '</script>';
                    exit();

                } else {

                    throw new Exception("Error en la consulta: " . mysqli_error($conexion));
                }

            } catch (Exception $e) {
                
                echo 'Error: ' . $e->getMessage();
            }
        
        } else {

            echo '<script>';
            echo 'alert("Esta Talla Ya Está Agregada al Carrito Favor de Borrar o Terminar Su Compra");';
            echo 'window.location.href = "favorito.php"';
            echo '</script>';

        }
    }



function insertarCarritoOne($idProducto, $idColor, $idTalla, $vImagen, $vCantidad, $conexion){
    // Consulta para verificar si la talla ya está en el carrito
    $consultaExistencia = "SELECT idTalla FROM tblcarritoone WHERE idTalla = '$idTalla'";
    $resultadoExistencia = mysqli_query($conexion, $consultaExistencia);
    $vCodigo = rand(10000, 99999); 

    
    if(mysqli_num_rows($resultadoExistencia) == 0) {
        $ConsutaSQL = "INSERT INTO tblcarritoone (idProducto, idColor, idTalla, vImagen, vCantidad, vCodigo) VALUES ('$idProducto','$idColor','$idTalla','$vImagen','$vCantidad','$vCodigo')";
      
        try {
            $resultado = mysqli_query($conexion, $ConsutaSQL);
            if ($resultado) {
                echo '<script>';
                echo 'alert("Producto Añadido");';
                echo 'window.location.href = "checkout/checkOutOne.php"';
                echo '</script>';
                exit();
            } else {
                throw new Exception("Error en la consulta: " . mysqli_error($conexion));
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    } else {
        echo '<script>';
        echo 'alert("Ha Ocurrido un Problema");';
        echo 'window.location.href = "../index.php"';
        echo '</script>';
    }
}



?>
