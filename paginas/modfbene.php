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
$apellido=$_POST['apellido'];
$nacionalidad=$_POST['nacionalidad'];
$cedula=$_POST['cedula'];
$diagnostico=$_POST['diagnostico'];
$sexo=$_POST['sexo'];
$fnacimiento=$_POST['fnacimiento'];

echo"<center><h3 class='est'><b>  En La Casilla De Al Lado Inserte el Cambio</b></h3></center>";
echo"<table><tr>";
echo"<form action='modfbene.php' method='get'>";

echo"<td><b>Nombre</b></td><td><input name='nombre'  disabled type='text' value='".$nombre."'>";
echo"<input type='text' name='nuenombre'></td></tr>";
echo"<br><tr>";

echo"<td><b>Apellidos</b></td><td><input  disabled type='text' value='".$apellido."' >";
echo"<input type='text' name='nueapellido'></td></tr>";

echo"<td><b>Nacionalidad</b></td><td><input  disabled type='text' value='".$nacionalidad."'>";
echo"<input type='text' name='nuenacionalidad'></td></tr><br>";

echo"<td><b>Cedula</b></td><td><input  disabled type='text' value='".$cedula."' >";
echo"<input placeholder='Numerico' type='text' name='nuecedula'></td></tr><br>";

echo"<td><b>Diagnostico</b></td><td><input  disabled type='text' value='".$diagnostico."'>";
echo"<input type='text' name='nuediagnostico'></td></tr><br>";
echo"<td><b>Sexo</b></td><td><input  disabled type='text' value='".$sexo."'>";
echo"<input type='text' name='nuesexo'></td></tr>";
echo"<br><tr>";
echo"<td><b>F. Nacimiento</b></td><td><input  disabled type='text' value='".$fnacimiento."'>";
echo"<input type='text' name='nuefnacimiento'></td></tr>";
echo"<br><tr>";

echo"</tr></table></div>";



$revisa=mysql_query("select * from beneficiario where benefi_ci like '$cedula' and benefi_fnacimiento = '$fnacimiento' and benefi_nom = '$nombre'") or die ("eeroorrrr");


$todo=mysql_fetch_array($revisa);

$id= $todo['benefi_id'];
echo"<input type='hidden' value='$id' name='10'><br>";
echo"<center><input type='submit' value='guardar'></form></center>";


}
else
{
$nuenombre=$_GET['nuenombre'];
$nueapellidos=$_GET['nueapellido'];
$nuenacionalidad=$_GET['nuenacionalidad'];
$cedula=$_GET['nuecedula'];
$nuediagnostico=$_GET['nuediagnostico'];
$nuesexo=$_GET['nuesexo'];
$nuefnacimiento=$_GET['nuefnacimiento'];


if($nuenombre=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update beneficiario set benefi_nom ='$nuenombre' where benefi_id = '$realizado'") or die ("error en el cargar");	
	}
	
	if($nueapellidos=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update beneficiario set benefi_apell = '$nueapellidos' where benefi_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuenacionalidad=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update beneficiario set benefi_nacidad = '$nuenacionalidad' where benefi_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuecedula=="")
	{
		
	}
	else
	{
	if(is_numeric($nuecedula))
	{
		
	$cargarr=mysql_query("update beneficiario set benefi_ci = '$nuecedula' where benefi_id = '$realizado'") or die ("error en el cargar");
	}
	else
	{	}
	}
	if($nuediagnostico=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update beneficiario set benefi_diagtco ='$nuediagnostico' where benefi_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuesexo=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update beneficiario set benefi_sexo ='$nuesexo' where benefi_id = '$realizado'") or die ("error en el cargar");	
	}
	
	if($nuefnacimiento=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update beneficiario set benefi_fnacimiento ='$nuefnacimiento' where benefi_id = '$realizado'") or die ("error en el cargar");	
	}
	
	 $nombre=$_GET['nombre'];
	    $login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		$evento="Modifico Representado".$nombre;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
	
	
	
	
echo "<script language='JavaScript'> alert('Realizado!'); </script>";

	
}


?>