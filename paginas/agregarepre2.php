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

$nombre=trim($_POST['nombre']);
$apellidos=trim($_POST['apellidos']);
$nacionalidad=trim($_POST['nacionalidad']);
$cedula=trim($_POST['cedula']);
$direccion=trim($_POST['direccion']);
$codigcasa=trim($_POST['codcasa']);
$tlf=trim($_POST['telefono']);
$codnumercel=trim($_POST['codnumercel']);
$tlfmov=trim($_POST['tlfmov']);
$numhijos=trim($_POST['numhijos']);
$edocivil=trim($_POST['edocivil']);
$trabaja=trim($_POST['trabajaac']);
$vivienda=trim($_POST['vivienda']);

$rpnombre=trim($_POST['rpnombre']);
$rpapellido=trim($_POST['rpapellido']);
$rpnacionalidad=trim($_POST['rpnacionalidad']);
$rpcedula=trim($_POST['rpcedula']);
$codigcasaa=trim($_POST['refecodcasa']);
$rptlff=trim($_POST['rptlff']);
$codnumercelr=trim($_POST['codnumercelr']);
$tlfmovr=trim($_POST['tlfmovr']);
$direccionr=trim($_POST['direccionr']);
$fechar=trim($_POST['fecha']);


$nombre=strtolower($nombre);
$apellidos=strtolower($apellidos);
$direccion=strtolower($direccion);
$edocivil=strtolower($edocivil);
$rpnombre=strtolower($rpnombre);
$rpapellido=strtolower($rpapellido);
$fechar=strtolower($fechar);



if(is_numeric($cedula) and ($tlf) and ($rpcedula ) and ($rptlff))

{
	if ($rpcedula == $cedula)
	{
		echo "<script language='JavaScript'> alert('REPRESENTANTE Y REERENCIA NO PUEDEN TENER MISMO NUMERO DE CEDULA '); </script>";
	}
	else
	{
		
	$consulta=mysql_query("select * from representante where repre_ci like '$cedula'") or die("error en el select 1");
	$cont = mysql_fetch_array($consulta);
			if ($cont == 0)
			{
				
				$consultarefe= mysql_query("select * from referencias where refe_ci = '$rpcedula'") or die("error en el select 3");
				$esta = mysql_fetch_array ($consultarefe);
				if ($esta == 0) 
			
			{
				
				$insertareferenc=mysql_query("insert into referencias (refe_nom,refe_apell,refe_ci,refecodcasa,refe_tlf,refe_nacidad,refe_cod_cel,refe_movil,refe_direc) VALUES ( '$rpnombre','$rpapellido','$rpcedula','$codigcasaa','$rptlff','$rpnacionalidad','$codnumercelr','$tlfmovr','$direccionr')") or die ("Erroor en el insert 1");
				
				$login=$_SESSION['s_username'];
		$evento="Ingreso referencia ".$rpnombre;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
				
				$cod_id=mysql_query("select refe_id from referencias where refe_ci = $rpcedula") or die ("error en el select este 2");
				$traearray=mysql_fetch_array($cod_id);
				
				$idlisto=$traearray['refe_id'];
			
			
		
				
		$insert=mysql_query("insert into representante (repre_nom,repre_apell,repre_nacidad,repre_ci,repre_dirc,codcasa,repre_tlf,repre_cod_cel,repre_movil,repre_num_hijos,repre_edo_civil,repre_tbja,repre_vivda,repre_fecha_reg,repre_id_refe) VALUES ('$nombre','$apellidos','$nacionalidad','$cedula','$direccion','$codigcasa','$tlf','$codnumercel','$tlfmov','$numhijos','$edocivil','$trabaja','$vivienda','$fechar','$idlisto')") or die ("error en el insert 3");
		
		
		
		$login=$_SESSION['s_username'];
		$evento="Ingreso representante  ".$nombre;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
		
		
		
			}
		else
		
		{
			
			$idlisto=$esta['refe_id'];
			$insert=mysql_query("insert into representante (repre_nom,repre_apell,repre_nacidad,repre_ci,repre_dirc,codcasa,repre_tlf,repre_cod_cel,repre_movil,repre_num_hijos,repre_edo_civil,repre_tbja,repre_vivda,repre_fecha_reg,repre_id_refe) VALUES ('$nombre','$apellidos','$nacionalidad','$cedula','$direccion','codigcasa','$tlf','$codnumercel','$tlfmov','$numhijos','$edocivil','$trabaja','$vivienda','$fechar','$idlisto')") or die ("error en el insert 4");	
			
			$login=$_SESSION['s_username'];
		$evento="Ingreso representante".$nombre;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial2");		
			
		}
		
		
		
		
		
		
			     			
		echo "<script language='JavaScript'> alert('REPRESENTANTE REGISTRADO'); </script>";
		
			}
			else
			{
				echo "<script language='JavaScript'> alert(' EL REPRESENTANTE YA SE ENCUENTRA REGISTRADO'); </script>";
			}
	}
}
else
{
	echo "<script language='JavaScript'> alert('CEDULA, TLF, NUM. DE HIJOS NO SON NUMERICOS'); </script>";	
}

?>

