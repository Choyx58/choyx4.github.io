<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Header</title>
        
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="/ComercioElectronic/assets/css/header.css">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
            crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </head>
    <?php 

        $nombreServidor = "localhost";
        $nombreUsuario = "root"; 
        $contraseña = ""; 
        $baseDeDatos = "dbcomercio"; 

        $conexion = mysqli_connect($nombreServidor, $nombreUsuario, $contraseña, $baseDeDatos);

        if(!$conexion) { die("Error en la conexión: ". mysqli_connect_error()); }
                    
            $consulta = "SELECT c.*, p.*, i.*
                         FROM tblcarrito c
                         JOIN tblproductos p ON c.idProducto = p.idProducto
                         JOIN tblImagenes i ON c.idProducto = i.idProducto";

            $resultado = mysqli_query($conexion, $consulta);
            $totalProductos = mysqli_num_rows($resultado);

        ?>

    <header class="header">
        <nav class="shadow p-3">
            <a href="/ComercioElectronic/index.php" class="enlace" style="color: #111 !important;">Desing Mode<img src="" alt="" class="logo"></a>
                    
            <input type="checkbox" id="check">
            <label class="checkbtn" for="check" style="color: #111">&#9776;</label>
            
            <ul>
                <li>
                    <a href="/ComercioElectronic/lanzamientos.php?busquedaHoddies=" 
                        style="color:#111;" class="menu-link" style="color: #000 !important;">Nuevos Lanzamientos
                    </a>
                </li>

                <li>
                    <a href="/ComercioElectronic/catalogo.php?busquedaHoddies="
                        style="color: #111;" class="menu-link" style="color: #000 !important;">Catalogo
                    </a>
                </li> 

                <li>
                    <a href="/ComercioElectronic/productos/favorito.php" class="menu-link"style="color:#111">
                        <i class="bi bi-suit-heart position-relative">
                            <span id="num_cart" class="badge text-dark position-absolute top-100 start-100 translate-middle"><?php echo $totalProductos;?></span>
                        </i>
                    </a>
                </li>
            </ul>
        </nav>
    </header>   

    <script>
        //URL actual
        var url = window.location.href;

        //Elementos del menú por sus IDs
        var menuLinks = document.querySelectorAll('.menu-link');

        menuLinks.forEach(function(link) {
            var href = link.getAttribute('href');

            if (url.includes(href)) {
                // Agrega la clase 'active'
                link.classList.add('active');
            }

            link.addEventListener('click', function(event) {
                // Remueve la clase 'active'
                menuLinks.forEach(function(link) {
                link.classList.remove('active');
            });

            // Agrega la clase 'active' 
              this.classList.add('active');
            });
        });
    </script>

</html>
