<!DOCTYPE html>
    <html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Index</title>

        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/footer.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/header.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/productos.css">

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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <script>
            $(document).ready(function() {
                $('#talla').val(1);
                
                // Evento cambio en tallas
                $('input[name="sizeOptions"]').change(function() {
                    var tallaSeleccionada = $('input[name="sizeOptions"]:checked').val();
                    var colorSeleccionado = $('input[name="colorOptions"]:checked').val();
                    $('#talla').val(tallaSeleccionada);
                    actualizarStock(tallaSeleccionada, colorSeleccionado);
                });

                $('#color').val(1);
                // Evento cambio en colores
                $('input[name="colorOptions"]').change(function() {
                    var tallaSeleccionada = $('input[name="sizeOptions"]:checked').val();
                    var colorSeleccionado = $('input[name="colorOptions"]:checked').val();
                    $('#color').val(colorSeleccionado);
                    actualizarStock(tallaSeleccionada, colorSeleccionado);
                });
              
              $('#vCantidad').val(1);
             function actualizarStock(talla, color) {
                $.ajax({
                    type: 'POST',
                    url: 'obtener_cantidad_disponible.php',
                    data: {
                        talla: talla,
                        color: color
                    },
                    success: function(response) {
                        var cantidadDisponible = parseInt(response);

                        var selectHTML = '<option id="cantidad" value="0" disabled selected></option>';
                        for (var i = 1; i <= cantidadDisponible; i++) {
                            selectHTML += '<option id="cantidad" value="' + i + '">' + i + '</option>';
                        }
                        console.log($('#cantidad').val())
                            // Actualizar el select con las nuevas opciones
                        $('#producto').html(selectHTML);
                        
                        $('#producto').on('change', function() {
                            var cantidadSeleccionada = $(this).val();
                            $('#vCantidad').val(cantidadSeleccionada);
                        });

                        // Actualizar el mensaje de stock disponible
                        $('#stockDisponible').text('(' + cantidadDisponible + ' en Stock)');
                         // $('#vCantidad').val(selectHTML);
                    }
                });
            }

            });
        </script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
          <header>
              <?php require_once('../header/header.php'); ?>
          </header>      
          <main class="py-3">
              <div class="body-text py-5">
                    <div class="menu-submenu" style="display: flex; justify-content: space-between;">
                        <div style="display: inline-block;">
                            <h3 style="font-weight: 800; display: inline-block;">Hoodies</h3>
                        </div>
                    </div>
                    <div class="horizontal-line"></div>
                  
                    <form action="carrito.php" method="POST">    
                    <div class="row mt-5">
                        <div class="col-lg-2 col-md-4 order-md-1 order-2 mb-3">
                            <div class="d-flex flex-column align-items-center">
                                <div><a href="../index.php" class="button-link">Regresar</a></div>
                                <?php  
                                    include('../config/dataBase.php');

                                    $consulta = "SELECT * FROM tblproductos LEFT JOIN tblImagenes ON tblproductos.idProducto = tblImagenes.idProducto LIMIT 4";
                                    $resultado = mysqli_query($conexion, $consulta);

                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($fila = mysqli_fetch_assoc($resultado)) {
                                ?>              <a href="../productos/info_producto.php?idProducto=<?php echo $fila['idProducto']?>">
                                                    <div class="border-0">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <img class="mini-img" src="../assets/image/Hoddies/<?php echo $fila['vBlancoImg']; ?>" alt="Mini Imagen" width="80%" height="auto">
                                                        </div>
                                                    </div>
                                                </a>
                                                    <?php
                                        }
                                    }
                                    mysqli_close($conexion);
                                ?>
                            </div>
                        </div>

                        <div class="vl-productos d-lg-block d-none col-lg-1 order-md-1 order-1"></div>

                        <?php 
                            include('../config/dataBase.php');
                                    
                            $idProducto = $_GET['idProducto'];
                            $consulta = "SELECT * 
                                       FROM tblproductos 
                                       LEFT JOIN tblImagenes ON tblproductos.idProducto = tblImagenes.idProducto
                                       LEFT JOIN tblproductosdescripcion ON tblproductos.idProducto = tblproductosdescripcion.idProducto
                                       WHERE tblproductos.idProducto = '$idProducto'
                                       LIMIT 1";
                            $resultado = mysqli_query($conexion, $consulta);

                            if (mysqli_num_rows($resultado) > 0) {
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                        ?>

                        <div class="col-lg-5 col-md-8 order-3">
                            <div class="border-0 bg-danger">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="../assets/image/Hoddies/<?php echo $fila['vBlancoImg'] ?>" alt="Imagen Grande" class="img-fluid" id="productImage" width="100%" height="auto">
                                    <input type="hidden" name="vImagen" value="<?php echo $fila['vBlancoImg'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 order-4">
                            <!-- Texto lateral derecho -->
                            <div class="border-0">
                                <h4 class="text-start"><?php echo $fila['vNombre']?></h4>
                                <div class="text-start"><span><?php echo$fila['vDescripcion'];?></span></div>
                                <div class="text-start mt-2">
                                    <div style="display: flex;">
                                        <?php
                                            $precioOriginal = $fila['vPrecioVenta'];
                                            $descuento = $fila['vDescuento'];
                                        ?>
                                        <input type="hidden" name="idTalla" id="talla">
                                        <input type="hidden" name="idColor" id="color">
                                        <input type="hidden" name="idProducto" value="<?php echo $fila['idProducto']; ?>">
                                        <input type="hidden" name="vCantidadSeleccionada" id="vCantidad">

                                        <?php
                                            if ($descuento > 0) {
                                                $precioConDescuento = $precioOriginal - ($precioOriginal * ($descuento / 100));
                                                echo '<div style="color: green;">$' . number_format($precioConDescuento, 2) . ' Mxn</div>&emsp;';
                                                echo '<div style="color: grey;"><del><i>' . number_format($precioOriginal, 2) . ' Mxn</i></del></div>';
                                            } else {
                                                echo '<div style="color: green;">$' . number_format($precioOriginal, 2) . ' Mxn</div>';
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div class="text-start">

                                    <?php
                                        $descuento = $fila['vDescuento'];

                                        if ($descuento > 0) {

                                            echo '<span class="badge bg-danger text-white">¡' . $descuento . '% DESCUENTO!</span><br><br>';

                                        } else {

                                            echo '<span class="badge bg-warning text-white">¡SIN DESCUENTO!</span><br><br</span><br>';

                                        }
                                    ?>

                                    <span style="color: green;"><b>Envio Gratis</b></span><br>
                                    <span style="color: grey;"><i>Lo recive 3 dias despues de su compra.</i></span><br>
                                    <span style="color: green;"><b>Devolucion</b></span><br>
                                    <span style="color: grey;"><i>Tienes 30 días desde que lo recibes.</i></span>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <span><b>Tallas Disponibles</b></span>
                                        <div class="btn-group d-flex justify-content-start w-100" role="group" aria-label="Talla options">
                                            <input type="radio" class="btn-check" name="sizeOptions" id="sizeS" value="1" autocomplete="off" required>
                                            <label class="btn btn-light btn-equal-width" for="sizeS">S</label>

                                            <input type="radio" class="btn-check" name="sizeOptions" id="sizeM" value="2" autocomplete="off" required>
                                            <label class="btn btn-light btn-equal-width" for="sizeM">M</label>

                                            <input type="radio" class="btn-check" name="sizeOptions" id="sizeL" value="3" autocomplete="off" required>
                                            <label class="btn btn-light btn-equal-width" for="sizeL">L</label>

                                            <input type="radio" class="btn-check" name="sizeOptions" id="sizeXL" value="4" autocomplete="off" required>
                                            <label class="btn btn-light btn-equal-width" for="sizeXL">XL</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <span><b>Colores Disponibles</b></span>
                                        <div class="btn-group d-flex justify-content-center" role="group" aria-label="Color options">
                                            <input type="radio" class="btn-check d-none" name="colorOptions" id="color1" value="1" autocomplete="off" required>
                                            <label class="btn-circle btn-dark m-1 mx-2" for="color1"></label>

                                            <input type="radio" class="btn-check d-none" name="colorOptions" id="color2" value="2" autocomplete="off">
                                            <label class="btn-circle btn-danger m-1 mx-2" for="color2"></label>

                                            <input type="radio" class="btn-check d-none" name="colorOptions" id="color3" value="3" autocomplete="off">
                                            <label class="btn-circle btn-success m-1 mx-2" for="color3"></label>

                                            <input type="radio" class="btn-check d-none" name="colorOptions" id="color4" value="4" autocomplete="off">
                                            <label class="btn-circle btn-warning m-1 mx-2" for="color4"></label>

                                            <input type="radio" class="btn-check d-none" name="colorOptions" id="color5" value="5" autocomplete="off">
                                            <label class="btn-circle btn-light m-1 mx-2" for="color5"></label>

                                            <input type="radio" class="btn-check d-none" name="colorOptions" id="color6" value="6" autocomplete="off">
                                            <label class="btn-circle btn-primary m-1 mx-2" for="color6"></label>
                                        </div>
                                    </div>
                                </div>

                                <?php include('../modal/modalTallas.php');?>
                                <a href="" class="badge bg-warning text-white mt-3" 
                                    style="text-decoration: none;" type="button" class="button-link" data-bs-toggle="modal" data-bs-target="#tallasModal">CONOCE TU TALLA
                                </a>
                                <div class="mt-3">
                                    <span><b>Stock Disponible</b></span><br>
                                        <label for="producto">Cantidad</label>
                                        <select id="producto" name="producto" class="border-0" required>
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                        </select>
                                    <span id="stockDisponible" style="color: grey;">( en Stock)</span>
                                </div>

                                <div class="text-start mt-5">
                                    <center>
                                        <button name="comprar" type="submit" class="button-link-large">Comprar</button><br><br>
                                        <button name="favoritos" type="submit" class="button-link-white-large">Favoritos</button>
                                    </center> 
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div style="padding: 3%;">
                        <table class="table table-responsive table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2"><h4>Otras Caracteristicas</h4></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <tr>
                                    <th scope="row">Edad</th>
                                    <td><?php echo $fila['vEdad'] ?></td>
                                </tr>
                              
                                <tr>
                                    <th scope="row">Tipo Tela</th>
                                    <td><?php echo $fila['vTipoTela'] ?></td>
                                </tr>
                              
                                <tr>
                                    <th scope="row">Genero</th>
                                    <td><?php echo $fila['vGenero'] ?></td>
                                </tr>
                              
                                <tr>
                                    <th scope="row">Año Lanzamiento</th>
                                    <td><?php echo $fila['vLanzamiento'] ?></td>
                                </tr>
                              
                                <tr>
                                    <th scope="row">Tipo Manga</th>
                                    <td><?php echo $fila['vTipoManga'] ?></td>
                                </tr>
                              
                                <tr>
                                    <th scope="row">Diseño</th>
                                    <td><?php echo $fila['vDiseño'] ?></td>
                                </tr>
                              
                                <tr>
                                    <th scope="row">Capucha</th>
                                    <td><?php echo $fila['vHoodie'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const colorOptions = document.querySelectorAll('input[name="colorOptions"]');
                            const productImage = document.getElementById('productImage');
                            
                            colorOptions.forEach((option) => {
                                option.addEventListener('change', function () {
                                    switch (this.value) {
                                        case '1':
                                            productImage.src = "../assets/image/Hoddies/<?php echo $fila['vNegroImg'] ?>";
                                            break;
                                        case '2':
                                            productImage.src = "../assets/image/Hoddies/<?php echo $fila['vRojoImg'] ?>";
                                            break;
                                        case '3':
                                            productImage.src = "../assets/image/Hoddies/<?php echo $fila['vVerdeImg'] ?>";
                                            break;
                                        case '4':
                                            productImage.src = "../assets/image/Hoddies/<?php echo $fila['vAmarilloImg'] ?>";
                                            break;
                                        case '5':
                                            productImage.src = "../assets/image/Hoddies/<?php echo $fila['vBlancoImg'] ?>";
                                            break;
                                        case '6':
                                            productImage.src = "../assets/image/Hoddies/<?php echo $fila['vAzulImg'] ?>";
                                            break;
                                        default:
                                            productImage.src = "../assets/image/Hoddies/<?php echo $fila['vBlancoImg'] ?>";
                                            break;
                                    }
                                });
                            });
                        });
                    </script>
                    <?php
                            }
                        }
                        mysqli_close($conexion);
                    ?>
                </form>
            </div>
        </main>

          <footer>
              <?php require_once('../footer/footer.php') ?>
          </footer>
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

      </body>

    </html>