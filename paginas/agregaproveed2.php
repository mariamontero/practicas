<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
<title>FUNDACION</title>
</head>
<body>

<?
include_once('../conexion.php');


$nombre=trim($_POST['nombre']);
$correo=trim($_POST['correo']);
$direccion=trim($_POST['direccion']);
$cod_tlf=trim($_POST['cod_tlf']);
$telefono=trim($_POST['telefono']);
$rif=trim($_POST['rif']);
$fecha=trim($_POST['fecha']);

$nombre=strtolower($nombre);
$direccion=strtolower($direccion);
$correo=strtolower($correo);
$rif=strtolower($rif);


if(is_numeric($telefono))
{
	$versiesta =mysql_query("select * from proveedores where prov_nom = '$nombre' and prov_rif = '$rif'") or die ("error en consulta 1 ");
	  $trae=mysql_fetch_array($versiesta);
	if ($trae == 0) 
	{
		
		$insertaproveedores=mysql_query("insert into  proveedores (prov_direcc,prov_cod_tlf,prov_tlf,prov_nom,prov_rif,prov_correo,prov_fecha) VALUES (' $direccion','$cod_tlf','$telefono','$nombre','$rif','$correo','$fecha')") or die ("Errooooor en el insert 1");
		
		
	    $login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		$evento="Se Ingreso Provedor:  ".$nombre;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
		
		
		echo "<script language='JavaScript'> alert('PROVEEDOR REGISTRADO'); </script>";
		
	}
	else
	{
		echo "<script language='JavaScript'> alert('EL PROVEEDOR YA SE ENCUENTRA REGISTRADO'); </script>";
	}
	
	
}
else
{
	echo "<script language='JavaScript'> alert('EL CAMPO TELEFONO DEBE SER NUMERICO'); </script>";
}
?>