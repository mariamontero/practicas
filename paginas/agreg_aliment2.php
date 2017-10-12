<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<html>
<head>
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
</head>
<body>
<? include_once("../conexion.php"); ?>


<?
$nombre=trim($_POST['nombre']);
$descripcion=trim($_POST['descripcion']);
$cantidad=trim($_POST['cantidad']);
$proveedor=trim($_POST['proveedor']);
$fechaing=trim($_POST['fechai']);
$fechavenc=trim($_POST['fechav']);



$nombre=strtolower($nombre);
$descripcion=strtolower($descripcion);
$fechavenc=strtolower($fechavenc);

$tipo=trim($_POST['tipo']);
if ($tipo == "")
{
	$traetipo=mysql_query("select inven_tipo from inventario where inven_nom = '$nombre' and inven_descrip = '$descripcion'") or die ("error en el select 1");
	$type=mysql_fetch_array($traetipo);
	$tipo = $type['inven_tipo'];
}
else
{
	$tipo=strtolower($tipo);
}


if(!is_numeric($cantidad))
{
	echo "<script language='JavaScript'> alert('El Campo Cantidad Deve Ser Numerico'); </script>";
}
else
{
	
	switch ($tipo) 
	{
    case "enceres":
	{
       $fechavenc="no posee";
	}
		$enc="enceres";
    case  !$enc:
	{
	 $fechavenc=$fechavenc;	
	}
	
	$id_prov=mysql_query("select prov_id from proveedores where prov_nom = '$proveedor'") or die ("error en el select prov id");
	   $traeidprov=mysql_fetch_array($id_prov);
	   $id_proveedor= $traeidprov['prov_id'];
	   
	   $versiesta=mysql_query("select * from inventario where inven_tipo = '$tipo' and  inven_nom = '$nombre' and inven_descrip = '$descripcion'");
	   $trajo = mysql_fetch_array($versiesta);
	   
	   if($trajo == 0)
	   {
		     $insertar=mysql_query("insert into inventario (inven_tipo,inven_nom,inven_canti,inven_descrip) VALUES ('$tipo','$nombre','$cantidad','$descripcion')") or die (" error insert 1 ");
			 
			 
		$taiganlo=mysql_query("select * from inventario where inven_tipo = '$tipo' and  inven_nom = '$nombre' and inven_descrip = '$descripcion'")or die ("error en el select id inertado");
		
	$idinsertado=mysql_fetch_array($taiganlo);
	$idinsert=$idinsertado['inven_id'];
	
	
	 $insertarems=mysql_query("insert into invent_ingreso (ingres_id_art,ingres_fech_i,ingres_fech_v,ingres_id_prov,ingres_canti) VALUES ('$idinsert','$fechaing','$fechavenc','$id_proveedor','$cantidad')") or die (" error insert 1 ");
		
		 
	    $login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		$evento="se han agregado al inventario la cantidad de: ".$cantidad."  $nombre";
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
		
		echo "<script language='JavaScript'> alert('REGISTRO INSERTADO'); </script>";
		      
	   }
	   else
	   {
		   $idart=$trajo['inven_id'];
		   $cantidadhay=$trajo['inven_canti'];
		   $cantidadtotal=$cantidadhay + $cantidad;
		   
		   $cargacanti=mysql_query("update inventario set inven_canti = $cantidadtotal where inven_id = '$idart'") or die ("error en el cargar");
		   
		   $insertarems=mysql_query("insert into invent_ingreso (ingres_id_art,ingres_fech_i,ingres_fech_v,ingres_id_prov,ingres_canti) VALUES ('$idart','$fechaing','$fechavenc','$id_proveedor','$cantidad')") or die (" error insert 1 ");
		   
		   $login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		$evento="se han agregado al inventario la cantidad de: ".$cantidad."  $nombre";
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
		
		echo "<script language='JavaScript'> alert('REGISTRO INSERTADO'); </script>";
		   
	   
		   
	   }
	
	
	
	   
        break;
	
	}
}

?>





</body></html>








