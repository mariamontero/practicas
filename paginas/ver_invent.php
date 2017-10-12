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
echo '<center><b><a href="print_invent.php" >IMPRIMIR LISTADO DE INVENTARIO</a></b></center><br>';

$elimx=$_POST['b'];// es b value de 3 para eliminar
if($elimx == 3)
{

$cantidad = trim($_POST['cantidadd']);
$proveedor = trim($_POST['proveedor']);
$fechai = trim($_POST['fechaingreso']);
$fechav = trim($_POST['fechavencimiento']);
$idarticulo = trim($_POST['idarticulo']);
$iddetaart = trim($_POST['iddetaart']);



$query=mysql_query("delete from invent_ingreso where ingres_id = '$iddetaart' and ingres_id_art = '$idarticulo' and ingres_fech_i = '$fechai' and ingres_fech_v = '$fechav' and  ingres_id_prov = '$proveedor' and ingres_canti = '$cantidad'") or die ("error en el delete");

$select=mysql_query("select inven_canti from inventario where inven_id = '$idarticulo'") or die ("error select");
$trae=mysql_fetch_array($select);
$cantidadactual=$trae['inven_canti'];

$cantidadtotal=$cantidadactual - $cantidad;

$cargarr=mysql_query("update inventario set inven_canti ='$cantidadtotal' where inven_id = '$idarticulo'") or die ("error en el cargar");	

		
	    $login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		$evento="Se a eliminado la cantidad de ".$cantidad."de inventario";
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
		

echo "<script language='JavaScript'> alert('La Cantidad  A Sido Eliminada!'); </script>";

}
else
{
	
}
// parte elimina por 1 la e arriba es cantidad

$elimxx=$_POST['c'];// es c value de 4 para eliminar
if($elimxx == 4)
{
$cantidad = trim($_POST['cantidadd']);
$proveedor = trim($_POST['proveedor']);
$fechai = trim($_POST['fechaingreso']);
$fechav = trim($_POST['fechavencimiento']);
$idarticulo = trim($_POST['idarticulo']);
$iddetaart = trim($_POST['iddetaart']);



$selectt=mysql_query("select ingres_canti from invent_ingreso where ingres_id = '$iddetaart' and ingres_id_art = '$idarticulo' and ingres_fech_i = '$fechai' and ingres_fech_v = '$fechav' and  ingres_id_prov = '$proveedor' and ingres_canti = '$cantidad'") or die ("error select");
$traee=mysql_fetch_array($selectt);
$cantidadactuall=$traee['ingres_canti'];
if($cantidadactuall == 0)
{
	echo "<script language='JavaScript'> alert('El Articulo Se Agoto!'); </script>";
}
else
{
$cantidadrestante=$cantidadactuall - 1;



$query=mysql_query("update invent_ingreso set ingres_canti ='$cantidadrestante' where ingres_id = '$iddetaart' and ingres_id_art = '$idarticulo' and ingres_fech_i = '$fechai' and ingres_fech_v = '$fechav' and  ingres_id_prov = '$proveedor' and ingres_canti = '$cantidad'") or die ("error en el cargar");

$select=mysql_query("select inven_canti from inventario where inven_id = '$idarticulo'") or die ("error select");
$trae=mysql_fetch_array($select);
$cantidadactual=$trae['inven_canti'];


$cantidadtotal=$cantidadactual - 1;

$cargarr=mysql_query("update inventario set inven_canti ='$cantidadtotal' where inven_id = '$idarticulo'") or die ("error en el cargar");	

       $wdqwd=$trae['inven_nom'];
        $login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		$evento="Se a eliminado la cantidad de 1 del inventario del articulo".$wdqwd;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");

echo "<script language='JavaScript'> alert('La Cantidad  De 1 Se a Eliminado!'); </script>";
		
		
	}
}
else
		{
		}



echo "<div id='veinvent'>";

$registros = 12;
$pagin=$_POST['pagin'];

if($pagin == "")
{

	$pagina = $_GET["pagina"];

	if (!$pagina)
	 {
	$inicio = 0;
	$pagina = 1;
	 }
	else 
	{
		$inicio = ($pagina - 1) * $registros;
	}

}
else
{
	$pagina=$pagin;
	$inicio = ($pagina - 1) * $registros;
}


$resultado = mysql_query("select * from inventario WHERE 'visible' = 0");
$total_registros = mysql_num_rows($resultado) or die ( "<b> No hay Movimientos</b>"); 
$resultado = mysql_query("select * from inventario  WHERE 'visible' = 0 ORDER BY inven_tipo ASC LIMIT $inicio, $registros");
$total_paginas = ceil($total_registros / $registros);//ceil evuelve el valor mas alto





echo "<center>";
echo "<table text-align:center;'>";
echo "<tr style='background:#06F'>";
echo "<td><b>tipo</b></td>";
echo "<td><b>Nombre</b></td>";
echo "<td><b>Cantidad actual</b></td>";
echo "<td><b>Descripcion</b></td>";
echo "<td><b>Modificar</b></td>";
echo "<td><b>Detalles</b></td>";


		
		
echo"</tr>";
while ($resultados = mysql_fetch_array($resultado))
{

echo'<form method="post" action="mod_invent.php">';
	  echo "<tr bgcolor='#FFFACD'>";
	  echo "<td>" .$resultados['inven_tipo']."<input type='hidden' name='tipo' value='".$resultados['inven_tipo']."'</td>";
	  echo "<td>" .$resultados['inven_nom']. "<input type='hidden' name='nombre' value='".$resultados['inven_nom']."'</td>";
	  echo "<td>" .$resultados['inven_canti']."<input type='hidden' name='cantidad' value='".$resultados['inven_canti']."'</td>";	
	  echo "<td>" .$resultados['inven_descrip']."<input type='hidden' name='descripcion' value='".$resultados['inven_descrip']."'</td>";
	  	echo "<input type='hidden' name='id' value='".$resultados['inven_id']."'>";
	   echo '<td><center><input type="submit" name="Enviar" value="Modificar"></center></td>';
	  
	  
	echo"</form>";
	
	echo'<form method="post" action="ver_invent.php">';
	 
	echo"<input type='hidden' name='tipo' value='".$resultados['inven_tipo']."'</td>";
	echo"<input type='hidden' name='nombre' value='".$resultados['inven_nom']."'</td>"; 
	 echo"<input type='hidden' name='cantidad' value='".$resultados['inven_canti']."'</td>";
	  echo"<input type='hidden' name='descripcion' value='".$resultados['inven_descrip']."'</td>";
	
	  echo"<input type='hidden' name='pagin' value='".$pagina."'</td>";
	  
	   echo"<input type='hidden' name='a' value='2'>";
	 echo '<td><input type="submit" value="Destalles"></td>';
	
	
	 echo"</form>";
  
}
 echo"</tr></table>";

 if(($pagina - 1) > 0) {
echo "<a href='ver_invent.php?pagina=".($pagina-1)."'>< Anterior</a> ";
} 

for ($i=1; $i<=$total_paginas; $i++){
if ($pagina == $i) {
echo "<b>".$pagina."</b> ";
} else {
echo "<a href='ver_invent.php?pagina=$i'>$i</a> ";
} }

if(($pagina + 1)<=$total_paginas) {
echo " <a href='ver_invent.php?pagina=".($pagina+1)."'>Siguiente ></a>";
}
echo"</div>"; 
	
	
	//parte derecha detales
	
	
	
	$llega=$_POST['a'];
	if ($llega == 2)
	{
	
		echo'<div id="detainv">';

$tipo=$_POST['tipo'];
$nombre=$_POST['nombre'];
$cantidad=$_POST['cantidad'];
$descripcion=$_POST['descripcion'];



$select=mysql_query(" select inven_id from inventario where inven_tipo = '$tipo' and inven_nom = '$nombre' and inven_descrip = '$descripcion'") or die (" error en el select 1");
$resultados = mysql_fetch_array($select);
$el_id = $resultados['inven_id'];


$resultado=mysql_query("select * from invent_ingreso where ingres_id_art = '$el_id'") or die ( "error en el select 2");
$total_registros = mysql_num_rows($resultado) or die ("<script language='JavaScript'> alert('No Existen Registros!'); </script>");


echo "<center>";
echo "<table text-align:center;'>";
echo "<tr style='background:#06F'>";
echo "<td><b>Cantidad</b></td>";
echo "<td><b>Proveedor</b></td>";
echo "<td><b>Fecha Ingreso</b></td>";
echo "<td><b>Fecha Vencimiento</b></td>";
echo "<td><b>Eliminar Cant.</b></td>";
echo "<td><b>Eliminar 1 art</b></td>";



echo"</tr>";
while($resultados = mysql_fetch_array($resultado))
{
{
echo'<form method="post" action="ver_invent.php">';
	  echo "<tr bgcolor='#FFFACD'>";
	  echo "<td>" .$resultados['ingres_canti']."<input type='hidden' name='cantidad' value='".$resultados['ingres_canti']."'</td>";
	  
	  
	  
	  
	  echo "<input type='hidden' name='proveedor' value='".$resultados['ingres_id_prov']."'</td>";
	  $idprov=$resultados['ingres_id_prov'];
	  $consult=mysql_query("select prov_nom from proveedores where prov_id like '$idprov'") or die ("error el el name proveedor");
	  $resultaprov=mysql_fetch_array($consult);
	  $traename=$resultaprov['prov_nom'];
	  echo "<td>".$traename."</td>";
	  
	  
	  
	  
	  echo "<td>" .$resultados['ingres_fech_i']."<input type='hidden' name='fechaingreso' value='".$resultados['ingres_fech_i']."'</td>";
	  echo "<td>" .$resultados['ingres_fech_v']."<input type='hidden' name='fechavencimiento' value='".$resultados['ingres_fech_v']."'</td>";
	  
	  
	 
	  $iddetaart=$resultados['ingres_id'];
	   echo "<input type='hidden' name='iddetaart' value='".$iddetaart."'></td>";
	   
	   echo"<input type='hidden' name='tipo' value='".$_POST['tipo']."'</td>";
	   echo"<input type='hidden' name='nombre' value='".$_POST['nombre']."'</td>";
	   echo"<input type='hidden' name='cantidad' value='".$_POST['cantidad']."'</td>";
	   echo"<input type='hidden' name='descripcion' value='".$_POST['descripcion']."'</td>";
	   echo"<input type='hidden' name='pagin' value='".$_POST["pagin"]."'</td>";
	   echo "<input type='hidden' name='cantidadd' value='".$resultados['ingres_canti']."'</td>";
	   
	  
		
		
	   
	   echo "<input type='hidden' name='a' value='2'>";
	   echo "<input type='hidden' name='b' value='3'>";
	  
	  echo " <input type='hidden' name='idarticulo' value='".$el_id."'>";
	  echo '<td><center><input type="submit" name="Enviar" value="Eliminar Cant."></center></td>'; 
	echo"</form>";
}
	
{	//parte del eliminar 1
	echo'<form method="post" action="ver_invent.php">';
	
	  echo "<input type='hidden' name='proveedor' value='".$resultados['ingres_id_prov']."'</td>";
	  echo "<input type='hidden' name='fechaingreso' value='".$resultados['ingres_fech_i']."'</td>";
	  echo "<input type='hidden' name='fechavencimiento' value='".$resultados['ingres_fech_v']."'</td>";
	  echo "<input type='hidden' name='cantidadd' value='".$resultados['ingres_canti']."'</td>"; 
	  echo "<input type='hidden' name='idarticulo' value='".$el_id."'>";
	  $iddetaart=$resultados['ingres_id'];
	  echo "<input type='hidden' name='iddetaart' value='".$iddetaart."'>";
	  echo"<input type='hidden' name='tipo' value='".$_POST['tipo']."'</td>";
	  echo"<input type='hidden' name='nombre' value='".$_POST['nombre']."'</td>";
	  echo"<input type='hidden' name='cantidad' value='".$_POST['cantidad']."'</td>";
	  echo"<input type='hidden' name='descripcion' value='".$_POST['descripcion']."'</td>";
	  echo"<input type='hidden' name='pagin' value='".$_POST["pagin"]."'</td>";
	   
	   
	   echo "<input type='hidden' name='a' value='2'>";
	   echo "<input type='hidden' name='c' value='4'>"; // variable parqa validar eliminar 1
	
	
echo '<td><center><input type="submit" name="Enviar" value="Eliminar 1"></center></td> </form>';
}
}


echo"</table></div>";	  
	  
	  

		
	}
	else
	{
	}
	
	
	
	
	
	
	
	
	
	
	 
	




	
	
?>
      
      
</body>
</html>
