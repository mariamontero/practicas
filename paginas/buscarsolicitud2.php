<html>
<head>
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
</head>
<body>
<?php
include_once("../conexion.php");
 //iniciamos buscador
 
$busqueda=trim($_POST['cedula']); 
  
  
   $consulta=mysql_query("select * from representante where cedula like '$busqueda'") or die("error en el select 1");
	$cont = mysql_fetch_array($consulta);
	$tod=$cont['id_art'];
	

	if ($cont == 0)
	{
		echo "la cedula no se encuentra registrada";
	}
	else
	{
		
		$idbucar=$cont['id'];
		
		
  $select="select * from representante join beneficiario join solicitudes on representante.id = beneficiario.idr and representante.id = solicitudes.idb  where  idr = '$idbucar'";
$las=mysql_query($select);
   
  
  echo "<center>";
echo "<table text-align:center;'>";
echo "<tr style='background:#06F'>";
echo "<td><b>Nombre R.</b></td>";
echo "<td><b>Apellidos R.</b></td>";
echo "<td><b>Nombre</b></td>";
echo "<td><b>Apellido</b></td>";
echo "<td><b>Diagnostico</b></td>";			
echo "<td><b>Solicitud</b></td>";
echo "<td><b>Fecha de solicitud</b></td>";
echo "<td><b>Estado</b></td>";


echo"</tr>";

while($resultados = mysql_fetch_array($las))
{
	  echo "<tr bgcolor='#FFFACD'>";
	
	
	
	  
	  echo "<td>" .$resultados['nombres']."'</td>";
	  
	  
	  echo "<td>" .$resultados['apellidos']."'</td>";
	  echo "<td>" .$resultados['nombre']."'</td>";
	  echo "<td>" .$resultados['apellido']."'</td>";
	  echo "<td>" .$resultados['diagnostico']."'</td>";
	   echo "<td>" .$resultados['solicitud']."'</td>";
	    echo "<td>" .$resultados['fecha']."'</td>";
		 echo "<td>" .$resultados['estado']."</td>";
	  echo"</tr>";
  
}  
	}
  
  
  
?>
</body></html>