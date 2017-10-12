<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<?php
include_once("../conexion.php");
   
   
  $buscar = $_REQUEST['tipo'];
  
  $query=mysql_query("select  DISTINCT inven_nom from inventario where inven_tipo = '$buscar'") or die ("error en el select");
  while ($trae=mysql_fetch_array($query))
  {
  
  $descripcion= $trae['inven_nom'];
  
	  
	  	$options_des = $options_des.'<option value="'.$trae['inven_nom'].'">'.$trae['inven_nom'].'</option>'; }
	   
   echo $options_des;
  
   
?>