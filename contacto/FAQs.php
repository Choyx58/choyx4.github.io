  <!DOCTYPE html>
    <html>

    <head>

        <meta charset="utf-8">
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<title>Preguntas Frecuentes</title>
      	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/footer.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/header.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/productos.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/contacto.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/FAQs.css">

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
            <div class="container-banner-FAQS"></div>
              <div class="body-text">
                  <div class="menu-submenu">
                      <div style="display: inline-block;">
                          <h3 style="font-weight: 800; display: inline-block;" id="subir">PREGUNTAS FRECUENTES</h3>
                      </div>
                  </div>

                  <div class="horizontal-line" ></div>
                  <div class="mt-5">
                      <div class="row">
                          <div class="col-divider col-md-2 col-sm-2 col-xs-2"> 
                              <h5><b>Temas</b></h5>
                              <div class="row mb-2">
                                  <div class="col-md-9 col-sm-6 col-xs-9">
                                      <input class="form-check-input" type="radio"  name="opciones" value="opcion1" checked onclick="mostrarOpciones()"/> Envios
                                  </div>
                              </div>
                              <div class="row mb-2">
                                  <div class="col-md-9 col-sm-6 col-xs-9">
                                      <input class="form-check-input" type="radio" name="opciones" value="opcion2" onclick="mostrarOpciones()"/> Devolución
                                    </div>
                              </div>
                          </div>

                          <div class="col-md-10 col-sm-10 col-xs-10 d-flex justify-content-center">
                              <div id="leyendaOpcion1" class="text-center" style="max-width: 700px; width: 100%;">
                                <h4><b>¿TIENES ALGUNA DUDA?</b></h4>
                                  <div class="accordion mt-5" id="accordionExample">
                                    <div class="accordion-item ">
                                        <h2 class="accordion-header bg-light">
                                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            ¿Cuáles son las zonas de envío de la tienda de sudaderas en línea?
                                          </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                          <div class="accordion-body">
                                            La tienda realiza envíos a nivel nacional e internacional para garantizar que sus clientes de todo el mundo tengan acceso a sus sudaderas de alta calidad. Los costos y tiempos de envío pueden variar según la ubicación geográfica.
                                          </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item ">
                                      <h2 class="accordion-header bg-light">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          ¿Cuánto tiempo se tarda en procesar un pedido de sudadera?
                                        </button>
                                      </h2>
                                      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                          Los pedidos se procesan con rapidez, normalmente en 1-2 días hábiles. Es importante tener en cuenta que los pedidos realizados durante el fin de semana o días festivos se procesarán en el siguiente día hábil.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item ">
                                      <h2 class="accordion-header bg-light">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                           ¿Cómo se calculan los costos de envío en la tienda de sudaderas en línea?
                                        </button>
                                      </h2>
                                      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                          El costo de envío se calcula de forma transparente durante el proceso de pago. Además, la tienda ofrece envío gratuito para pedidos superiores a cierta cantidad como muestra de agradecimiento por la lealtad de sus clientes.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item ">
                                      <h2 class="accordion-header bg-light">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                           ¿Qué sucede en caso de una entrega no exitosa de una sudadera?
                                        </button>
                                      </h2>
                                      <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                          La tienda realiza hasta dos intentos de entrega. En caso de una entrega no exitosa, se anima a los clientes a comunicarse con la empresa de envíos o con el equipo de atención al cliente para coordinar una nueva entrega.
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              <div id="leyendaOpcion2" class="text-center" style="max-width: 700px; width: 100%;">
                                <h4><b>¿TIENES ALGUNA DUDA?</b></h4>
                                  <div class="accordion mt-5" id="accordion98">
                                    <div class="accordion-item ">
                                      <h2 class="accordion-header bg-light">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                                          ¿Cuál es la política de devolución de sudaderas?
                                        </button>
                                      </h2>
                                      <div id="collapse5" class="accordion-collapse collapse show" data-bs-parent="#accordion98">
                                        <div class="accordion-body">
                                          Nuestra política de devolución permite devoluciones dentro de los 30 días posteriores a la compra. La sudadera debe estar en su estado original, sin usar y con las etiquetas intactas.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item ">
                                      <h2 class="accordion-header bg-light">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                          ¿Cómo puedo iniciar el proceso de devolución?
                                        </button>
                                      </h2>
                                      <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordion98">
                                        <div class="accordion-body">
                                          Para iniciar el proceso de devolución, simplemente visite nuestra página de devoluciones y siga las instrucciones proporcionadas. Se le guiará paso a paso.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item ">
                                      <h2 class="accordion-header bg-light">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                          ¿Cuánto tiempo tengo para devolver una sudadera?
                                        </button>
                                      </h2>
                                      <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#accordion98">
                                        <div class="accordion-body">
                                          Tiene hasta 10 días a partir de la fecha de compra para devolver la sudadera.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item ">
                                      <h2 class="accordion-header bg-light">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                          ¿Qué debo incluir al devolver una sudadera?
                                        </button>
                                      </h2>
                                      <div id="collapse8" class="accordion-collapse collapse" data-bs-parent="#accordion98">
                                        <div class="accordion-body">
                                           Asegúrese de devolver la sudadera en su empaque original con todas las etiquetas. Incluya también el recibo de compra o comprobante de pedido.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item ">
                                      <h2 class="accordion-header bg-light">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                          ¿Cuánto tiempo tarda en procesarse mi devolución?
                                        </button>
                                      </h2>
                                      <div id="collapse9" class="accordion-collapse collapse" data-bs-parent="#accordion98">
                                        <div class="accordion-body">
                                          Una vez que recibimos su devolución, el procesamiento generalmente toma de 5 a 7 días hábiles. Le enviaremos una notificación una vez que se haya completado.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item ">
                                      <h2 class="accordion-header bg-light">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                          ¿Cómo recibiré el reembolso por mi devolución?
                                        </button>
                                      </h2>
                                      <div id="collapse10" class="accordion-collapse collapse" data-bs-parent="#accordion98">
                                        <div class="accordion-body">
                                          Los reembolsos se procesarán a través del mismo método de pago que utilizó para realizar la compra. El tiempo exacto puede depender de su institución financiera.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item ">
                                      <h2 class="accordion-header bg-light">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                          ¿Cubren los gastos de envío de las devoluciones?
                                        </button>
                                      </h2>
                                      <div id="collapse11" class="accordion-collapse collapse" data-bs-parent="#accordion98">
                                        <div class="accordion-body">
                                          Los gastos de envío para devoluciones corren por cuenta del cliente, a menos que la devolución sea debido a un error nuestro o un defecto en el producto.
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                        </div>
                    </div>
                  </div>
                  <div class="">
                    <div class="row">
                        <div class="col-divider col-md-2 col-sm-2 col-xs-2"> 
                        </div>

                        <div class="col-md-10 col-sm-10 col-xs-10  justify-content-center mt-5"><center>
                              <h4><b>¿NO ENCONTRASTE RESPUESTA A TUS DUDAS?<br> HABLA CON NOSOTROS DIRECTAMENTE.</b></h4>
                            <div class="py-3">
                              <a href="/ComercioElectronic/contacto/contacto.php" type="submit" class="button-link">Contactar</a>
                            </div>
                        </div></center>
                    </div>
                  </div>
                </div>           
            <script>
              document.addEventListener("DOMContentLoaded", function() {
                mostrarOpciones(); // Llamada inicial para mostrar la opción preseleccionada
              });

              function mostrarOpciones() {
                var leyendaOpcion1 = document.getElementById("leyendaOpcion1");
                var leyendaOpcion2 = document.getElementById("leyendaOpcion2");
                var opcionSeleccionada = document.querySelector('input[name="opciones"]:checked').value;

                if (opcionSeleccionada === "opcion1") {
                  leyendaOpcion1.style.display = "block";
                  leyendaOpcion2.style.display = "none";
                } else if (opcionSeleccionada === "opcion2") {
                  leyendaOpcion1.style.display = "none";
                  leyendaOpcion2.style.display = "block";
                }
              }

            </script>
          <footer>
              <?php require_once('../footer/footer.php') ?>
          </footer>
      </body>

</html>