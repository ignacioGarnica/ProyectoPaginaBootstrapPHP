<?php
$conexion=mysql_connect("localhost","root","informatica");

if(!$conexion){
	die('no he podido conectar : '.mysql_error());
	}

mysql_select_db("velvetdatabase",$conexion);

?>