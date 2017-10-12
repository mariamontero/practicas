<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?><?php
include_once('../conexion.php'); 
   
  $tipo= $_REQUEST['tipo'];  
  echo"holaaaaaaa";
  $query=mysql_query("select * from inventario where tipo = '$tipo'") or die ("error en el select");
  while ($trae=mysql_fetch_array($query))
  {
  
  $nombre= $trae['nombrep'];
  
	  
	  	$options_nombre = $options_nombre.'<option  value="'.$trae['nombrep'].'">'.$trae['nombrep'].'</option>'; }
	   
   echo $options_nombre;
  echo"hola";
  echo"".$tipo."";
?>