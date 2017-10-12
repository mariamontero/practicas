<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  

include_once("../conexion.php");

?>
<html>
<head>
</head>
<body>
<?
$var = trim($_POST['valid']);

if($var == 1)
{

$cantidad = trim($_POST['cantidad']);
$proveedor = trim($_POST['proveedor']);
$fechai = trim($_POST['fechaingreso']);
$fechav = trim($_POST['fechavencimiento']);
$idarticulo = trim($_POST['idarticulo']);
$iddetaart = trim($_POST['iddetaart']);



$query=mysql_query("delete from invent_ingreso where ingres_id = '$iddetaart' and ingres_id_art = '$idarticulo' and ingres_fech_i = '$fechai' and ingres_fech_v = '$fechav' and  ingres_id_prov = '$proveedor' and ingres_canti = '$cantidad'") or die ("error en el delete");

$select=mysql_query("select inven_canti from inventario where inven_id = '$idarticulo'") or die ("error select");
$trae=mysql_fetch_array($select);
$cantidadactual=$trae['inven_canti'];

$cantidadtotal=$cantidadactual - $cantidad;

$cargarr=mysql_query("update inventario set inven_canti ='$cantidadtotal' where inven_id = '$idarticulo'") or die ("error en el cargar");	

echo "<script language='JavaScript'> alert('La Cantidad  A Sido Eliminada!'); </script>";

$resultado=mysql_query("select * from invent_ingreso where ingres_id_art = '$idarticulo'") or die ( "error en el select 2");
 


echo "<center>";
echo "<table text-align:center;'>";
echo "<tr style='background:#06F'>";
echo "<td><b>Cantidad</b></td>";
echo "<td><b>Proveedor</b></td>";
echo "<td><b>Fecha Ingreso</b></td>";
echo "<td><b>Fecha Vencimiento</b></td>";
echo "<td><b>Eliminar Cant.</b></td>";
echo "<td><b>Eliminar 1 art</b></td>";



echo"</tr>";
while($resultados = mysql_fetch_array($resultado))
{

echo'<form method="post" action="invent_elimincant.php">';
	  echo "<tr bgcolor='#FFFACD'>";
	  echo "<td>" .$resultados['ingres_canti']."<input type='hidden' name='cantidad' value='".$resultados['ingres_canti']."'</td>";
	  echo "<td>" .$resultados['ingres_id_prov']."<input type='hidden' name='proveedor' value='".$resultados['ingres_id_prov']."'</td>";
	  echo "<td>" .$resultados['ingres_fech_i']."<input type='hidden' name='fechaingreso' value='".$resultados['ingres_fech_i']."'</td>";
	  echo "<td>" .$resultados['ingres_fech_v']."<input type='hidden' name='fechavencimiento' value='".$resultados['ingres_fech_v']."'</td>";
	  
	
	 
	  $iddetaart=$resultados['ingres_id'];
	   echo "<input type='hidden' name='iddetaart' value='".$iddetaart."'>";
	   
	   
	  echo " <input type='hidden' name='idarticulo' value='".$idarticulo."'>";
	  
	   echo '<td><center><input type="submit" name="Enviar" value="Eliminar Cant."></center></td>'; 
	   
	     $var=0; echo "<input type='hidden' name='valid' value='".$var."'>";
	echo"</form>";
	echo'<form method="post" action="invent_elimincant.php">';
echo '<td><center><input type="submit" name="Enviar" value="Eliminar 1"></center></td>'; 
}
 echo"</table></div>";	
	
}
else
{
	
$cantidad = trim($_POST['cantidad']);
$proveedor = trim($_POST['proveedor']);
$fechai = trim($_POST['fechaingreso']);
$fechav = trim($_POST['fechavencimiento']);
$idarticulo = trim($_POST['idarticulo']);
$iddetaart = trim($_POST['iddetaart']);



$query=mysql_query("delete from invent_ingreso where ingres_id = '$iddetaart' and ingres_id_art = '$idarticulo' and ingres_fech_i = '$fechai' and ingres_fech_v = '$fechav' and  ingres_id_prov = '$proveedor' and ingres_canti = '$cantidad'") or die ("error en el delete");

$select=mysql_query("select inven_canti from inventario where inven_id = '$idarticulo'") or die ("error select");
$trae=mysql_fetch_array($select);
$cantidadactual=$trae['inven_canti'];

$cantidadtotal=$cantidadactual - $cantidad;

$cargarr=mysql_query("update inventario set inven_canti ='$cantidadtotal' where inven_id = '$idarticulo'") or die ("error en el cargar");	

echo "<script language='JavaScript'> alert('La Cantidad  A Sido Eliminada!'); </script>";

$resultado=mysql_query("select * from invent_ingreso where ingres_id_art = '$idarticulo'") or die ( "error en el select 2");
 


echo "<center>";
echo "<table text-align:center;'>";
echo "<tr style='background:#06F'>";
echo "<td><b>Cantidad</b></td>";
echo "<td><b>Proveedor</b></td>";
echo "<td><b>Fecha Ingreso</b></td>";
echo "<td><b>Fecha Vencimiento</b></td>";
echo "<td><b>Eliminar Cant.</b></td>";
echo "<td><b>Eliminar 1 art</b></td>";



echo"</tr>";
while($resultados = mysql_fetch_array($resultado))
{

echo'<form method="post" action="invent_elimincant.php">';
	  echo "<tr bgcolor='#FFFACD'>";
	  echo "<td>" .$resultados['ingres_canti']."<input type='hidden' name='cantidad' value='".$resultados['ingres_canti']."'</td>";
	  echo "<td>" .$resultados['ingres_id_prov']."<input type='hidden' name='proveedor' value='".$resultados['ingres_id_prov']."'</td>";
	  echo "<td>" .$resultados['ingres_fech_i']."<input type='hidden' name='fechaingreso' value='".$resultados['ingres_fech_i']."'</td>";
	  echo "<td>" .$resultados['ingres_fech_v']."<input type='hidden' name='fechavencimiento' value='".$resultados['ingres_fech_v']."'</td>";
	  
	
	 
	  $iddetaart=$resultados['ingres_id'];
	   echo "<input type='hidden' name='iddetaart' value='".$iddetaart."'>";
	   
	   
	  echo " <input type='hidden' name='idarticulo' value='".$idarticulo."'>";
	  
	   echo '<td><center><input type="submit" name="Enviar" value="Eliminar Cant."></center></td>'; 
	   
	     $var=1; echo "<input type='hidden' name='valid' value='".$var."'>";
	echo"</form>";
	echo'<form method="post" action="invent_elimincant.php">';
echo '<td><center><input type="submit" name="Enviar" value="Eliminar 1"></center></td>'; 
}
 echo"</table></div>";		
}




?>