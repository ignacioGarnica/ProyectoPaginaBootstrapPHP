<?php
include('conexion.php');
session_start();

$usuario=$_POST["usuario"];
$password=$_POST["password"];


if(empty ($usuario) or empty ($password) ){
    
    echo' <script>alert ("Por favor, ingrese todos los datos");</script>
            <html>
            <head>
            <meta http-equiv="refresh" content="0;url=http://localhost/HtmlConBootstrapYPHP/login.html">
            </head>

            </html>';
    return;
}
    
    $can=mysql_query("SELECT * FROM administrador");
                
        while($dato=mysql_fetch_array($can)){
            $dato_usuario=$dato['Usuario'];
            $dato_clave=$dato['Contraseña'];
        }
        
    if($usuario==$dato_usuario and $password==$dato_clave){
        
        $_SESSION['nombre'] = $usuario;
        $_SESSION['clave']  = $password;
        
        echo'<html>
                <head>
                    <meta http-equiv="refresh" content="0;url=http://localhost/HtmlConBootstrapYPHP/busquedaygestion.php">
                </head>
                </html>';
        return;
    }   
    else{
        
        echo'<html>
                <head>                          
                <meta http-equiv="refresh" content="0;url=http://localhost/HtmlConBootstrapYPHP/loginErroneo.html">
                </head>
                </html>';
        return; 
    }
        
?>