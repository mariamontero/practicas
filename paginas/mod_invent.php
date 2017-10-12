<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<html>
<head>
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
</head>
</html>
<?


include_once("../conexion.php");



$realizado = $_GET["10"];
if (!is_numeric($realizado))
{

$tipo=$_POST['tipo'];
$nombre=$_POST['nombre'];
$cantidad=$_POST['cantidad'];
$descripcion=$_POST['descripcion'];
$id=$_POST['id'];



echo"<div id='menumodinvent'>";
echo"<table>";
echo"<tr><td><center><h3><b>En La Casilla De Al Lado Inserte el Cambio</b></h3></center></td></tr>";

echo"<form action='mod_invent.php' method='get'>";

echo"<br><tr>";
echo"<td><b>Tipo</b></td></tr><tr><td><input disabled type='text' value='".$tipo."'></td>";
echo"<td><select name='nuetipo'><option>medicamentos</option><option>alimentos</option><option>enceres</option></td></tr>";


echo"<tr>";
echo"<td><b>Nombre</b></td></tr><tr><td><input disabled type='text' value='".$nombre."' ></td>";
echo"<td><input type='text' name='nuenombre'></td></tr>";


echo"<tr>";
echo"<td><b><b>Descripcion</b></td></tr><tr><td><input  disabled type='text' value='".$descripcion."' ></td>";
echo"<td><input type='text' name='nuedescrip'></td></tr>";



echo"</tr></table></div>";



echo"<input type='hidden' value='".$id."' name='10'><br>";
echo"<center><input type='submit' value='guardar'></form></center>";


}
else
{
$tipo=$_GET['nuetipo'];
$nombre=$_GET['nuenombre'];
$descripcion=$_GET['nuedescrip'];
$id=$_GET['10'];

$realizado=$id;

if($nombre=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update inventario set inven_nom = '$nombre' where inven_id = '$realizado'") or die ("error en el cargar");	
	}
	
	if($tipo=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update inventario set inven_tipo = '$tipo' where inven_id = '$realizado'") or die ("error en el cargar");	
	}
	if($descripcion=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update inventario set inven_descrip = '$descripcion' where inven_id = '$realizado'") or die ("error en el cargar");	
	}
	
	
	
	
	    $login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		$evento="Modificacion del inventario";
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
	
	echo "<script language='JavaScript'> alert('REALIZADO'); </script>";

	
}

echo"</div>";
?>