<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<? include_once("../conexion.php");?>
<html>
<head>
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
</head>
<body>

<div id="versolici">




<?
echo '<center><b><a href="print_solic.php" >IMPRIMIR LISTA SOLICITUDES PENDIENTES</a></b></center><br>';
$registros = 12; 

$pagina = $_GET["pagina"];

if (!$pagina) {
$inicio = 0;
$pagina = 1;
}
else {
	$inicio = ($pagina - 1) * $registros;
}



$estado="activo";

$muestra=mysql_query("select * from beneficiario join representante join solicitudes join demandas where benefi_idr = repre_id and benefi_id = solic_id_b and solic_estado = '$estado' and solic_id_demand = demand_id and 'visible' = 0 ");

$total_registros = mysql_num_rows($muestra) or die ( "<b>No HaY Solicitudes En Sistema</b>"); 

$muestra=mysql_query("select * from beneficiario join representante join solicitudes join demandas where benefi_idr = repre_id and benefi_id = solic_id_b and solic_estado = '$estado' and solic_id_demand = demand_id and 'visible' = 0 ORDER BY repre_id ASC LIMIT $inicio, $registros");
$total_paginas = ceil($total_registros / $registros);

echo"<center>";
echo "<table text-align:center;'>";
echo "<tr style='background:#06F'>";
echo"<td><b>nombre representante</b></td>";
echo"<td><b>apellido representante</b></td>";
echo"<td><b> CI Representante</b></td>";

echo"<td><b>Nombre Representado</b></td>";
echo"<td><b>Apellido Representado</b></td>";
echo"<td><b>Diagnostico</b></td>";



echo"<td><b>Tipo</b></td>";
echo"<td><b>Nombre</b></td>";
echo"<td><b>Descripcion</b></td>";
echo"<td><b>eliminar</b></td>";
echo"</tr>";

while($trae=mysql_fetch_array($muestra))
{
echo"<form action='elim_solic.php' method='post'>";

echo "<tr bgcolor='#FFFACD'>";
echo"<td>".$trae['repre_nom']."</td>";
echo"<td>".$trae['repre_apell']."</td>";
echo"<td>".$trae['repre_ci']."</td>";
echo"<td>".$trae['benefi_nom']."</td>";
echo"<td>".$trae['benefi_apell']."</td>";
echo"<td>".$trae['benefi_diagtco']."</td>";

echo"<td>".$trae['demand_tipo']."</td>";
echo"<td>".$trae['demand_nombre']."</td>";
echo"<td>".$trae['demand_descrip']."</td>";
echo"<td><input type='submit' value='eliminar'></td>";
echo"<input type='hidden' name='idhijo' value=".$trae['benefi_id'].">";
echo"<input type='hidden' name='idrepresent' value=".$trae['repre_id'].">";
echo"<input type='hidden' name='idsoli' value=".$trae['solic_id'].">";
echo"</tr></form>";	
}



echo"</table>";


 if(($pagina - 1) > 0) {
echo "<a href='versolic.php?pagina=".($pagina-1)."'>< Anterior</a> ";
} 

for ($i=1; $i<=$total_paginas; $i++){
if ($pagina == $i) {
echo "<b>".$pagina."</b> ";
} else {
echo "<a href='versolic.php?pagina=$i'>$i</a> ";
} }

if(($pagina + 1)<=$total_paginas) {
echo " <a href='versolic.php?pagina=".($pagina+1)."'>Siguiente ></a>";
} 
echo"</center>";
?>

</div>
</body>
</html>
