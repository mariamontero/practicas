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

$cedularepre=trim($_POST['cedurepre']);
$nombre=trim($_POST['nombre']);
$apellido=trim($_POST['apellido']);
$nacionalidad=trim($_POST['nacionalidad']);
$cedula=trim($_POST['cedula']);
$sexo=trim($_POST['sexo']);
$diagnotico=trim($_POST['diagnostico']);
$fnacimiento=trim($_POST['fnacimiento']);
$fecharegiss=trim($_POST['fecha']);

$nombre=strtolower($nombre);
$apellido=strtolower($apellido);
$diagnotico=strtolower($diagnotico);

if(is_numeric($cedularepre))

{

$consul=mysql_query("select repre_id from representante where repre_ci like '$cedularepre'") or die ("error en el select 1");
$resultado = mysql_fetch_array($consul);

			if ($resultado == 0)
			{
				echo "<script language='JavaScript'> alert('la cedula del representante no esta registrada!'); </script>";
			
			}
			
			else
				
			{
				
				
				
				$id_repre = $resultado['repre_id'];
				$estado = "primer contacto";
				
				$consulta=mysql_query("select * from beneficiario where benefi_ci = '$cedula' and benefi_apell = '$apellido' and benefi_diagtco = '$diagnotico'") or die ("error en el select de ver si el niño ya esta registrado");
$resultad = mysql_fetch_array($consulta);

			if ($resultad == 0)
			{
				if($cedula== "")
				{
					$cedulano="no posee";
					
					$insert=mysql_query("insert into beneficiario (benefi_idr,benefi_nom,benefi_apell,benefi_nacidad,benefi_ci,benefi_diagtco,benefi_sexo,benefi_fnacimiento,benefi_status,benefi_fecha_reg) VALUES ('$id_repre','$nombre','$apellido','$nacionalidad','$cedulano','$diagnostico','$sexo','$fnacimiento','$estado','$fecharegiss')") or die ("error en el insert 1"); 	
					
					$login=$_SESSION['s_username'];
		$evento="Ingreso representado  ".$nombre;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fecharegiss')") or die ("error en el insert historial");			
		
		echo "<script language='JavaScript'> alert('representado registrado!'); </script>";
		
					
					
				}
				else
				{
				
				
				$insert=mysql_query("insert into beneficiario (benefi_idr,benefi_nom,benefi_apell,benefi_nacidad,benefi_ci,benefi_diagtco,benefi_sexo,benefi_fnacimiento,benefi_status,benefi_fecha_reg) VALUES ('$id_repre','$nombre','$apellido','$nacionalidad','$cedula','$diagnostico','$sexo','$fnacimiento','$estado','$fecharegiss')") or die ("error en el insert 1"); 
				
				$login=$_SESSION['s_username'];
		$evento="Ingreso representado  ".$nombre;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fecharegiss')") or die ("error en el insert historial");						
		
		echo "<script language='JavaScript'> alert('representado registrado!'); </script>";
		
				
				
				}
			}
			else
				
			{
				
				echo "<script language='JavaScript'> alert('el represenado ya esta registrado!'); </script>";
				
					
			}
				
					
			}
			
			
			
}
else
{
	echo "<script language='JavaScript'> alert('los campos 'cedula' deben ser numerico!'); </script>";
	
}
				
?>
</body>
</html>