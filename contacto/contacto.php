<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<title>Contacto</title>
      	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/footer.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/header.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/productos.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/contacto.css">

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
            <?php require_once('../header/header.php'); ?>
        </header>
        <div class="container-banner"></div>
            <div class="body-text">
                <div class="menu-submenu">
                    <div style="display: inline-block;">
                       <h3 style="font-weight: 800; display: inline-block;" id="subir">CONTACTO</h3>
                    </div>
                </div>
                
                <div class="horizontal-line"></div>
                <div class="mt-5">
                    <div class="row">
                        <div class="col-divider col-md-6 col-sm-6 col-xs-6">
                            <form action="enviarEmail.php" method="POST">
                                <div class="row mb-2">
                                    <div class="col-md-9 col-sm-6 col-xs-9">
                                        <span class="help-block text-muted">Nombre</span>
                                        <input type="text" class="form-control" name="nombre" required/>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-9 col-sm-6 col-xs-9">
                                        <span class="help-block text-muted small-font">Correo</span>
                                        <input type="email" class="form-control" name="correo" required/>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-9 col-sm-6 col-xs-9">
                                        <span class="help-block text-muted small-font">Asunto</span>
                                        <input type="text" class="form-control" name="asunto" required/>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-9 col-sm-6 col-xs-9">
                                        <span class="help-block text-muted small-font">Mensaje</span>
                                        <textarea rows="5" class="form-control" name="mensaje" required></textarea>
                                    </div>
                                </div>

                                <div class="py-3">
                                    <input type="submit" value="Enviar" name="enviar" class="button-link">
                                </div>
                            </form>                   
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6 d-flex justify-content-center align-items-center ">
                            <div class="text-center  col-md-9 col-sm-9 col-xs-9 ">
                                <strong><H3>Integrantes</H3></strong>
                                <p class="integrantes-names">Beltrán Cruz Diego Alfredo</p>
                                <p class="integrantes-names">Millán Valdez Jesús Alberto</p>
                                <p class="integrantes-names">Morales Aramburo Alfredo</p>
                                <p class="integrantes-names">Andrade Gurrola Jose Adrian</p>
                                <p class="integrantes-names">LISI 4-1</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3667.034889268792!2d-106.42411639999999!3d23.205399099999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x869f5390c2c9ad3f%3A0x47a151731aa5e424!2zTHVpcyBaw7rDsWlnYSAzMDQsIENlbnRybywgODIwMDAgTWF6YXRsw6FuLCBTaW4u!5e0!3m2!1ses-419!2smx!4v1701039559462!5m2!1ses-419!2smx" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        <footer>
            <?php require_once('../footer/footer.php') ?>
        </footer>
    </body>
</html>