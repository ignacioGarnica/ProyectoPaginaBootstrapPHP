<?php

    include('conexion.php');
    header('http://localhost/HtmlConBootstrapYPHP/notificacionModificar.php');

    $rescateID = $_POST["rescate"];
    $rescateComentario = $_POST["rescateComentario"];

    $modificar=mysql_query("UPDATE comentario SET Comentario = '$rescateComentario' WHERE IdComentario='$rescateID'");

    if ($modificar) {
        echo '
            <html>
            <head>
            <meta http-equiv="refresh" content="0;url=http://localhost/HtmlConBootstrapYPHP/notificacionModificar.html">
            </head>

            </html>';        
    }


    mysql_close()

?>