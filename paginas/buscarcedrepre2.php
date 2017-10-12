<html>
<head>
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
</head>
<body>
<?php
include_once("../conexion.php");
 //iniciamos buscador
 
$busqueda=trim($_POST['busccedula']); 
  
  
  
  $consultaa=mysql_query("select * from representante where repre_ci like '$busqueda'") or die("error en el select 1");
	$cont = mysql_fetch_array($consultaa);
	$tod=$cont['id_art'];
	

	if ($cont == 0)
	{
		echo "<script language='JavaScript'> alert('La cedula no se encuentra registrada'); </script>";
	}
	else
	{
  
  
    
	$traeidt=$cont['id'];
	

  $consulta = "select * from representante join beneficiario on representante.repre_id = beneficiario.benefi_idr  where  repre_ci = '$busqueda'";
$las=mysql_query($consulta);

?>

<center><table style="border:1px #FF0000; color:#000000; width:990px; text-align:center;">
<tr style="background:#06F;">
 <td><b>Nombre del padre</b></td>
    <td><b>ApellidosR</b></td>
	<td><b>Telefono</b></td>
	<td><b>FechaRegistro</b></td>
	<td><b>Nombre</b></td>
	<td><b>Apellido</b></td>
	<td><b>Diagnostico</b></td>
    <td><b>Estado</b></td>
	</tr> 

<?php 
 
   while($consultprod = mysql_fetch_array($las))
	{
	
	 echo "<tr bgcolor='#FFFACD'>";
	 echo " 		<td>".$consultprod["repre_nom"]."</td>";
	 echo " 		<td>".$consultprod["repre_apell"]."</td>";
	 echo " 		<td>".$consultprod["repre_tlf"]."</td>";
	 echo " 		<td>".$consultprod["repre_fecha_reg"]."</td>";
	 echo " 		<td>".$consultprod["benefi_nom"]."</td>";
	 echo " 		<td>".$consultprod["benefi_apell"]."</td>";
	 echo " 		<td>".$consultprod["benefi_diagtco"]."</td>";
	 echo " 		<td>".$consultprod["benefi_status"]."</td>";
     echo "</tr>";
	
	 
  }
  
?>

</table><br />
</center>
<?php
}
?>
</body></html>