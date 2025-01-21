    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Catalogo</title>

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
            <?php require_once('header/header.php') ?>
        </header>

        <div class="container-banner"></div>
        <div class="body-text">
                <div class="menu-submenu">
                   <div style="display: inline-block;">
                        <h3 style="font-weight: 800; display: inline-block;" id="subir">CATALOGO DE PRODUCTOS</h3>
                    </div>
                </div>
            <div class="horizontal-line"></div>

            <form method="GET" action="">
                <div class="row">
                    <div class="col-md-12 col-sm-3 col-xs-3">
                        <input type="text" name="busquedaHoddies" placeholder="Buscador" class="form-control">
                        <br>
                    </div>

                   <div class="col-md-12 col-sm-3 col-xs-3">
                        <a href="index.php" class="button-link">Regresar</a>&emsp;
                        <input type="submit" value="Buscar" class="button-link-white">&emsp;
                   </div>
                </div>
                <br>
            </form>

                <div class="container-fluid">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-5 m-2">
                        <?php
                            include('config/dataBase.php');
                            
                            if (isset($_GET['busquedaHoddies'])) {

                            $busqueda = $_GET['busquedaHoddies'];

                            $busqueda = mysqli_real_escape_string($conexion, $busqueda);

                            $consulta = "SELECT tblproductos.*, tblImagenes.*
                                         FROM tblproductos
                                         LEFT JOIN tblImagenes ON tblproductos.idProducto = tblImagenes.idProducto
                                         WHERE tblproductos.vNombre LIKE '%$busqueda%'
                                         ORDER BY tblproductos.vNombre ASC";

                            $resultado = mysqli_query($conexion, $consulta);

                            if (mysqli_num_rows($resultado) > 0) {
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                        ?>
                        <?php include('modal/modalSelectTalla.php'); ?>
                        <div class="col">
                            <a href="#" class="text-decoration-none text-reset">
                                <div class="card h-100 border-0" id="elevating-card1">
                                        <a data-bs-toggle="modal" data-bs-target="#modalSelectTalla<?php echo $fila['idProducto']?>"
                                            type="button" class="btn btn-white" style="position: absolute; top: 10px; right: 10px;">
                                            <i class="fa-regular fa-heart" id="heart-icon"></i>
                                        </a>
                                    <div class="card-header border-0 bg-white" style="background-image: url('assets/image/Hoddies/<?php echo $fila['vBlancoImg'] ?>'); height: 448px; background-size: contain; background-repeat: no-repeat; background-position: center;">
                                    </div>
                                    <div class="card-body" style="padding: 4% 10%; position: relative;">
                                        <h6 class="card-title"><?php echo $fila['vNombre']; ?></h6>
                                        <div style="display: flex;">
                                            <?php
                                            $precioOriginal = $fila['vPrecioVenta'];
                                            $descuento = $fila['vDescuento'];

                                            if (empty($descuento) || $descuento == 0) {
                                                ?>
                                                <div style="color: green;">$<?php echo number_format($precioOriginal, 2); ?> Mxn</div>
                                                <?php
                                            } else {
                                                $precioConDescuento = $precioOriginal - ($precioOriginal * ($descuento / 100));
                                                ?>
                                                <div style="color: grey;"><del><i>$<?php echo number_format($precioOriginal, 2); ?> Mxn</i></del></div>&emsp;
                                                <div style="color: green;">$<?php echo number_format($precioConDescuento, 2); ?> Mxn</div>
                                                <?php
                                            }
                                            ?>
                                        </div>

                                        <?php
                                        if (empty($descuento) || $descuento == 0) {
                                            ?>
                                            <span class="badge bg-warning text-white">¡SIN DESCUENTO!</span><br><br>
                                            <?php
                                        } else {
                                            ?>
                                            <span class="badge bg-danger text-white"><?php echo $fila['vDescuento']; ?>% DESCUENTO</span><br><br>
                                            <?php
                                        }
                                        ?>

                                        <center>
                                            <?php include('modal/modalInfo.php'); ?>
                                            <a href="productos/info_producto.php?idProducto=<?php echo $fila['idProducto']?>" type="button" class="button-link">Ver Mas</a>&emsp;
                                        </center>
                                    </div>
                                </div>
                            </a>
                        </div> 
                        <?php
                            }
                                } else {
                                    echo "No se encontraron resultados";
                                }
                            } else {
                                $consultaInicial = "SELECT tblproductos.*, tblImagenes.*
                                         FROM tblproductos
                                         LEFT JOIN tblImagenes ON tblproductos.idProducto = tblImagenes.idProducto
                                         ORDER BY tblproductos.vNombre ASC";

                                $resultadoInicial = mysqli_query($conexion, $consultaInicial);

                                if ($resultadoInicial && mysqli_num_rows($resultadoInicial) > 0) {
                                    while ($filaInicial = mysqli_fetch_assoc($resultadoInicial)) {
                        ?>
                        <?php include('modal/modalSelectTalla.php'); ?>
                        <div class="col">
                            <a href="#" class="text-decoration-none text-reset">
                                <div class="card h-100 border-0" id="elevating-card1">
                                    <a data-bs-toggle="modal" data-bs-target="#modalSelectTalla<?php echo $fila['idProducto']?>"
                                        type="button" class="btn btn-white" style="position: absolute; top: 10px; right: 10px;">
                                        <i class="fa-regular fa-heart" id="heart-icon"></i>
                                    </a>
                                    <div class="card-header border-0 bg-white" style="background-image: url('assets/image/Hoddies/<?php echo $filaInicial['vBlancoImg'] ?>'); height: 448px; background-size: contain; background-repeat: no-repeat; background-position: center;">
                                    </div>
                                    <div class="card-body" style="padding: 4% 10%; position: relative;">
                                        <h6 class="card-title"><?php echo $filaInicial['vNombre']; ?></h6>
                                        <div style="display: flex;">
                                            <?php
                                            $precioOriginal = $filaInicial['vPrecioVenta'];
                                            $descuento = $filaInicial['vDescuento'];

                                            if (empty($descuento) || $descuento == 0) {
                                                ?>
                                                <div style="color: green;">$<?php echo number_format($precioOriginal, 2); ?> Mxn</div>
                                                <?php
                                            } else {
                                                $precioConDescuento = $precioOriginal - ($precioOriginal * ($descuento / 100));
                                                ?>
                                                <div style="color: grey;"><del><i>$<?php echo number_format($precioOriginal, 2); ?> Mxn</i></del></div>&emsp;
                                                <div style="color: green;">$<?php echo number_format($precioConDescuento, 2); ?> Mxn</div>
                                                <?php
                                            }
                                            ?>
                                        </div>

                                        <?php
                                        if (empty($descuento) || $descuento == 0) {
                                            ?>
                                            <span class="badge bg-warning text-white">¡SIN DESCUENTO!</span><br><br>
                                            <?php
                                        } else {
                                            ?>
                                            <span class="badge bg-danger text-white"><?php echo $filaInicial['vDescuento']; ?>% DESCUENTO</span><br><br>
                                            <?php
                                        }
                                        ?>

                                        <center>
                                            <?php include('modal/modalInfo.php'); ?>
                                            <a href="productos/info_producto.php?idProducto=<?php echo $filaInicial['idProducto']?>" type="button" class="button-link">Ver Mas</a>&emsp;
                                        </center>
                                    </div>
                                </div>
                            </a>
                        </div> 
                        <?php
                                    }
                                } else {
                                    
                                    echo "No hay productos disponibles";
                                }
                            }

                            mysqli_close($conexion);
                        ?>
                    </div>
                </div>
            <center>
                <a href="#subir" type="button" class="button-link">Volver Al Inicio</a>
            </center>
        </div>

        <footer>
            <?php require_once('footer/footer.php') ?>
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