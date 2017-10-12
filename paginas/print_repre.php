<?php
session_start();
include_once("../conexion.php");
$link=Conectarse();

require_once('class.ezpdf.php');
$pdf =& new Cezpdf('a4','landscape');

//MARGENES (Arriba,Abajo,Izquierdo,Derecho)
$pdf->ezSetCmMargins(1,1,1,1);

$queEmp = "select * from representante order by repre_fecha_reg desc";

$resEmp = mysql_query($queEmp, $link) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(				
			    'repre_nom'=>'<b>NOMBRE</b>',							
				'repre_apell'=>'<b>APELLIDOS</b>',
				'repre_nacidad'=>'<b>NACIONALIDAD</b>',
				'repre_ci'=>'<b>CEDULA</b>',	
				'repre_dirc'=>'<b>DIRECCION</b>',
				'codcasa' =>'<b>COD.TEL</b>',		
				'repre_tlf'=>'<b>TELEFONO</b>',
				'repre_cod_cel'=>'<b>COD.MOV</b>',	
				'repre_movil'=>'<b>MOVIL</b>',						
				'repre_num_hijos'=>'<b>N.HIJOS</b>',
				'repre_edo_civil'=>'<b>ESTADO CIVIL</b>',
				'repre_tbja'=>'<b>TRABAJA</b>',	
				'repre_vivda'=>'<b>POSEE.VIVIENDA</b>',				
				'repre_fecha_reg'=>'<b>FECHA.INGRESO</b>',																	
			);
$options = array(
				'shadeCol'=>array(0.9,1.5,0.9),
				'xOrientation'=>'center',
				'width'=>760
			);

$txttit1 = "<b> ----------------------------------------------------------------------  LISTADO DE REPRESENTANTES FUNFECO   -------------------------------------------------------------------------</b>\n";
$pdf->ezText($txttit1, 11);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezStream();

?>