    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Historial</title>

        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/header.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/catalogo.css">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
              rel="stylesheet" 
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
              crossorigin="anonymous">
              
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>

    </head>

    <body>

        <header>
            <?php require_once('../header/header.php') ?>
        </header>

        <div class="container-banner"></div>
        <div class="body-text">
            <div class="menu-submenu">
                <div style="display: inline-block;">
                    <h3 style="font-weight: 800; display: inline-block;" id="subir">HISTORIAL DE COMPRAS</h3>
                </div>
            </div>
            <div class="horizontal-line"></div>

            <form method="GET" action="">
                <div class="row">
                    <div class="col-md-12 col-sm-3 col-xs-3">
                        <input type="numer" name="busquedaHoddies" placeholder="Buscador" class="form-control">
                        <br>
                    </div>

                   <div class="col-md-12 col-sm-3 col-xs-3">
                        <a href="registroCompra.php" class="button-link">Regresar</a>&emsp;
                        <input type="submit" value="Buscar" class="button-link-white">&emsp;
                   </div>
                </div>
                <br>
            </form>

            <h4>Busca Tu Compra</h4>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>Nombre del Producto</th>
                                <th>Talla</th>
                                <th>Color</th>
                                <th>Imagen</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include('../config/dataBase.php');
                                $total = 0; // Inicializar el total fuera del bucle

                                if (isset($_GET['busquedaHoddies'])) {
                                $busqueda = $_GET['busquedaHoddies'];
                                $busqueda = mysqli_real_escape_string($conexion, $busqueda);          
                                $consulta = "SELECT r.*, p.*, i.*
                                FROM tblregistro r
                                    JOIN tblproductos p ON r.idProducto = p.idProducto
                                    JOIN tblImagenes i ON r.idProducto = i.idProducto
                                    WHERE r.vCodigo LIKE '%$busqueda%'";

                                $resultado = mysqli_query($conexion, $consulta);

                                if (mysqli_num_rows($resultado) > 0) {
                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                            ?>
                            <tr>
                                <td style=" vertical-align: middle !important"><?php echo $fila['vNombre']?></td>
                                <td style=" vertical-align: middle !important">
                                    <?php switch ($fila['idTalla']) {
                                    case 1: echo 'S';break;
                                    case 2: echo 'M';break;
                                    case 3: echo 'L';break;
                                    case 4: echo 'XL';break;
                                    default: echo 'Otro';
                                    } ?>
                                </td>
                                <td style=" vertical-align: middle !important">
                                    <?php  switch ($fila['idColor']) {
                                        case 1: echo '<label class="btn btn-dark small-circle" for="color1"></label>'; break;
                                        case 2: echo '<label class="btn btn-danger small-circle" for="color2"></label>';break;
                                        case 3: echo '<label class="btn btn-success small-circle" for="color3"></label>';break;
                                        case 4: echo '<label class="btn btn-warning small-circle" for="color4"></label>';break;
                                        case 5: echo '<label class="btn btn-ligth small-circle" for="color5"></label>';break;
                                        case 6: echo '<label class="btn btn-primary small-circle" for="color6"></label>';break;
                                        default: echo 'Otro';
                                            } ?>
                                </td>
                                <td style=" vertical-align: middle !important">
                                    <?php
                                        $imagenColor = '';
                                        switch ($fila['idColor']) {
                                            case 1:$imagenColor = $fila['vNegroImg'];break;
                                            case 2:$imagenColor = $fila['vRojoImg']; break;
                                            case 3:$imagenColor = $fila['vVerdeImg'];break;
                                            case 4:$imagenColor = $fila['vAmarilloImg']; break;                                    
                                            case 5:$imagenColor = $fila['vBlancoImg']; break;
                                            case 6:$imagenColor = $fila['vAzulImg'];break;
                                            default:$imagenColor = ''; 
                                        }
                                    ?>
                                    <img src="../assets/image/Hoddies/<?php echo $imagenColor; ?>"
                                        alt="Imagen Grande" class="img-fluid" id="productImage" width="100px" height="100px">
                                </td>
                                <td style=" vertical-align: middle !important"><?php echo $fila['vCantidad'] ?></td>
                                <td style=" vertical-align: middle !important">
                                    <?php 
                                        $precioOriginal = $fila['vPrecioVenta'];
                                        $descuentoPorcentaje = $fila['vDescuento'];
                                        $cantidadProductos = $fila['vCantidad'];

                                        $descuento = $precioOriginal * ($descuentoPorcentaje / 100);
                                        $PrecioDescuento = $precioOriginal - $descuento;
                                        $precioSubtotal = $cantidadProductos * $PrecioDescuento;
                                            
                                        echo "$" . $precioSubtotal . ".00 Mxn";

                                        $total += $precioSubtotal;
                                    ?>
                                </td>
                            </tr>
                            <?php
                                        }
                                    }
                                }
                                mysqli_close($conexion);
                            ?>
                            <tr>
                                <th style=" vertical-align: middle !important"><h4>Total</h4></th>
                                <th colspan="4" style=" vertical-align: middle !important"><h4></h4></th>
                                <th style=" vertical-align: middle !important">$<?php echo number_format($total, 2); ?> Mxn</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <center class="py-5">
                 <a href="../index.php" type="button" class="button-link">Volver Al Inicio</a>
            </center>
        </div>

        <footer>
            <?php require_once('../footer/footer.php') ?>
        </footer>
    </body>

    <script type="text/javascript">
        const cards = document.querySelectorAll('.elevate-card');

        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
            card.classList.add('elevate');
          });

            card.addEventListener('mouseleave', () => {
            card.classList.remove('elevate');
          });
        });
    </script>
</html>
