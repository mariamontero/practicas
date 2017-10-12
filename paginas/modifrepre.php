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
$apellidos=$_POST['apellidos'];
$nacionalidad=$_POST['nacionalidad'];
$cedula=$_POST['cedula'];
$direccion=$_POST['direccion'];
$tlf=$_POST['tlf'];
$numhijos=$_POST['numhijos'];
$edocivil=$_POST['edocivil'];
$trabaja=$_POST['trabaja'];
$vivienda=$_POST['vivienda'];
$rpnombre=$_POST['rpnombre'];
$rpapellido=$_POST['rpapellido'];
$rpcedula=$_POST['rpcedula'];
$rptlff=$_POST['rptlff'];
$codnumercel=$_POST['codnumercel'];
$movil=$_POST['movil'];
$rpnacionalidad=$_POST['rpnacionalidad'];
$fecha=$_POST['fecha'];


echo"<div id='menumodrepre'>";
echo"<table>";
echo"<tr><td><center><h3><b>En La Casilla De Al Lado Inserte el Cambio</b></h3></center></td></tr>";

echo"<form action='modifrepre.php' method='get'>";

echo"<br><tr>";
echo"<td><b>Nombre</b></td></tr><tr><td><input name='nombre' disabled type='text' value='".$nombre."'></td>";
echo"<td><input type='text' name='nuenombre'></td></tr>";

echo"<tr>";
echo"<td><b>Apellidos</b></td></tr><tr><td><input disabled type='text' value='".$apellidos."' ></td>";
echo"<td><input type='text' name='nueapellidos'></td></tr>";


echo"<tr>";
echo"<td><b>Nacionalidad</b></td></tr><tr><td><input disabled type='text' value='".$nacionalidad."'></td>";
echo'<td><select name="nuenacionalidad" ><option>V</option><option>E</option></select></td></tr>';

echo"<tr>";
echo"<td><b><b>Cedula</b></td></tr><tr><td><input  disabled type='text' value='".$cedula."' ></td>";
echo"<td><input placeholder='Numerico' type='text' name='nuecedula'></td></tr>";

echo"<tr>";
echo"<td><b>Direccion</b></td></tr><tr><td><input  disabled type='text' value='".$direccion."' ></td>";
echo"<td><input type='text' name='nuedireccion'></td></tr>";

echo"<tr>";
echo"<td><b>Tlf</b></td></tr><tr><td><input  disabled type='text' value='".$tlf."'></td>";
echo"<td><input placeholder='Numerico' type='text' name='nuetlf'></td></tr>";


echo"<tr>";
echo"<td><b>Codigo movil</b></td></tr><tr><td><input  disabled type='text' value='".$codnumercel."' ></td>";
echo'<td><div class="aca"><select name="codnumercel" ><option>0412</option><option>0414</option><option>0424</option><option>0416</option><option>0426</option></select></div></td></tr>';

echo"<tr>";
echo"<td><b>Movil</b></td></tr><tr><td><input  disabled type='text' value='".$movil."' ></td>";
echo"<td><input placeholder='Numerico' type='text' name='movil'></td></tr>";

echo"<tr>";
echo"<td><b>#Hijos</b></td></tr><tr><td><input  disabled type='text' value='".$numhijos."'></td>";
echo"<td><input placeholder='Numerico' type='text' name='nuenumhijos'></td></tr>";

echo"<tr>";
echo"<td><b>Edocivil</b></td></tr><tr><td><input disabled type='text' value='".$edocivil."'></td>";
echo"<td><input type='text' name='nueedocivil'></td></tr>";

echo"<tr>";
echo"<td><b>Trabaja</b></td></tr><tr><td><input  disabled type='text' value='".$trabaja."'></td>";
echo"<td><input type='text' name='nuetrabaja'></td></tr>";
echo"<tr>";
echo"<td><b>Vivienda</b></td></tr><tr><td><input  disabled type='text' value='".$vivienda."'></td>";
echo"<td><input type='text' name='nuevivienda'></td></tr>";
echo"<tr>";

echo"</tr></table></div>";



$revisa=mysql_query("select * from representante where repre_ci like '$cedula' and repre_dirc = '$direccion'") or die ("eeroorrrr");


$todo=mysql_fetch_array($revisa);

$id= $todo['repre_id'];
echo"<input type='hidden' value='$id' name='10'><br>";
echo"<center><input type='submit' value='guardar'></form></center>";


}
else
{
$nuenombre=$_GET['nuenombre'];
$nueapellidos=$_GET['nueapellidos'];
$nuenacionalidad=$_GET['nuenacionalidad'];
$cedula=$_GET['nuecedula'];
$nuedireccion=$_GET['nuedireccion'];
$nuetlf=$_GET['nuetlf'];
$nuenumhijos=$_GET['nuenumhijos'];
$nueedocivil=$_GET['nueedocivil'];
$nuetrabaja=$_GET['nuetrabaja'];
$nuevivienda=$_GET['nuevivienda'];
$nuerpnombre=$_GET['nuerpnombre'];
$nuerpapellido=$_GET['nuerpapellido'];
$nuerpcedula=$_GET['nuerpcedula'];
$nuerptlff=$_GET['nuerptlff'];
$nuerpnacionalidad=$_GET['nuerpnacionalidad'];

if($nuenombre=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update representante set repre_nom ='$nuenombre' where repre_id = '$realizado'") or die ("error en el cargar");	
	}
	
	if($nueapellidos=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update representante set repre_apell ='$nueapellidos' where repre_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuenacionalidad=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update representante set repre_nacidad ='$nuenacionalidad' where repre_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuecedula=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update representante set repre_ci ='$nuecedula' where repre_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuedireccion=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update representante set repre_dirc ='$nuedireccion' where repre_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuetlf=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update representante set repre_tlf ='$nuetlf' where repre_id = '$realizado'") or die ("error en el cargar");	
	}
	
	if($nuenumhijos=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update representante set repre_num_hijos ='$nuenumhijos' where repre_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nueedocivil=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update representante set repre_edo_civil ='$nueedocivil' where repre_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuetrabaja=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update representante set repre_tbja ='$nuetrabaja' where repre_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuevivienda=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update representante set repre_vivda ='$nuevivienda' where repre_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuerpnombre=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update representante set repre_rp_nom ='$nuerpnombre' where repre_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuerpapellido=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update representante set repre_rp_apell ='$nuerpapellido' where repre_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuerpcedula=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update representante set repre_rp_ci ='$nuerpcedula' where repre_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuerptlff=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update representante set repre_rp_tlf ='$nuerptlff' where repre_id = '$realizado'") or die ("error en el cargar");	
	}
	if($nuerpnacionalidad=="")
	{
		
	}
	else
	{
	$cargarr=mysql_query("update representante set repre_rp_nacidad ='$nuerpnacionalidad' where repre_id = '$realizado'") or die ("error en el cargar");	
	}
	
	    $nombre=$_POST['nombre'];
	    $login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		$evento="Modifico Representante".$nombre;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
	
	
	
	echo "<script language='JavaScript'> alert('REALIZADO'); </script>";

	
}

echo"</div>";
?>