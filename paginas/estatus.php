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

$registros = 12; 

$pagina = $_GET["pagina"];

if (!$pagina) {
$inicio = 0;
$pagina = 1;
}
else {
	$inicio = ($pagina - 1) * $registros;
}

$resultado = mysql_query("SELECT * FROM  representante join beneficiario on repre_id = benefi_idr WHERE 'visible' = 0");
$total_registros = mysql_num_rows($resultado) or die ( "<b> No hay Movimientos</b>"); 
$resultado = mysql_query("select * from representante join beneficiario on repre_id = benefi_idr WHERE 'visible' = 0 ORDER BY benefi_status DESC LIMIT $inicio, $registros");
$total_paginas = ceil($total_registros / $registros);



echo "<center>";
echo "<table text-align:center;'>";
echo "<tr style='background:#06F'>";
echo "<td><b>R.Nombre</b></td>";
echo "<td><b>R.Apellidos</b></td>";
echo "<td><b>R.CI</b></td>";
echo "<td><b>R.Fecha ing</b></td>";
echo "<td><b>B.nombre</b></td>";		
echo "<td><b>B.Apellido</b></td>";	
echo "<td><b>B.CI</b></td>";
echo "<td><b>B.Diagnostico</b></td>";
echo "<td><b>Estatus</b></td>";
echo "<td><b>Modificar</b></td>";

echo"</tr>";

while($resultados = mysql_fetch_array($resultado))
{

      echo'<form method="post" action="modifreprelist.php">';
	  echo "<tr bgcolor='#FFFACD'>";
	  echo "<td>" .$resultados['repre_nom']."</td>";
	  echo "<td>" .$resultados['repre_apell']."</td>";
	  echo "<td>" .$resultados['repre_ci']."</td>";
	  echo "<td>" .$resultados['repre_fecha_reg']."</td>";
	  echo "<td>" .$resultados['benefi_nom']."</td>";
	  echo "<td>" .$resultados['benefi_apell']."</td>";
	  echo "<td>" .$resultados['benefi_ci']."</td>";
	  echo "<td>" .$resultados['benefi_diagtco']."</td>";
	  echo "<td>" .$resultados['benefi_status']."<input type='hidden' name='estado' value='".$resultados['repre_edo_civil']."'</td>";
	  
	 
	  echo '<td><center><input type="submit" name="Enviar" value="M.Estatus"></center></td>';
	  echo"</tr> " ;	  
	  
	echo" </form>";
	
	
	$estatussuma=$resultados['benefi_status'];
	switch($estatussuma)
	{
		case('primercontacto');
		{
			
			$totalprimercontacto += 1;
		}
	}
	switch($estatussuma)
	{
		case('evaluacion');
		{
			$totalvaluacion += 1;
		}
	}
	switch($estatussuma)
	{
		case('porentregar');
		{
			$totalporentregar += 1;
		}
	}
	switch($estatussuma)
	{
		case('atendido');
		{
			$totalatendido += 1;
		}
	}
	switch($estatussuma)
	{
		case('alta');
		{
			$totalalta += 1;
		}
	}
	
	
	 
}
 echo "<tr bgcolor='#FFFACD'><td> primercontacto   ".$totalprimercontacto."</td><td> evaluacion   ".$totalvaluacion."</td><td> por entregar   ".$totalporentregar."</td><td> atendido   ".$totalatendido."</td><td> alta   ".$totalalta."</td></tr>";
 echo"</table>";
 
 if(($pagina - 1) > 0) {
echo "<a href='estatus.php?pagina=".($pagina-1)."'>< Anterior</a> ";
} 

for ($i=1; $i<=$total_paginas; $i++){
if ($pagina == $i) {
echo "<b>".$pagina."</b> ";
} else {
echo "<a href='estatus.php?pagina=$i'>$i</a> ";
} }

if(($pagina + 1)<=$total_paginas) {
echo " <a href='estatus.php?pagina=".($pagina+1)."'>Siguiente ></a>";
} 
?>


</body>
</html>
