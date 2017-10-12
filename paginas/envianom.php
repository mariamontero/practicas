<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<?php
include_once("../conexion.php");
   
   
  $buscar = $_REQUEST['envinom'];
  
  $query=mysql_query("select  DISTINCT inven_descrip from inventario where inven_nom = '$buscar'") or die ("error en el select");
  while ($trae=mysql_fetch_array($query))
  {
  
  $descripcion= $trae['inven_descrip'];
  
	  
	  	$options_des = $options_des.'<option value="'.$trae['inven_descrip'].'">'.$trae['inven_descrip'].'</option>'; }
	   
   echo $options_des;
  
   
?>