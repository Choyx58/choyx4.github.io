<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Favoritos</title>
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

        <!-- PAYPAL -->
        <script src="https://www.paypal.com/sdk/js?client-id=AZqP1ubU2m79OKZiSM4m3s1lqG3s1NffX_BW5tn-ZaDhJobBHrvyNPl9mtYnYxM1vla_0ZZg7B_XpuLu&currency=MXN"></script>
    </head>

    <body>
        <header>
            <?php
            require_once("../header/header.php");
            ?>
        </header>

        <main class="pt-4">
            <div class="body-text pt-5">
                <h3 style="font-weight: 800; display: inline-block;">MIS FAVORITOS&nbsp; </h3>

                <div class="horizontal-line"></div>
                <?php 
                
                    include('../config/dataBase.php');
                                    
                    $consulta = "SELECT c.*, p.*, i.*
                         FROM tblcarrito c
                         JOIN tblproductos p ON c.idProducto = p.idProducto
                         JOIN tblImagenes i ON c.idProducto = i.idProducto";


                    $resultado = mysqli_query($conexion, $consulta);

                    $cantidadProductos = 0;
                    $totalPrecios = 0.0;
                    $totalAhorro = 0.0;
                    $idCarrito = '$idCarrito';

                    if (mysqli_num_rows($resultado) > 0) {
                        // $cantidadProductos = mysqli_num_rows($resultado); // Utilizando el número de filas como cantidad de productos
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>
                <form action="consultas/deleteProducto.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="border-0">
                                <div class="d-flex justify-content-center align-items-center">
                                    <?php

                                        $nombreP = $fila['vNombre'];

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
                                    <img src="../assets/image/Hoddies/<?php echo $imagenColor; ?>" 
                                        alt="Imagen Grande" class="img-fluid" id="productImage" width="50%" height="auto">
                                    <input type="hidden" name="vImagen" value="<?php echo $imagenColor; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mx-5 py-5">
                                <h4 class="text-start"><?php echo $fila['vNombre']?></h4>
                                <div class="text-start"><span><?php echo $fila['vDescripcion'];?></span></div>
                                
                                <div class="d-flex">
                                    <?php
                                        $precioOriginal = $fila['vPrecioVenta'];
                                        $descuento = $fila['vDescuento'];
                                        $cantidadProductos++;
                                    
                                        if ($descuento > 0) {
                                            $cantidadProducto = $fila['vCantidad'];
                                            $precioConDescuento = $precioOriginal - ($precioOriginal * ($descuento / 100));
                                            $ahorroPorProducto = $precioOriginal - $precioConDescuento;
                                            $totalAhorro += $ahorroPorProducto * $cantidadProducto;
                                            $subtotalConDescuento = $precioConDescuento * $cantidadProducto;
                                            $totalPrecios += $subtotalConDescuento;
                                            $subtotal = $precioOriginal * $cantidadProducto;
                                    
                                            echo '<div style="color: green;">$' . number_format($subtotalConDescuento, 2) . ' Mxn</div>&emsp;';
                                            echo '<div style="color: grey;"><del><i>' . number_format($subtotal, 2) . ' Mxn</i></del></div>';
                                        } else {
                                            $cantidadProducto = $fila['vCantidad'];
                                            $totalPrecios += $precioOriginal * $cantidadProducto;
                                            $subtotal = $precioOriginal * $cantidadProducto;
                                            echo '<div style="color: green;">$' . number_format($subtotal, 2) . ' Mxn</div>';
                                        }
                                    ?>
                                        <input type="hidden" name="idTalla" id="talla">
                                        <input type="hidden" name="idColor" id="color">
                                        <input type="hidden" name="idProducto" value="<?php echo $fila['idProducto']; ?>">
                                        <input type="hidden" name="vCantidadSeleccionada" id="vCantidad">

                                </div><br>
                                    
                                <div class="text-start"><span class="badge bg-warning text-white"><?php echo $fila['vCantidad'] ?> Producto(s)</span><br></div>
                                <div class="text-start">
                                        <?php
                                            $tallaP = $fila['idTalla'];
                                            switch ($fila['idTalla']) {
                                                case 1: echo 'Talla: S';
                                                    break;
                                                case 2: echo 'Talla: M';
                                                    break;
                                                case 3: echo 'Talla: L';
                                                    break;
                                                case 4: echo 'Talla: XL';
                                                    break;
                                                default: echo 'Talla: Otro';
                                            }
                                        ?>
                                </div>
                                
                                <div class="text-start">
                                    <?php
                                        $colorP = $fila['idColor'];
                                        switch ($fila['idColor']) {
                                            case 1: echo 'Color: <label class="btn btn-dark small-circle" for="color1"></label>';    
                                                break;
                                            case 2: echo 'Color: <label class="btn btn-danger small-circle" for="color2"></label>';
                                                break;
                                            case 3: echo 'Color: <label class="btn btn-success small-circle" for="color3"></label>';
                                                break;
                                            case 4: echo 'Color: <label class="btn btn-warning small-circle" for="color4"></label>';
                                                break;
                                            case 5: echo 'Color: <label class="btn btn-ligth small-circle" for="color5"></label>';
                                                break;
                                            case 6: echo 'Color: <label class="btn btn-primary small-circle" for="color6"></label>';
                                                break;
                                            default:
                                                echo 'Color: Otro';
                                        }
                                    ?>
                                </div><br>
                                
                                <div class="d-flex">
                                    <input type="hidden" name="idCarrito" value="<?php echo $fila['idCarrito']; ?>">
                                    <h5>
                                        <span class="badge bg-dark">
                                            <button type="submit" class="border-0 bg-dark text-white" 
                                                    onclick="return confirm('¿Estás seguro de borrar este registro?')">Borrar
                                            </button>
                                        </span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
                <style>
                    .small-circle {
                            width: 20px;
                            height: 20px;
                        }
                </style>

                <?php
                        }
                    }
                    mysqli_close($conexion);
                ?>

                <h2 class="fuenteFav" style="font-weight: 800; display: inline-block;">Resumen de Compras</h2>
                <div class="horizontal-line"></div>

                <table class="table table-borderless fuenteFav " style="width: 100%; max-width: 500px; height: auto;">
                    <tr>
                        <td><span class="badge bg-dark text-white">Total (<?php echo $cantidadProductos; ?> productos):</span></td>
                        <td><b>$<?php echo number_format($totalPrecios, 2); ?></b></td>
                    </tr>
                    <tr>
                        <td><span class="badge bg-dark text-white">Total Ahorrado</span></td>
                        <td style="color: grey;"><del>$<?php echo number_format($totalAhorro, 2); ?></del></td>
                    </tr>
                    <tr>
                        <td><span class="badge bg-light text-dark">Envio:</span></td>
                        <td style="color: green;"><b>Gratis</b></td>
                    </tr>   
                    <tr>
                        <td>
                            <?php
                                $vCodigo = rand(10000, 99999); 

                                 echo '<a href="checkout/checkOut.php?cantidadProductos=' . $cantidadProductos . '&totalPrecios=' . $totalPrecios . '&vCodigo=' . $vCodigo. '&idColor=' .$imagenColor. '&idColor=' .$colorP. '&vNombre=' .$nombreP . '&vPrecioVenta=' .$precioOriginal . '&idTalla=' .$tallaP  . '" class="button-link-white">Continuar</a>';
                            ?>
                            <a href="../index.php" class="button-link">Regresar</a>
                        </td>
                    </tr>
                </table>
            </div>
        </main>
         
        <footer>
            <?php require_once("../footer/footer.php"); ?>
        </footer>
    </body>

</html>
