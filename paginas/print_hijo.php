<?php
session_start();
include_once("../conexion.php");
$link=Conectarse();

require_once('class.ezpdf.php');
$pdf =& new Cezpdf('a4');

//MARGENES (Arriba,Abajo,Izquierdo,Derecho)
$pdf->ezSetCmMargins(1,1,1,1);

$queEmp = "select * from beneficiario order by benefi_fecha_reg desc";

$resEmp = mysql_query($queEmp, $link) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(				
				'benefi_nom'=>'<b>NOMBRE</b>',							
				'benefi_apell'=>'<b>APELLIDOS</b>',
				'benefi_nacidad'=>'<b>NACIONALIDAD</b>',
				'benefi_ci'=>'<b>CEDULA</b>',	
				'benefi_diagtco'=>'<b>DIAGNOSTICO</b>',
				'benefi_sexo' =>'<b>GENERO</b>',		
				'benefi_fnacimiento'=>'<b>F.NACIMIENTO</b>',
				'benefi_status'=>'<b>ESTATUS</b>',	
				'benefi_fecha_reg'=>'<b>F.REGISTRO</b>',																
			);
$options = array(
				'shadeCol'=>array(0.9,1.5,0.9),
				'xOrientation'=>'center',
				'width'=>520
			);

$txttit1 = "<b> ------------------------------------------- LISTADO DE REPRESENTADOS FUNFECO---------------------------------</b>\n";
$pdf->ezText($txttit1, 11);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezStream();

?>