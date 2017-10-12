
<?
include_once("../conexion.php");
?>

<html>
<head>
	
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
</head>
<body>

<?php

$select="select * from representante join beneficiario join solicitudes on representante.id = beneficiario.idr and representante.id = solicitudes.idb";
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
echo "<td><b>Eliminar</b></td>";

echo"</tr>";
while($resultados = mysql_fetch_array($las))
{

echo'<form method="post" action="veelimsoli2.php">';
	  echo "<tr bgcolor='#FFFACD'>";
	
	$idb=$resultados['idb'];
	echo"<input type='hidden'  name='idb'   value='$idb'> ";
	
	  
	  echo "<td>" .$resultados['nombres']."<input type='hidden' name='nombre' value='".$resultados['nombres']."'</td>";
	  
	  
	  echo "<td>" .$resultados['apellidos']. "<input type='hidden' name='apellido' value='".$resultados['apellidos']."'</td>";
	  echo "<td>" .$resultados['nombre']."<input type='hidden' name='nombre' value='".$resultados['nombre']."'</td>";
	  echo "<td>" .$resultados['apellido']."<input type='hidden' name='apellido' value='".$resultados['apellido']."'</td>";
	  echo "<td>" .$resultados['diagnostico']."<input type='hidden' name='diagnostico' value='".$resultados['diagnostico']."'</td>";
	   echo "<td>" .$resultados['solicitud']."<input type='hidden' name='solicitud' value='".$resultados['solicitud']."'</td>";
	    echo "<td>" .$resultados['fecha']."<input type='hidden' name='fecha' value='".$resultados['fecha']."'</td>";
		 echo "<td>" .$resultados['estado']."</td>";
	 echo '<td><center><input type="submit" name="Enviar" value="Eliminar"></center></td>';
	  echo"</tr>";
	  
	echo" </form>";
	 
}
 echo"</table>";
?>


</body>
</html>
