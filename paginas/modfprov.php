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

$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$rif=$_POST['rif'];
$cod_tlf=$_POST['codigotlf'];
$num_tlf=$_POST['telefono'];
$diagnostico=$_POST['correo'];


echo"<center><h3 class='est'><b>En La Casilla De Al Lado Inserte el Cambio</b></h3></center>";
echo"<table><tr>";
echo"<form action='modfprov.php' method='get'>";

echo"<td><b>Nombre</b></td><td><input name='nombree'  disabled type='text' value='".$nombre."'>";
echo"<input type='text' name='nuenombre'></td></tr>";
echo"<br><tr>";

echo"<td><b>Direccion</b></td><td><input  disabled type='text' value='".$direccion."' >";
echo"<input type='text' name='nuedireccion'></td></tr>";

echo"<td><b>Rif</b></td><td><input  disabled type='text' value='".$rif."'>";
echo"<input type='text' name='nuerif'></td></tr><br>";



echo"<td><b>Codigo tlf</b></td><td><input disabled type='text' value='".$cod_tlf."' >";
$variabe=12;
$limit=95;
echo"<select name='nuecod_tlf'>";
for($variable = 12; $variable <= $limit; ++$variable )
{
echo"<option>02".$variable."</option>";
}
echo"</select></td></tr>";

echo"<td><b>telefono</b></td><td><input disabled type='text' value='".$num_tlf."' >";
echo"<input type='text' placeholder='Numerico' name='nuenum_tlf'></td></tr><br>";
echo"<br><tr>";

echo"</tr></table></div>";

$revisa=mysql_query("select * from proveedores where prov_rif = '$rif' and prov_tlf = '$num_tlf'") or die ("eeroorrrr");


$todo=mysql_fetch_array($revisa);

$id= $todo['prov_id'];
echo"<input type='hidden' value='$id' name='10'><br>";
echo"<center><input type='submit' value='guardar'></form></center>";


}
else
{
$nuenombre=$_GET['nuenombre'];
$nuedireccion=$_GET['nuedireccion'];
$nuerif=$_GET['nuerif'];
$nuecod_tlf=$_GET['nuecod_tlf'];
$nuenum_tlf=$_GET['nuenum_tlf'];

if($nuenombre=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update proveedores set prov_nom ='$nuenombre' where prov_id = '$realizado'") or die ("error en el cargar");	
	}
	
	if($nuedireccion=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update proveedores set prov_direcc = '$nuedireccion' where prov_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuerif=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update proveedores set prov_rif = '$nuerif' where prov_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuecod_tlf=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update proveedores set prov_cod_tlf = '$nuecod_tlf' where prov_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuenum_tlf=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update proveedores set prov_tlf ='$nuenum_tlf' where prov_id = '$realizado'") or die ("error en el cargar");	
	}
	
	
	    $login=$_SESSION['s_username'];
		ini_alter('date.timezone','America/Caracas');
		$fechar=date('Y-m-d');
		$evento="Modifico Proveedor";
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
	
	echo "<script language='JavaScript'> alert('REALIZADO'); </script>";


}
?>