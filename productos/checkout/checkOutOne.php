<?php

 require("../../config/dataBase.php");

?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Finalizar Compra</title>
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
            require_once("../../header/header.php");
            ?>
        </header>

        <main class="pt-4">
            <div class="body-text pt-5">
                <h3 style="font-weight: 800; display: inline-block;">DETALLES DE ENVIO&nbsp; </h3>

                <div class="horizontal-line"></div>

                <!-- FORMULARIO DETALLES -->
                <div class="card border-0">
                    <div class="card-body">
                        <form action="#" method="POST" class="row g-3 fuenteFav bordes-Form labels-Form ">
                            <!-- Fila 1: Quien Recibe, Nombres y Apellidos -->
                            <div>
                                <h3><b>Quien Recibe</b></h3>
                            </div>
                            <div class="col-md-6">
                                <label for="lname" class="form-label">Nombres</label>
                                <input type="text" id="lname" name="lname" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" id="apellidos" name="apellidos" class="form-control" required>
                            </div>

                            <!-- Fila 2: Dirección - Calle, Número Exterior, Número Interior, Colonia -->
                            <div>
                                <h3><b>Dirección</b></h3>
                            </div>
                            <div class="col-md-3">
                                <label for="street" class="form-label">Calle</label>
                                <input type="text" id="street" name="street" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label for="street" class="form-label">Numero Exterior</label>
                                <input type="text" id="street" name="street" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label for="street" class="form-label">Numero Interior</label>
                                <input type="text" id="street" name="street" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="colony" class="form-label">Colonia</label>
                                <input type="text" id="colony" name="colony" class="form-control" required>
                            </div>

                            <!-- Fila 3: C.P y Teléfono -->
                            <div class="col-md-2">
                                <label for="zip" class="form-label">C.P</label>
                                <input type="text" id="zip" name="zip" class="form-control" required>
                            </div>
                            <div class="col-md-2">
                                <label for="phone" class="form-label">Teléfono</label>
                                <input type="text" id="phone" name="phone" class="form-control" required>
                            </div>

                            <div class="col-12">
                                <!-- <input type="submit" value="Guardar Datos" class="button-link"> -->
                            </div>
                        </form>
                    </div>
                </div>

                <div class="horizontal-line"></div>
                    <?php 
                    
                        include('../../config/dataBase.php');
                                        
                        $consulta = "SELECT c.*, p.*, i.*
                                    FROM tblcarritoone c
                                    JOIN tblproductos p ON c.idProducto = p.idProducto
                                    JOIN tblImagenes i ON c.idProducto = i.idProducto
                                    ORDER BY c.idCarrito DESC
                                    LIMIT 1";


                        $resultado = mysqli_query($conexion, $consulta);


                        if (mysqli_num_rows($resultado) > 0) {
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                    ?>
                <div class="row g-2">
                <h3 style="font-weight: 800; display: inline-block;">METODOS DE PAGO&nbsp; </h3>
                        <span class="badge bg-dark text-white "><h4>Codigo de Compra:<?php echo $fila['vCodigo']?></h4></span>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="pt-5 ms-5">
                                        <div class="row justify-content-center">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-center">
                                                <span class="m-3">
                                                    <img class="img-fluid d-block mx-auto" src="../../assets/image/acc/paypal.png" alt="PAYPAL" style="max-width: 100px; height: auto;">
                                                </span>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-center">
                                                <span class="m-3">
                                                    <img class="img-fluid d-block mx-auto" src="../../assets/image/acc/visa.png" alt="VISA" style="max-width: 100px; height: auto;">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card float-end border-0" style="width: 100%; max-width: 500px; height: auto;">
                                <div class="card-body">
                                    <div class="table-resposive">
                                        <table class="table table-borderless fuenteFav" style="width: 100%; max-width: 500px; height: auto;">
                                            <tr>
                                                <td><b>Cantidad</b></td>
                                                <td><b><?php echo $fila['vCantidad'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <?php
                                                    $precioVenta = $fila['vPrecioVenta'];
                                                    $descuentoPorcentaje = $fila['vDescuento'];
                                                    $cantidadProductos = $fila['vCantidad'];

                                                    $descuentoDecimal = $descuentoPorcentaje / 100; 
                                                    $precioConDescuento = $precioVenta - ($precioVenta * $descuentoDecimal);
                                                    $precioTotal = $precioConDescuento * $cantidadProductos;

                                                    echo "<th> $ " . $precioTotal . ".00</th>";
                                                ?>                                     
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="paypal-button-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TABLA DE TOTAL DE PAGO -->
                    <div class="col-md-4">
                        <div class="card float-end border-0" style="width: 100%; max-width: 500px; height: auto;">
                            <div class="card-body">
                                <div class="table-resposive">
                                    <table class="table table-borderless fuenteFav" style="width: 100%; max-width: 500px; height: auto;">

                                        <tr>
                                            <td><b>Cantidad</b></td>
                                            <td><b><?php echo $fila['vCantidad']?></b></td>
                                        </tr>

                                        <tr>
                                            <td>Total</td>
                                            <td><b>$ <?php echo $precioTotal ?>.00</b></td>

                                        </tr>

                                        <tr>
                                            <td>Envio</td>
                                            <td class="text text-success"><b>GRATIS</b></td>
                                        </tr>

                                        <tr style="font-size: 1.3rem;">
                                            <th style="border-top: 2px solid black;">Total</th>
                                            <th style="border-top: 2px solid black;">$ <?php echo $precioTotal ?>.00</th>
                                        </tr>
                                    </table>
                                </div>
                                <div id="paypal-button-container"></div>
                            </div>
                        </div>
                    </div>
                </div>
                  <?php
                            }
                        }
                        mysqli_close($conexion);
                    ?>
                <div class="pb-4 mx-3">
                    <a href="../consultas/vaciarOne.php" class="button-link">Regresar</a>
                </div>
                <div class="horizontal-line"></div>

            </div>

            <form action="../consultas/deleteCarritoOne.php" method="POST">
                <div class="modal fade py-5" id="compraExito" tabindex="-1" data-bs-backdrop="static" aria-labelledby="EtiquetaTituloVentanaModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered py-5">
                        <div class="modal-content shadow-card border-0">
                            <div class="modal-header">
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 text text-center fs-4">
                                        <span><b style="color: #20bf55;">¡COMPRA REALIZADA CON ÉXITO!</b></span>
                                    </div>
                                </div>
                                <div class="row py-5">
                                    <div class="col-sm-12 text text-center">
                                        <img src="../../assets/image/acc/check.png" alt="Exito" style="width: 100%; max-width: 150px; height: auto;"><br><br>
                                        <span class="text-dark py-3"><b>¡Puedes checar tu compra en Historial Con tu Codigo de Compra!</b></span>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer  d-flex justify-content-center">
                                <input type="hidden" name="idCarrito" value="<?php echo $fila['idCarrito'] ?>">
                                <input type="hidden" name="idProducto" value="<?php echo $fila['idProducto'] ?>">
                                <input type="hidden" name="idTalla" value="<?php echo $fila['idTalla'] ?>">
                                <input type="hidden" name="idProducto" value="<?php echo $fila['idColor'] ?>">
                                <input type="hidden" name="vImagen" value="<?php echo $fila['vImagen'] ?>">
                                <input type="hidden" name="vCantidad" value="<?php echo $fila['vCantidad'] ?>">
                                <input type="hidden" name="vCodigo" value="<?php echo $fila['vCodigo'] ?>">
                                <button type="submit" class="button-link" data-bs-dismiss="modal">Seguir Comprando</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </main>

        <footer>
            <?php
            require_once("../../footer/footer.php");
            ?>
        </footer>

        <script>
            paypal.Buttons({
                style: {
                    color: 'blue',
                    shape: 'pill',
                    label: 'pay',
                    size: 'responsive'
                },
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: <?php echo $precioTotal ?>
                            }
                        }]
                    })
                },
                onApprove: function(data, actions) {
                    actions.order.capture().then(function(detalles) {
                        $('#compraExito').modal('show');
                    });
                },

                onCancel: function(data) {
                    alert("Pago Cancelado")
                }
            }).render('#paypal-button-container');
        </script>
    </body>

</html>


