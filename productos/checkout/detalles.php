<?php

require("../../config/dataBase.php");

$consulta = "SELECT * FROM tblcarrito";

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
        $vCodigo = $_POST['vCodigo'];

        $insertarConsulta = "INSERT INTO tblregistro (idCarrito, idProducto, idTalla, idColor, vImagen, vCantidad, vCodigo)
                             VALUES ('$idCarrito', '$idProducto', '$idTalla', '$idColor', '$vImagen', '$vCantidad', '$vCodigo')";

        $insercionExitosa = mysqli_query($conexion, $insertarConsulta);

        if (!$insercionExitosa) {
            echo "Error al insertar datos en la nueva tabla: " . mysqli_error($conexion);
            exit();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/footer.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/productos.css">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <header>
        <?php
        require_once("../../header/header.php");
        ?>
    </header>

    <main class="pt-4">
        <?php

        include('../../config/dataBase.php');

        $busqueda = $_GET['vCodigo'];
        $precioP = $_GET['totalPrecios'];
        //$codigoP = $_GET['vCodigo'];
        $nombreP = $_GET['vNombre'];
        $colorP = $_GET['idColor'];
        $precioVentaP = $_GET['vPrecioVenta'];
        $tallaP = $_GET['idTalla'];




        /**$consulta2 = "SELECT * FROM tblregistro WHERE vCodigo = $busqueda"; */

        /*$consulta2 = "SELECT c.*, p.*, i.*, r.*
                            FROM tblcarrito c
                                JOIN tblproductos p ON c.idProducto = p.idProducto
                                JOIN tblImagenes i ON c.idProducto = i.idProducto
                                JOIN tblregistro r ON c.idProducto = r.idProducto
                                ORDER BY c.idCarrito DESC
                                ";  */

        $consulta2 = "SELECT r.*, p.*, i.*
                    FROM tblregistro r
                        JOIN tblproductos p ON r.idProducto = p.idProducto
                        JOIN tblImagenes i ON r.idProducto = i.idProducto
                        WHERE r.vCodigo LIKE '%$busqueda%'";

        $resultado = mysqli_query($conexion, $consulta2);

        $nombreColor = 0;
        $nombreTalla = 0;

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {

                $imagenColor = '';
                switch ($fila['idColor']) {
                    case 1:
                        $imagenColor = $fila['vNegroImg'];
                        break;
                    case 2:
                        $imagenColor = $fila['vRojoImg'];
                        break;
                    case 3:
                        $imagenColor = $fila['vVerdeImg'];
                        break;
                    case 4:
                        $imagenColor = $fila['vAmarilloImg'];
                        break;
                    case 5:
                        $imagenColor = $fila['vBlancoImg'];
                        break;
                    case 6:
                        $imagenColor = $fila['vAzulImg'];
                        break;
                    default:
                        $imagenColor = '';
                }
        ?>

                <div class="body-text pt-5">
                    <h3 style="font-weight: 800; display: inline-block;">DETALLES DEL PRODUCTO&nbsp; </h3>

                    <div class="horizontal-line"></div>

                    <div class="card border-0">
                        <div class="card-body">
                            <form action="" method="POST" class="row g-3 fuenteFav bordes-Form labels-Form ">
                               
                                <div>
                                    <h3><b>Código de Compra n° <?= $fila['vCodigo'] ?></b></h3>
                                </div>
                                <div style="flex: 1; text-align:right;">
                                    <img src="../../assets/image/Hoddies/<?php echo $imagenColor; ?>" alt="Imagen Grande" class="img-fluid" id="productImage" width="350px" height="350px">
                                </div>

                                <div style="flex:1;">
                                    <div>
                                        <div class="col-md-6">
                                            <label for="" class="fs-2"><b><?= $nombreP ?></b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="Color" class="fs-5">Color: </label>
                                            <?php
                                            switch ($colorP) {
                                                case 1:
                                                    echo '<label class="btn btn-dark small-circle" for="color1"></label>';
                                                    break;
                                                case 2:
                                                    echo '<label class="btn btn-danger small-circle" for="color2"></label>';
                                                    break;
                                                case 3:
                                                    echo '<label class="btn btn-success small-circle" for="color3"></label>';
                                                    break;
                                                case 4:
                                                    echo '<label class="btn btn-warning small-circle" for="color4"></label>';
                                                    break;
                                                case 5:
                                                    echo '<label class="btn btn-ligth small-circle" for="color5"></label>';
                                                    break;
                                                case 6:
                                                    echo '<label class="btn btn-primary small-circle" for="color6"></label>';
                                                    break;
                                                default:
                                                    echo 'Otro';
                                            }
                                            ?>

                                        </div>

                                        <!-- Fila 2: Dirección - Calle, Número Exterior, Número Interior, Colonia -->
                                        <div class="col-md-3">
                                            <label for="street" class="fs-5">Talla:</label>
                                            <?php switch ($tallaP) {
                                                case 1:
                                                    echo '<b class="fs-5">S</b>';
                                                    break;
                                                case 2:
                                                    echo '<b class="fs-5">M</b>';
                                                    break;
                                                case 3:
                                                    echo '<b class="fs-5">L</b>';
                                                    break;
                                                case 4:
                                                    echo '<b class="fs-5">XL</b>';
                                                    break;
                                                default:
                                                    echo 'Otro';
                                            }  ?>
                                        </div>
                                        <div class="col-md-3">
                                            <b class="fs-5">MXN <?= $precioP ?>.00</b>
                                        </div>
                                        <div class="col-md-3">
                                            <s class="fs-5" style="color: grey;"><?= $precioVentaP ?></s>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="">Envio: <b class="text text-success"> GRATIS</b></label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="button-link" data-bs-dismiss="modal">Seguir Comprando</button>
                            </form>
                        </div>
                    </div>

                    <div class="horizontal-line"></div>

                </div>

        <?php
            }
        }
        mysqli_close($conexion);
        ?>
    </main>

    <footer>
        <?php
        require_once("../../footer/footer.php");
        ?>
    </footer>
</body>

</html>