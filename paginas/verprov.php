<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<?
include_once("../conexion.php");
?>

<html>
<head>
	
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
</head>
<body>

<?php
echo '<center><b><a href="print_prov.php" >IMPRIMIR LISTADO DE PROVEEDORES</a></b></center><br>';



$select="select * from proveedores order by prov_id";
$las=mysql_query($select);



echo "<center>";
echo "<table text-align:center;'>";
echo "<tr style='background:#06F'>";
echo "<td><b>Nombre</b></td>";
echo "<td><b>Direccion</b></td>";

echo "<td><b>Rif</b></td>";
echo "<td><b>Telefono</b></td>";			
echo "<td><b>Correo</b></td>";
echo "<td><b>Fecha ing.</b></td>";
echo "<td><b>Modificar</b></td>";

echo"</tr>";
while($resultados = mysql_fetch_array($las))
{

echo'<form method="post" action="modfprov.php">';
	  echo "<tr bgcolor='#FFFACD'>";
	  echo "<td>" .$resultados['prov_nom']."<input type='hidden' name='nombre' value='".$resultados['prov_nom']."'</td>";		
	  
	  
	  echo "<td>" .$resultados['prov_direcc']."<input type='hidden' name='direccion' value='".$resultados['prov_direcc']."'</td>";
	  echo "<td>" .$resultados['prov_rif']."<input type='hidden' name='rif' value='".$resultados['prov_rif']."'</td>";
	  
	  echo "<td>" .$resultados['prov_cod_tlf']."".$resultados['prov_tlf']."<input type='hidden' name='codigotlf' value='".$resultados['prov_cod_tlf']."'><input type='hidden' name='telefono' value='".$resultados['prov_tlf']."'></td>";
	  
	  
	  echo "<td>" .$resultados['prov_correo']."<input type='hidden' name='correo' value='".$resultados['prov_correo']."'</td>";
	   echo "<td>" .$resultados['prov_fecha']."</td>";
	 echo '<td><center><input type="submit" name="Enviar" value="Modificar"></center></td>';
	  echo"</tr>";
	  
	echo" </form>";
	 
}
 echo"</table>";
?>


</body>
</html>
