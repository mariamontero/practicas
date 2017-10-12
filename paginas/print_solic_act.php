<?php
session_start();
include_once("../conexion.php");
$link=Conectarse();

require_once('class.ezpdf.php');
$pdf =& new Cezpdf('a4','landscape');

//MARGENES (Arriba,Abajo,Izquierdo,Derecho)
$pdf->ezSetCmMargins(1,1,1,1);

$queEmp = "select DISTINCT salid_id,repre_nom,repre_apell,repre_ci,benefi_nom,benefi_apell,benefi_diagtco, 	inven_tipo,inven_nom,inven_descrip,salid_cantid, salid_fecha from  beneficiario join representante join solicitudes join salidas join inventario  where salid_id_repre = repre_id and salid_id_benefac = benefi_id and salid_id_invent = inven_id ORDER BY salid_fecha DESC";

$resEmp = mysql_query($queEmp, $link) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(				
				'repre_nom'=>'<b>REPRE.NOMBRE </b>',							
				'repre_apell'=>'<b>REPRE.APELLIDOS </b>',
				'repre_ci'=>'<b>REPRE.CEDULA</b>',	
				'benefi_nom'=>'<b>NOM.REPRESENTADO</b>',
				'benefi_apell'=>'<b>APELL.REPRESENTADO</b>',		
				'benefi_diagtco'=>'<b>DIAGNOSTICO</b>',
				'inven_tipo'=>'<b>TIPO</b>',	
				'inven_nom'=>'<b>NOMBRE</b>',
				'inven_descrip'=>'<b>DESCRIPCION</b>',							
				'salid_cantid'=>'<b>CANTIDAD</b>',
				'salid_fecha'=>'<b>FECHA.ENTREGA</b>',																
			);
$options = array(
				'shadeCol'=>array(0.9,1.5,0.9),
				'xOrientation'=>'center',
				'width'=>760
			);

$txttit1 = "<b> ----------------------------------------------------------------  LISTADO DE SOLICITUDES ENTREGADAS FUNFECO   ----------------------------------------------------------------------</b>\n";
$pdf->ezText($txttit1, 11);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezStream();

?>