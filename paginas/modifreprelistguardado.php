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


$rcedula=$_POST['rcedula'];
$bnombre=$_POST['bnombre'];
$ddiag=$_POST['ddiag'];
$estatus=$_POST['estads'];


$select=mysql_query("select * from representante where repre_ci like '$rcedula'") or die ("errorrr select 1");

$esto=mysql_fetch_array($select);

$id_repre= $esto['repre_id'];

$cargarr=mysql_query("update beneficiario set benefi_status ='$estatus' where benefi_idr = '$id_repre' and benefi_diagtco = '$ddiag' and benefi_nom = '$bnombre'") or die ("error en el cargar");


       
	    $login=$_SESSION['s_username'];
		ini_alter('date.timezone','America/Caracas');
		$fechar=date('Y-m-d');
		$evento="Modifico estatus a: ".$estatus."de ".$bnombre;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
		

echo "<script language='JavaScript'> alert('CAMBIO REALIZADO'); </script>";




?>