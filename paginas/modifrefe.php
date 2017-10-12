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
$apellido=$_POST['apellidos'];
$nacionalidad=$_POST['nacionalidad'];
$cedula=$_POST['cedula'];
$direccion=$_POST['direccion'];
$tlf=$_POST['tlf'];
$codnumercel=$_POST['codnumercel'];
$movil=$_POST['movil'];



echo"<center><h3 class='est'><b>  En La Casilla De Al Lado Inserte el Cambio</b></h3></center>";
echo"<table><tr>";
echo"<form action='modifrefe.php' method='get'>";

echo"<td><b>Nombre</b></td><td><input name='nombre' disabled type='text' value='".$nombre."'>";
echo"<input type='text' name='nuenombre'></td></tr>";
echo"<br><tr>";

echo"<td><b>Apellidos</b></td><td><input  disabled type='text' value='".$apellido."' >";
echo"<input type='text' name='nueapellido'></td></tr>";

echo"<td><b>Nacionalidad</b></td><td><input  disabled type='text' value='".$nacionalidad."'>";
echo"<input type='text' name='nuenacionalidad'></td></tr><br>";

echo"<td><b>Cedula</b></td><td><input  disabled type='text' value='".$cedula."' >";
echo"<input placeholder='Numerico' type='text' name='nuecedula'></td></tr><br>";

echo"<td><b>Direccion</b></td><td><input disabled type='text' value='".$direccion."' >";
echo"<input type='text' name='nuedireccion'></td></tr><br>";

echo"<td><b>Tlf</b></td><td><input  disabled type='text' value='".$tlf."'>";
echo"<input type='text' name='nuetlf'></td></tr>";
echo"<br><tr>";
echo "<td><b>Movil</b></td><td><input type='text' name='codnumercel' disabled value='".$codnumercel."".$movil."' >";

echo"<select name='nuecodnumercel'> <option>0412</option><option>0414</option><option>0424</option><option>0416</option><option>0426</option></select><input size='10%' placeholder='Numerico' type='text' name='nuemovil'> </td></tr>";
echo"<br><tr>";

echo"</tr></table></div>";



$revisa=mysql_query("select * from referencias where refe_ci like '$cedula'") or die ("eeroorrrr");


$todo=mysql_fetch_array($revisa);

$id= $todo['refe_id'];
echo"<input type='hidden' value='$id' name='10'><br>";
echo"<center><input type='submit' value='guardar'></form></center>";


}
else
{

	
$nuenombre=$_GET['nuenombre'];
$nueapellidos=$_GET['nueapellido'];
$nuenacionalidad=$_GET['nuenacionalidad'];
$nuecedula=$_GET['nuecedula'];
$nuedireccion=$_GET['nuedireccion'];
$nuetelefono=$_GET['nuetlf'];
$codmovil=$_GET['nuecodnumercel'];
$movil=$_GET['nuemovil'];

if($nuenombre=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update referencias set refe_nom ='$nuenombre' where refe_id = '$realizado'") or die ("error en el cargar");	
	}
	
	if($nueapellidos=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update referencias set refe_apell = '$nueapellidos' where refe_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuenacionalidad=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update referencias set  refe_nacidad = '$nuenacionalidad' where refe_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuecedula=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update referencias set refe_ci = '$nuecedula'where refe_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuedireccion=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update referencias set refe_direc ='$nuedireccion' where refe_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuetelefono=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update referencias set refe_tlf ='$nuetelefono' where refe_id = '$realizado'") or die ("error en el cargar");	
	}
	
	if($codmovil=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update referencias set refe_cod_cel ='$codmovil' where refe_id = '$realizado'") or die ("error en el cargar");	
	}
	if($movil=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update referencias set refe_movil ='$movil' where refe_id = '$realizado'") or die ("error en el cargar");	
	}
	
	
	    $nombre=$_GET['nombre'];
	    $login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		echo $nombre;
		$evento="Modifico Referencia  ".$nombre;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
	
	echo "<script language='JavaScript'> alert('REALIZADO'); </script>";

}
?>