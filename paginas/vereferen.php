<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?><?
include_once("../conexion.php");
?>

<?php
echo '<center><b><a href="print_refe.php" >IMPRIMIR LISTA REFERENCIAS</a></b></center><br>';


$idref=trim($_POST['idref']);





$select="select * from referencias where refe_id like '$idref'";
$las=mysql_query($select);




echo "<center>";
echo "<table text-align:center;'>";
echo "<tr style='background:#06F'>";
echo "<td><b>Nombre</b></td>";
echo "<td><b>Apellidos</b></td>";
echo "<td><b>Nacionalidad</b></td>";
echo "<td><b>Cedula identidad</b></td>";
echo "<td><b>Direccion</b></td>";
echo "<td><b>Telefono</b></td>";
echo "<td><b>Movil</b></td>";
echo "<td><b>Modificar</b></td>";

echo"</tr>";

while($resultados = mysql_fetch_array($las))
{
	echo'<form method="post" action="modifrefe.php">';
	  echo "<tr bgcolor='#FFFACD'>";
	  echo "<td>" .$resultados['refe_nom']."<input type='hidden' name='nombre' value='".$resultados['refe_nom']."'</td>";
	  echo "<td>" .$resultados['refe_apell']. "<input type='hidden' name='apellidos' value='".$resultados['refe_apell']."'</td>";
	  echo "<td>" .$resultados['refe_nacidad']."<input type='hidden' name='nacionalidad' value='".$resultados['refe_nacidad']."'</td>";
	  echo "<td>" .$resultados['refe_ci']."<input type='hidden' name='cedula' value='".$resultados['refe_ci']."'</td>";
	  echo "<td>" .$resultados['refe_direc']."<input type='hidden' name='direccion' value='".$resultados['refe_direc']."'</td>";
	   echo "<td>" .$resultados['refe_tlf']."<input type='hidden' name='tlf' value='".$resultados['refe_tlf']."'</td>";
	   echo "<td>".$resultados['refe_cod_cel']."".$resultados['refe_movil']."<input type='hidden' name='codnumercel' value='".$resultados['refe_cod_cel']."'><input type='hidden' name='movil' value='".$resultados['refe_movil']."'></td>";
	   
		
	 echo '<td><center><input type="submit" name="Enviar" value="Modificar"></center></td>';
	 
	 
	echo" </form>";
	echo"</tr>";
}
	
	
?>