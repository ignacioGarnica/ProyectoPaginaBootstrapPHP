<?php

    include('conexion.php');
    header('http://localhost/HtmlConBootstrapYPHP/notificacionEliminar.php');

    $rescate = $_POST["rescateIdComentario"];

    $eliminar=mysql_query("DELETE FROM comentario WHERE IdComentario='$rescate'");
    $eliminar2=mysql_query("DELETE FROM clientescomentarios WHERE Comentario_RutCliente='$rescate'");


    if ($eliminar || $eliminar2) {
        echo '
            <html>
            <head>
            <meta http-equiv="refresh" content="0;url=http://localhost/HtmlConBootstrapYPHP/notificacionEliminar.html">
            </head>

            </html>';        
    }


    mysql_close()

?>