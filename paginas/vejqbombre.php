<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>

<?php
include_once("../conexion.php");
   
   
  $buscar=$_REQUEST['nombre'];  
  
  $query=mysql_query("SELECT DISTINCT descripcion from inventario where nombrep = '$buscar'") or die ("error en el select");
  while ($trae=mysql_fetch_array($query))
  {
  
  $modelos= $trae['descripcion'];
  
	  
	  	$options_model = $options_model.'<option value="'.$trae['descripcion'].'">'.$trae['descripcion'].'</option>'; }
	   
   echo $options_model;
  

?>
