<?php

if(isset($_POST['enviar'])){

    if(!empty($_POST['nombre']) && !empty($_POST['asunto']) && !empty($_POST['mensaje']) && !empty($_POST['correo'])){

        $nombre = $_POST['nombre'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
        $correo =$_POST['correo'];

        $header = "From: alfredobc1201@gmail.com"."\r\n";
        $header = "Replay-To: alfredobc1201@gmail.com"."\r\n";
        $header = "X-Mailer: PHP/". phpversion();
        $mail = @mail($correo,$asunto,$mensaje,$header);

        if($mail){
            echo "";
        }   
    }
}
    header("Location: contacto.php");

?>