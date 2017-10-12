<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<?
include_once("../conexion.php");
?>

<html>
<head>
	

</head>
<body>

<?php
echo '<center><b><a href="print_hijo.php" >IMPRIMIR LISTA REPRESENTADOS</a></b></center><br>';

$registros = 12; 

$pagina = $_GET["pagina"];

if (!$pagina) {
$inicio = 0;
$pagina = 1;
}
else {
	$inicio = ($pagina - 1) * $registros;
}

$resultado = mysql_query("select * from beneficiario WHERE 'visible' = 0");
$total_registros = mysql_num_rows($resultado) or die ( "<b> No hay Movimientos</b>");
$resultado = mysql_query("select * from beneficiario  WHERE 'visible' = 0 ORDER BY benefi_id ASC LIMIT $inicio, $registros");
$total_paginas = ceil($total_registros / $registros);





echo "<center>";
echo "<table text-align:center;'>";
echo "<tr style='background:#06F'>";
echo "<td><b>Nombre</b></td>";
echo "<td><b>Apellidos</b></td>";
echo "<td><b>Nac</b></td>";
echo "<td><b>Cedula</b></td>";
echo "<td><b>Diagnostico</b></td>";			
echo "<td><b>Sexo</b></td>";
echo "<td><b>Fecha Nac.</b></td>";
echo "<td><b>Estado</b></td>";
echo "<td><b>Modificar</b></td>";

echo"</tr>";
while($resultados = mysql_fetch_array($resultado))
{

echo'<form method="post" action="modfbene.php">';
	  echo "<tr bgcolor='#FFFACD'>";
	  echo "<td>" .$resultados['benefi_nom']."<input type='hidden' name='nombre' value='".$resultados['benefi_nom']."'</td>";
	  echo "<td>" .$resultados['benefi_apell']. "<input type='hidden' name='apellido' value='".$resultados['benefi_apell']."'</td>";
	  echo "<td>" .$resultados['benefi_nacidad']."<input type='hidden' name='nacionalidad' value='".$resultados['benefi_nacidad']."'</td>";
	  echo "<td>" .$resultados['benefi_ci']."<input type='hidden' name='cedula' value='".$resultados['benefi_ci']."'</td>";
	  echo "<td>" .$resultados['benefi_diagtco']."<input type='hidden' name='diagnostico' value='".$resultados['benefi_diagtco']."'</td>";
	   echo "<td>" .$resultados['benefi_sexo']."<input type='hidden' name='sexo' value='".$resultados['benefi_sexo']."'</td>";
	    echo "<td>" .$resultados['benefi_fnacimiento']."<input type='hidden' name='fnacimiento' value='".$resultados['benefi_fnacimiento']."'</td>";
		 echo "<td>" .$resultados['benefi_status']."</td>";
	 echo '<td><center><input type="submit" name="Enviar" value="Modificar"></center></td>';
	  echo"</tr>";
	  
	echo" </form>";
	 
}
 echo"</table>";
 
 if(($pagina - 1) > 0) {
echo "<a href='vebene.php?pagina=".($pagina-1)."'>< Anterior</a> ";
} 

for ($i=1; $i<=$total_paginas; $i++){
if ($pagina == $i) {
echo "<b>".$pagina."</b> ";
} else {
echo "<a href='vebene.php?pagina=$i'>$i</a> ";
} }

if(($pagina + 1)<=$total_paginas) {
echo " <a href='vebene.php?pagina=".($pagina+1)."'>Siguiente ></a>";
} 
?>


</body>
</html>
