<?php
session_start();
include_once("../conexion.php");
$link=Conectarse();

require_once('class.ezpdf.php');
$pdf =& new Cezpdf('a4','landscape');

//MARGENES (Arriba,Abajo,Izquierdo,Derecho)
$pdf->ezSetCmMargins(1,1,1,1);

$queEmp = "SELECT * FROM PROVEEDORES ORDER BY prov_fecha DESC";

$resEmp = mysql_query($queEmp, $link) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(				
				'prov_nom'=>'<b>NOMBRE</b>',							
				'prov_direcc'=>'<b>DIRECCION</b>',
				'prov_rif'=>'<b>RIF</b>',
				'prov_cod_tlf'=>'<b>CODIGO.TLF</b>',	
				'prov_tlf'=>'<b>TELEFONO</b>',
				'prov_correo'=>'<b>CORREO</b>',		
				'prov_fecha'=>'<b>FECHA.ING</b>',																	
			);
$options = array(
				'shadeCol'=>array(0.9,1.5,0.9),
				'xOrientation'=>'center',
				'width'=>760
			);

$txttit1 = "<b> --------------------------------------------------------------------------  LISTADO DE INVENTARIO FUNFECO   ----------------------------------------------------------------------------------</b>\n";
$pdf->ezText($txttit1, 11);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezStream();

?>