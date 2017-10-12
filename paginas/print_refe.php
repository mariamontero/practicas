<?php
session_start();
include_once("../conexion.php");
$link=Conectarse();

require_once('class.ezpdf.php');
$pdf =& new Cezpdf('a4');

//MARGENES (Arriba,Abajo,Izquierdo,Derecho)
$pdf->ezSetCmMargins(1,1,1,1);

$queEmp = "select * from referencias order by refe_id desc";

$resEmp = mysql_query($queEmp, $link) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(				
				'refe_nom'=>'<b>NOMBRE</b>',							
				'refe_apell'=>'<b>APELLIDOS</b>',
				'refe_nacidad'=>'<b>NACIONALIDAD</b>',
				'refe_ci'=>'<b>CEDULA</b>',	
				'refecodcasa'=>'<b>COD.TEL</b>',
				'refe_tlf' =>'<b>TELEFONO</b>',		
				'refe_cod_cel'=>'<b>COD.MOVIL</b>',
				'refe_movil'=>'<b>MOVIL</b>',	
				'refe_direc'=>'<b>DIRECCIÓN</b>',																
			);
$options = array(
				'shadeCol'=>array(0.9,1.5,0.9),
				'xOrientation'=>'center',
				'width'=>520
			);

$txttit1 = "<b> ------------------------------------------- LISTADO DE REFERENCIAS FUNFECO---------------------------------</b>\n";
$pdf->ezText($txttit1, 11);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezStream();

?>