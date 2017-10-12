<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>

<html>
<head>	
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
</head>
<body>
<? include_once("../conexion.php");?>


<?
$nombrenino=$_POST['nombrenino'];
$cedular=$_POST['cedula'];
$fecha=$_POST['fecha'];


$nombreexis=$_POST['nombre'];
$nombre=$_POST['nombreexis'];


$tipox=$_POST['tipox'];


$descripcion=$_POST['descripcion'];
$descripcionx=$_POST['descripcionx'];

if($descripcion != "" and $descripcionx != "")
{
	echo "<script language='JavaScript'> alert('menu existente e inexistente llenos, llene solo un menu!'); </script>";
}
else
{





if($descripcion != "" and $descripcionx == "")
{
	if(is_numeric($cedular))
	{
		$vecedesta=mysql_query("select * from representante where repre_ci like '$cedular'")  or die ("error en el select 1");
		$votaresultads=mysql_num_rows($vecedesta);
		if($votaresultads == 0)
		{
			echo "<script language='JavaScript'> alert('Disculpe La Cedula Insertada No Se Encuentra Registrada!'); </script>";
		}
		else
		{
		    $traerepre=mysql_fetch_array($vecedesta);
			
			$idrepre=$traerepre['repre_id'];
			
			
			$nombrenino=strtolower($nombrenino);

   			$venameesta=mysql_query("select * from beneficiario where benefi_nom like '$nombrenino'") or die ("error en el select 2 ");
			$traenombre=mysql_num_rows($venameesta);
			
			if($traenombre == 0)
			{
				echo "<script language='JavaScript'> alert('El Nombre Del Niño (a) No Se Encuentra Registrado!'); </script>";
			}
			else
			{
				$vesininoyrepre=mysql_query("select * from beneficiario where benefi_nom = '$nombrenino' and benefi_idr = '$idrepre'") or die ("error en el select 3");
				
				$traenumresultds=mysql_num_rows($vesininoyrepre);
				if($traenumresultds == 0)
				{
					echo "<script language='JavaScript'> alert('El Representante No Coincide Con El Representado!'); </script>";
					
				}
				else
				{
					$idveneficiario=mysql_fetch_array($vesininoyrepre);
					
				$idnino=$idveneficiario['benefi_id'];
				
				
				
				$muestretipo=mysql_query("select inven_tipo from inventario where inven_nom = '$nombre' and inven_descrip = '$descripcion'") or die ("error en el select 4");
				$traetipo=mysql_fetch_array($muestretipo);
				
				$defintipo=$traetipo['inven_tipo'];
				$cantidad = 1;
				
				$vesiestademand=mysql_query("select * from demandas where demand_tipo = '$defintipo' and demand_nombre = '$nombre' and demand_descrip = '$descripcion'") or die ("error en el select 5");
				
				$resultadtrae=mysql_num_rows($vesiestademand);
				if ($resultadtrae == 0)
				{ 
				$insertardemand=mysql_query("insert into demandas (demand_tipo,demand_nombre,demand_descrip,demand_canti) VALUES ('$defintipo','$nombre','$descripcion','$cantidad')") or die ("error en el insert 1");
				
				
				$traeriddeman=mysql_query("select * from demandas where demand_tipo = '$defintipo' and demand_nombre = '$nombre' and demand_descrip = '$descripcion'") or die ("error en el select 6");
				
				$traeidinsertad=mysql_fetch_array($traeriddeman);
				$idinertado=$traeidinsertad['demand_id'];
				
				$estado="activo";
				
				$insertasoliccomplet=mysql_query("insert into solicitudes (solic_id_b,solic_id_demand,solic_fecha,solic_estado) VALUES ('$idnino','$idinertado','$fecha','$estado')") or die ("error en el insert 2");
				
				
		
	    $login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		$evento="SE a insertado solicitud a nombre del representante con cecula:  ".$cedular;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
	
				 
				echo "<script language='JavaScript'> alert('Solicitud Realizada Con Exito!'); </script>";
				
				
				}
				else
				{
					$traesusarray=mysql_fetch_array($vesiestademand);
					
					$cantidaddemand=$traesusarray['demand_canti'];
					$iddemand=$traesusarray['demand_id'];
					
					if($cantidaddemand >= 10)
					{
						echo "<script language='JavaScript'> alert('Este Articulo Ya Contiene 10 Demandas No Es Posible Agregar Mas!'); </script>";
					}
					else
					{
					$totalcanti = $cantidaddemand + $cantidad;
					
					$cargarr=mysql_query("update demandas set demand_canti = '$totalcanti' where demand_id = '$iddemand'") or die ("error en el cargar");
				
				
				
					
				
				$idinertado=$traesusarray['demand_id'];
				
				$estado="activo";
				
				$insertasoliccomplet=mysql_query("insert into solicitudes (solic_id_b,solic_id_demand,solic_fecha,solic_estado) VALUES ('$idnino','$idinertado','$fecha','$estado')") or die ("error en el insert 3");
				
				
				 $login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		$evento="SE a insertado solicitud a nombre del representante con cecula:  ".$cedular;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
				
				
				echo "<script language='JavaScript'> alert('Solicitud Realizada Con Exito!'); </script>";
					
					}
					
					
					
				}
				
		
				
				
				
				
				
					
					
				}
				
				
			}
			
			
		}
		
		
		
		
	}
	else
	{
		echo "<script language='JavaScript'> alert('Disculpe El Campo Cedula Deve Ser Numerico!'); </script>";
	}
}
else
{
if($descripcionx != "" and $descripcion == "")

	
	{
		if ($tipox == "-seleccione-")
		{
			echo "<script language='JavaScript'> alert('Disculpe seleccione un tipo valido!'); </script>";
		}
		else
		{
	   $nombreexis=strtolower($nombreexis);
	   $descripcionx=strtolower($descripcionx);
		
		if(is_numeric($cedular))
	{
		

		
		$vecedesta=mysql_query("select * from representante where repre_ci like '$cedular'")  or die ("error en el select 1");
		$votaresultads=mysql_num_rows($vecedesta);
		if($votaresultads == 0)
		{
			echo "<script language='JavaScript'> alert('Disculpe La Cedula Insertada No Se Encuentra Registrada!'); </script>";
		}
		else
		{
		    $traerepre=mysql_fetch_array($vecedesta);
			
			$idrepre=$traerepre['repre_id'];
			
			
			$nombrenino=strtolower($nombrenino);

   			$venameesta=mysql_query("select * from beneficiario where benefi_nom like '$nombrenino'") or die ("error en el select 2 ");
			$traenombre=mysql_num_rows($venameesta);
			
			if($traenombre == 0)
			{
				echo "<script language='JavaScript'> alert('El Nombre Del Niño (a) No Se Encuentra Registrado!'); </script>";
			}
			else
			{
				$vesininoyrepre=mysql_query("select * from beneficiario where benefi_nom = '$nombrenino' and benefi_idr = '$idrepre'") or die ("error en el select 3");
				
				$traenumresultds=mysql_num_rows($vesininoyrepre);
				if($traenumresultds == 0)
				{
					echo "<script language='JavaScript'> alert('El Representante No Coincide Con El Representado!'); </script>";
					
				}
				else
				{
					$idveneficiario=mysql_fetch_array($vesininoyrepre);
					
				$idnino=$idveneficiario['benefi_id'];
				
				
				
				
				
				$defintipo=$tipox;
				$cantidad = 1;
				
				
				$vesiestademand=mysql_query("select * from demandas where demand_tipo = '$defintipo' and demand_nombre = '$nombreexis' and demand_descrip = '$descripcionx'") or die ("error en el select 5");
				
				$resultadtrae=mysql_num_rows($vesiestademand);
				if ($resultadtrae == 0)
				{ 
				$insertardemand=mysql_query("insert into demandas (demand_tipo,demand_nombre,demand_descrip,demand_canti) VALUES ('$defintipo','$nombreexis','$descripcionx','$cantidad')") or die ("error en el insert 1");
				
				
				$traeriddeman=mysql_query("select * from demandas where demand_tipo = '$defintipo' and demand_nombre = '$nombreexis' and demand_descrip = '$descripcionx'") or die ("error en el select 6");
				
				$traeidinsertad=mysql_fetch_array($traeriddeman);
				$idinertado=$traeidinsertad['demand_id'];
				
				$estado="activo";
				$insertasoliccomplet=mysql_query("insert into solicitudes (solic_id_b,solic_id_demand,solic_fecha,solic_estado) VALUES ('$idnino','$idinertado','$fecha','$estado')") or die ("error en el insert 2");
				
				
				echo "<script language='JavaScript'> alert('Solicitud Realizada Con Exito!'); </script>";
				
				
				}
				else
				{
					$traesusarray=mysql_fetch_array($vesiestademand);
					
					$cantidaddemand=$traesusarray['demand_canti'];
					$iddemand=$traesusarray['demand_id'];
					
					if($cantidaddemand >= 10)
					{
						echo "<script language='JavaScript'> alert('Este Articulo Ya Contiene 10 Demandas No Es Posible Agregar Mas!'); </script>";
					}
					else
					{
					$totalcanti = $cantidaddemand + $cantidad;
					
					$cargarr=mysql_query("update demandas set demand_canti = '$totalcanti' where demand_id = '$iddemand'") or die ("error en el cargar");
				
				
				
					
				
				$idinertado=$traesusarray['demand_id'];
				
				$estado="activo";
				
				$insertasoliccomplet=mysql_query("insert into solicitudes (solic_id_b,solic_id_demand,solic_fecha,solic_estado) VALUES ('$idnino','$idinertado','$fecha','$estado')") or die ("error en el insert 3");
				
				
				echo "<script language='JavaScript'> alert('Solicitud Realizada Con Exito!'); </script>";
					
					}
					
					
					
				}
				
		
				
				
				
				
				
					
					
				}
				
				
			}
			
			
		}
		
		
		
		
	}
	else
	{
		echo "<script language='JavaScript'> alert('Disculpe El Campo Cedula Deve Ser Numerico!'); </script>";
	}
		}
	}
	

	else
	{
		echo "<script language='JavaScript'> alert('Deve Ingresar Una Describcion'); </script>";
		
	}
}




}
?>
</body></html>