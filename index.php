<!DOCTYPE html>
    
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Index</title>

        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/footer.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/header.css">


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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>


    <body>

        <header>
            <?php require_once('header/header.php') ?>
        </header>
        
        <main>
            <div class="slider-container mt-5">  
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/image/bg-4.jpg" class="d-block w-100" alt="Imagen 1">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/image/bg-3.jpg" class="d-block w-100" alt="Imagen 2">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/image/bg-1.jpg" class="d-block w-100" alt="Imagen 3">
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </a>

                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </a>
                </div>
            </div>

            <div class="body-text">
                <div class="menu-submenu" style="display: flex; justify-content: space-between;">
                    <div style="display: inline-block;">
                        <h3 style="font-weight: 800; display: inline-block;">OFERTAS DE LANZAMIENTO</h3>
                    </div>
                    <div style="display: inline-block;">
                        <select id="ofertasSelect" name="ofertas" class="form-select">
                            <option  value="cbxOrdenarPor">Ordenar Por</option>
                            <option  value="cbxOrdenarMayor">Mayor Precio</option>
                            <option  value="cbxOrdernarMenor">Menor Precio</option>
                        </select>
                    </div>
                </div>

                <div class="horizontal-line"></div>
                <div class="container-fluid">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-5 m-2">
                        <?php
                            include('config/dataBase.php');

                            $consulta = "SELECT tblproductos.*, tblImagenes.*
                                         FROM tblproductos
                                         LEFT JOIN tblImagenes ON tblproductos.idProducto = tblImagenes.idProducto
                                         WHERE tblproductos.vEstado = 2";                        
                            $resultado = mysqli_query($conexion, $consulta);

                            if (mysqli_num_rows($resultado) > 0) {
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                        ?>
                        <?php include('modal/modalSelectTalla.php'); ?>
                        
                        <div class="col">
                            <a href="" class="text-decoration-none text-reset">
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
                                                $precioConDescuento = $precioOriginal - ($precioOriginal * ($descuento / 100));
                                            ?>
                                                <div style="color: green;">$<?php echo number_format($precioConDescuento, 2); ?> Mxn</div>&emsp;
                                                <div style="color: grey;"><del><i>$<?php echo number_format($precioOriginal, 2); ?> Mxn</i></del></div>
                                        </div>
                                        
                                        <span class="badge bg-danger text-white"><?php echo $fila['vDescuento']; ?>% DESCUENTO</span><br><br>
                                        <center>
                                            <a href="productos/info_producto.php?idProducto=<?php echo $fila['idProducto']?>" 
                                                type="button" class="button-link">Ver Mas</a>&emsp;
                                        </center>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                                }
                            }
                            mysqli_close($conexion);
                        ?>
                    </div>
                </div>
                <div class="horizontal-line-shirt mt-5"></div>
            </div>
        </main>

        <footer>
            <?php require_once('footer/footer.php') ?>
        </footer>
    </body>

    <script type="text/javascript">
        
    </script>

</html>