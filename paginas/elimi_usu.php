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





$f = trim($_POST['nombre']);

$query=mysql_query("delete from usuarios where username like '$f'") or die ("error en el delete");

        
	    $login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		$evento="Elimino Usuario:  ".$f;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");

echo "<script language='JavaScript'> alert('El Usuario A Sido Eliminado!'); </script>";






?>