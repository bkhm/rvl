<?php
$server="127.0.0.1:3306";
$username="root";
$password="admin";
//$password="";
$database="monitoreoGa";

/*
$server="localhost";
$username="root";
$password="Gaddp552014";
//$password="";
$database="monitoreoGa";
*/

$conect=mysql_connect($server, $username, $password);

mysql_select_db($database,$conect);

/* estas lineas se comentaron y se hablitaron masterForms.php y FuncionesGenerales.php
// Modificador de duración de session
// Duracion de session en el servidor
ini_set('session.gc_maxlifetime', 32400);

// Duracion de session por cliente
session_set_cookie_params(32400);
*/


date_default_timezone_set('America/Mexico_City');

?>
