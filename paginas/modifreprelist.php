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

$select="select * from representante join beneficiario on repre_id = benefi_idr ORDER BY benefi_status DESC";
$las=mysql_query($select);



echo "<center>";
echo "<table text-align:center;'>";
echo "<tr style='background:#06F'>";
echo "<td><b>R.Nombre</b></td>";
echo "<td><b>R.Apellidos</b></td>";
echo "<td><b>R.CI</b></td>";
echo "<td><b>R.Fecha ing</b></td>";
echo "<td><b>B.nombre</b></td>";		
echo "<td><b>B.Apellido</b></td>";	
echo "<td><b>C.CI</b></td>";
echo "<td><b>B.Diagnostico</b></td>";
echo "<td><b>Estatus</b></td>";
echo "<td><b>Modificar</b></td>";

echo"</tr>";

while($resultados = mysql_fetch_array($las))
{




echo'<form method="post" action="modifreprelistguardado.php">';
	  echo "<tr bgcolor='#FFFACD'>";
	  echo "<td>" .$resultados['repre_nom']."</td>";
	  echo "<td>" .$resultados['repre_apell']."</td>";
	  echo "<td>" .$resultados['repre_ci']."<input type='hidden' name='rcedula' value='".$resultados['repre_ci']."'</td>";
	  echo "<td>" .$resultados['repre_fecha_reg']."</td>";
	  echo "<td>" .$resultados['benefi_nom']."<input type='hidden' name='bnombre' value='".$resultados['benefi_nom']."'</td>";
	  echo "<td>" .$resultados['benefi_apell']."</td>";
	  echo "<td>" .$resultados['benefi_ci']."</td>";
	  echo "<td>" .$resultados['benefi_diagtco']."<input type='hidden' name='ddiag' value='".$resultados['benefi_diagtco']."'</td>";
	  echo "<td>";
	  echo '<select name="estads"> <option>primercontacto</option><option>evaluacion</option><option>porentregar</option><option>atendido</option><option>alta</option>';
	  echo"</td>";
	  
	 
		 echo '<td><center><input type="submit" name="Enviar" value="guardar"></center></td>';
	  echo"</tr> " ;	  
	  
	echo" </form>";
	 
}
 echo"</table>";
?>


</body>
</html>
