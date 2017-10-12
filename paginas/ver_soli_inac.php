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
echo '<center><b><a href="print_solic_act.php" >IMPRIMIR LISTA SOLICITUDES ENTREGADAS</a></b></center><br>';


$registros = 12; 

$pagina = $_GET["pagina"];

if (!$pagina) {
$inicio = 0;
$pagina = 1;
}
else {
	$inicio = ($pagina - 1) * $registros;
}





$muestra=mysql_query("select DISTINCT salid_id,repre_nom,repre_apell,repre_ci,benefi_nom,benefi_apell,benefi_diagtco, 	inven_tipo,inven_nom,inven_descrip,salid_cantid, salid_fecha from  beneficiario join representante join solicitudes join salidas join inventario  where salid_id_repre = repre_id and salid_id_benefac = benefi_id and salid_id_invent =  inven_id and 'visible' = 0 ");

$total_registros = mysql_num_rows($muestra) or die ( "<b>No HaY Solicitudes Relizadas En Sistema</b>"); 

$muestra=mysql_query("select DISTINCT salid_id,repre_nom,repre_apell,repre_ci,benefi_nom,benefi_apell,benefi_diagtco, 	inven_tipo,inven_nom,inven_descrip,salid_cantid,salid_fecha  from  beneficiario join representante join solicitudes join salidas join inventario  where salid_id_repre = repre_id and salid_id_benefac = benefi_id and salid_id_invent =  inven_id and 'visible' = 0 ORDER BY salid_fecha  DESC LIMIT $inicio, $registros");
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
echo"<td><b>Cantidad</b></td>";
echo"<td><b>Fecha Entrega</b></td>";
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

echo"<td>".$trae['inven_tipo']."</td>";
echo"<td>".$trae['inven_nom']."</td>";
echo"<td>".$trae['inven_descrip']."</td>";
echo"<td>".$trae['salid_cantid']."</td>";
echo"<td>".$trae['salid_fecha']."</td>";
echo"</tr></form>";	
}



echo"</table>";


 if(($pagina - 1) > 0) {
echo "<a href='ver_soli_inac.php?pagina=".($pagina-1)."'>< Anterior</a> ";
} 

for ($i=1; $i<=$total_paginas; $i++){
if ($pagina == $i) {
echo "<b>".$pagina."</b> ";
} else {
echo "<a href='ver_soli_inac.php?pagina=$i'>$i</a> ";
} }

if(($pagina + 1)<=$total_paginas) {
echo " <a href='ver_soli_inac.php?pagina=".($pagina+1)."'>Siguiente ></a>";
} 
echo"</center>";
?>

</div>
</body>
</html>
