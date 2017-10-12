<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<?php
include_once("../conexion.php");
   
   
  $buscar = $_REQUEST['envinom'];

echo"<option>".$buscar."</option>";
  
   
?>