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
include_once('../conexion.php');


//////////////////////
$nombre=trim($_POST['nombre']);
$clave=trim($_POST['clave']);
$nivel=trim($_POST['nivel']);
$pregunta=trim($_POST['pregunta']);
$respuesta=trim($_POST['respuesta']);
$respuesta2=trim($_POST['respuesta2']);


$nombre=strtolower($nombre);
$clave=strtolower($clave);
$nivel=strtolower($nivel);
$pregunta=trim($pregunta);
$respuesta=strtolower($respuesta);
$respuesta2=strtolower($respuesta2);

$cuanto= strlen($clave);
if ($cuanto <= 7 )
{
	echo "<script language='JavaScript'> alert('la clave deve contener al menos 8 caracteres se recomiendas numeros y letras'); </script>";
	
}
else
{ 
$clave=md5($_POST['clave']);


$consulta = mysql_query("select * from usuarios where username like '$nombre'") or die ("error en el select 1");
$cont = mysql_fetch_array($consulta);
			if ($cont == 0)
			{
	if( $respuesta == $respuesta2)
	{
		$respuesta=md5($respuesta);
		
		
			$insertarusu=mysql_query("insert into usuarios (username,password,nivel,question,answer) VALUES ( '$nombre','$clave','$nivel', '$pregunta','$respuesta')") or die ("Erroor en el insert 1");
			
		
	    $login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		$evento="Se Agrego Usuario:  ".$nombre;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
				
	echo "<script language='JavaScript'> alert('Usuario Registrado Satisfactoriamente'); </script>";	
	 }
	else
	{
		echo "<script language='JavaScript'> alert('las respuestas no coinciden'); </script>";
	}
	}
else
{
echo "<script language='JavaScript'> alert('Usuario ya Registrado Elija ptro nombre de usuario'); </script>";	
}




}
?>

