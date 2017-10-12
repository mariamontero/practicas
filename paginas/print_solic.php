<?php
session_start();
include_once("../conexion.php");
$link=Conectarse();

require_once('class.ezpdf.php');
$pdf =& new Cezpdf('a4','landscape');

//MARGENES (Arriba,Abajo,Izquierdo,Derecho)
$pdf->ezSetCmMargins(1,1,1,1);
$estado=activo;
$queEmp = "select * from beneficiario join representante join solicitudes join demandas where benefi_idr = repre_id and benefi_id = solic_id_b and solic_estado = '$estado' and solic_id_demand = demand_id ORDER BY repre_id DESC";

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
				'demand_tipo'=>'<b>TIPO</b>',	
				'demand_nombre'=>'<b>NOMBRE</b>',
				'demand_descrip'=>'<b>DESCRIPCION</b>',							
				'solic_fecha'=>'<b>FECHA.SOLICITUD</b>',
																				
			);
$options = array(
				'shadeCol'=>array(0.9,1.5,0.9),
				'xOrientation'=>'center',
				'width'=>750
			);

$txttit1 = "<b> -------------------------------------------------------------------- LISTADO DE SOLICITUDES PEDIENTES FUNFECO--------------------------------------------------------------</b>\n";
$pdf->ezText($txttit1, 11);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezStream();

?>