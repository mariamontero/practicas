
<html>
<head>
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
</head>
<body>
<?php
ini_alter('date.timezone','America/Caracas');
 $desde=$_POST['mes1'];
$hasta=$_POST['mes2'];

include_once('../conexion.php');

$añodesde=$desde['0'].$desde['1'].$desde['2'].$desde['3'];
$añohasta=$hasta['0'].$hasta['1'].$hasta['2'].$hasta['3'];
if ($añodesde == $añohasta)
{
$mesdesde=$desde['5'].$desde['6'];
$meshasta=$hasta['5'].$hasta['6'];

$diadesde="01";
$diahasta="01";

$desd=$añodesde."-".$mesdesde."-".$diadesde;
$hast=$añohasta."-".$meshasta."-".$diahasta;


$selectid0=mysql_query("select * from salidas where salid_fecha >= '$desd' and  salid_fecha <= '$hast'") or die ("error en el select");

while($iddet=mysql_fetch_array($selectid0))
		{
			$listofecm=$añodesde."-12-01";
			$listofectm=$añodesde."-12-31";
			
			$verahoram=mysql_query("select * from salidas where salid_fecha >= '$listofecm' and  salid_fecha <= '$listofectm'  ");
			$cuantom=mysql_num_rows($verahoram);
			//
			
			$listofecl=$añodesde."-11-01";
			$listofectl=$añodesde."-11-30";
			
			$verahoral=mysql_query(" select * from salidas where salid_fecha >= '$listofecl' and  salid_fecha <= '$listofectl'");
			$cuantol=mysql_num_rows($verahoral);
			//
			
			$listofeck=$añodesde."-10-01";
			$listofectk=$añodesde."-10-31";
			
			$verahorak=mysql_query("select * from salidas where salid_fecha >= '$listofeck' and  salid_fecha <= '$listofectk' ");
			$cuantok=mysql_num_rows($verahorak);
			//
			$listofecj=$añodesde."-09-01";
			$listofectj=$añodesde."-09-30";
			
			$verahoraj=mysql_query("select * from salidas where salid_fecha >= '$listofecj' and  salid_fecha <= '$listofectj'");
			$cuantoj=mysql_num_rows($verahoraj);
			//
			$listofec=$añodesde."-08-01";
			$listofect=$añodesde."-08-31";
			$verahora=mysql_query("select * from salidas where salid_fecha >= '$listofec' and  salid_fecha <= '$listofect'");
			$cuanto=mysql_num_rows($verahora);
			//
			$listofecc=$añodesde."-07-01";
			$listofectc=$añodesde."-07-31";
			
			$verahoraa=mysql_query("select * from salidas where salid_fecha >= '$listofecc' and  salid_fecha <= '$listofectc' ");
			$cuantoo=mysql_num_rows($verahoraa);
			//
			$listofecd=$añodesde."-06-01";
			$listofectd=$añodesde."-06-30";
			
			$verahorad=mysql_query("select * from salidas where salid_fecha >= '$listofecd' and  salid_fecha <= '$listofectd'");
			$cuantod=mysql_num_rows($verahorad);
			//
			$listofece=$añodesde."-05-01";
			$listofecte=$añodesde."-05-31";
			
			$verahorae=mysql_query("select * from salidas where salid_fecha >= '$listofece' and  salid_fecha <= '$listofecte'");
			$cuantoe=mysql_num_rows($verahorae);
			//
			$listofecf=$añodesde."-04-01";
			$listofectf=$añodesde."-04-30";
			
			$verahoraf=mysql_query("select * from salidas where salid_fecha >= '$listofecf' and  salid_fecha <= '$listofectf'");
			$cuantof=mysql_num_rows($verahoraf);
			
			//
			$listofecg=$añodesde."-03-01";
			$listofectg=$añodesde."-03-31";
			
			$verahorag=mysql_query("select * from salidas where salid_fecha >= '$listofecg' and  salid_fecha <= '$listofectg'");
			$cuantog=mysql_num_rows($verahorag);
			//
			$listofech=$añodesde."-02-01";
			$listofecth=$añodesde."-02-28";
			
			$verahorah=mysql_query("select * from salidas where salid_fecha >= '$listofech' and  salid_fecha <= '$listofecth'");
			$cuantoh=mysql_num_rows($verahorah);
			//
			$listofeci=$añodesde."-01-01";
			$listofecti=$añodesde."-01-31";
			
			$verahorai=mysql_query("select * from salidas where salid_fecha >= '$listofeci' and  salid_fecha <= '$listofecti'");
			$cuantoi=mysql_num_rows($verahorai);
			 
	    }
		

if($mesdesde >= $meshasta)
{
	echo "<script language='JavaScript'> alert('Deve introducir Un Mes Mayor En La Segunda Casilla!'); </script>";
}
else
{
	$mesdesde=(int)$mesdesde;
	$meshasta=(int)$meshasta;

	for($mesdesde=$mesdesde; $mesdesde <= $meshasta; $mesdesde++)
	{
	
		$mes=$mesdesde;	
		
	 switch($mes) { case ('12'); {$diciembre=$cuantom;}}
	 switch($mes) { case ('11'); {$noviembre=$cuantol;}}
	 switch($mes) { case ('10'); {$octubre=$cuantok;}}
	 switch($mes) { case ('9'); {$septiembre=$cuantoj;}}
	 switch($mes) { case ('8'); {$agosto=$cuanto;}}
	 switch($mes) { case ('7'); {$julio=$cuantoo;}}
	 switch($mes) { case ('6'); {$junio=$cuantod;}}
	 switch($mes) { case ('5'); {$mayo=$cuantoe;}}
	 switch($mes) { case ('4'); {$abril=$cuantof;}}
	 switch($mes) { case ('3'); {$marzo=$cuantog;}}
	 switch($mes) { case ('2'); {$febrero=$cuantoh;}}
	 switch($mes) { case ('1'); {$enero=$cuantoi;}}
	 

	
	}

$diciembre.$noviembre.$octubre.$septiembre.$agosto.$julio.$junio.$mayo.$abril.$marzo.$febrero.$enero;

    // Example10 : A 3D exploded pie graph
 

 // Standard inclusions   
 include("pChart/pData.class");
 include("pChart/pChart.class");
 

 

 // Dataset definition 
 $DataSet = new pData;
 $DataSet->AddPoint(array($enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre),"MESES");
 $DataSet->AddPoint(array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"),"Serie3");
 $DataSet->AddAllSeries();
 $DataSet->RemoveSerie("Serie3");
 $DataSet->SetAbsciseLabelSerie("Serie3");


 


 // Initialise the graph
 $Test = new pChart(700,230);
 $Test->drawGraphAreaGradient(132,153,172,50,TARGET_BACKGROUND);

 // Graph area setup
 $Test->setFontProperties("Fonts/tahoma.ttf",8);
 $Test->setGraphArea(60,20,585,180);
 $Test->drawGraphArea(213,217,221,FALSE);
 $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,213,217,221,TRUE,0,2);
 $Test->drawGraphAreaGradient(162,183,202,50);
 $Test->drawGrid(4,TRUE,230,230,230,20);

 // Draw the line chart
 $Test->setShadowProperties(3,3,0,0,0,30,4);
 $Test->drawLineGraph($DataSet->GetData(),$DataSet->GetDataDescription());
 $Test->clearShadow();
 $Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(),4,2,-1,-1,-1,TRUE);

 // Draw the legend
 $Test->setFontProperties("Fonts/tahoma.ttf",8);
 $Test->drawLegend(605,142,$DataSet->GetDataDescription(),236,238,240,52,58,82);

 // Draw the title
 $Title = "ESTADISTICAS DE ATENDIDOS FUNFECO";
 $Test->drawTextBox(0,210,700,230,$Title,0,255,255,255,ALIGN_RIGHT,TRUE,0,0,0,30);

 // Render the picture
 $Test->addBorder(2);
 $Test->Render("example21.png");
 
  echo '<center><img src="Example21.png" border="0" width="650" height="270"></center>';
 
  }
 }
else
{
	echo "<script language='JavaScript'> alert('EL AÑO SELECCIONADO DEVE SER E MISMO EN ANBAS CASILLAS!'); </script>";
	
}	 
?>