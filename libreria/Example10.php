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


$selectid0=mysql_query("SELECT * FROM  invent_ingreso WHERE ingres_fech_i >= '$desd' and ingres_fech_i <= '$hast'") or die ("error en el select");

while($iddet=mysql_fetch_array($selectid0))
		{
			$listofecm=$añodesde."-12-01";
			$listofectm=$añodesde."-12-31";
			
			$verahoram=mysql_query("SELECT * FROM  invent_ingreso WHERE ingres_fech_i >= '$listofecm' and ingres_fech_i <= '$listofectm'");
			$cuantom=mysql_num_rows($verahoram);
			//
			
			$listofecl=$añodesde."-11-01";
			$listofectl=$añodesde."-11-30";
			
			$verahoral=mysql_query("SELECT * FROM  invent_ingreso WHERE ingres_fech_i >= '$listofecl' and ingres_fech_i <=  '$listofectl'");
			$cuantol=mysql_num_rows($verahoral);
			//
			
			$listofeck=$añodesde."-10-01";
			$listofectk=$añodesde."-10-31";
			
			$verahorak=mysql_query("SELECT * FROM  invent_ingreso WHERE ingres_fech_i >= '$listofeck' and ingres_fech_i <= '$listofectk'");
			$cuantok=mysql_num_rows($verahorak);
			//
			$listofecj=$añodesde."-09-01";
			$listofectj=$añodesde."-09-30";
			
			$verahoraj=mysql_query("SELECT * FROM  invent_ingreso WHERE ingres_fech_i >= '$listofecj' and ingres_fech_i <= '$listofectj'");
			$cuantoj=mysql_num_rows($verahoraj);
			//
			$listofec=$añodesde."-08-01";
			$listofect=$añodesde."-08-31";
			$verahora=mysql_query("SELECT * FROM  invent_ingreso WHERE ingres_fech_i >= '$listofec' and ingres_fech_i <= '$listofect' ");
			$cuanto=mysql_num_rows($verahora);
			//
			$listofecc=$añodesde."-07-01";
			$listofectc=$añodesde."-07-31";
			
			$verahoraa=mysql_query("SELECT * FROM  invent_ingreso WHERE ingres_fech_i >= '$listofecc' and ingres_fech_i <= '$listofectc' ");
			$cuantoo=mysql_num_rows($verahoraa);
			//
			$listofecd=$añodesde."-06-01";
			$listofectd=$añodesde."-06-30";
			
			$verahorad=mysql_query("SELECT * FROM  invent_ingreso WHERE ingres_fech_i >= '$listofecd' and ingres_fech_i <=  '$listofectd' ");
			$cuantod=mysql_num_rows($verahorad);
			//
			$listofece=$añodesde."-05-01";
			$listofecte=$añodesde."-05-31";
			
			$verahorae=mysql_query("SELECT * FROM  invent_ingreso WHERE ingres_fech_i >= '$listofece' and ingres_fech_i <= '$listofecte' ");
			$cuantoe=mysql_num_rows($verahorae);
			//
			$listofecf=$añodesde."-04-01";
			$listofectf=$añodesde."-04-30";
			
			$verahoraf=mysql_query("SELECT * FROM  invent_ingreso WHERE ingres_fech_i >= '$listofecf' and ingres_fech_i <= '$listofectf' ");
			$cuantof=mysql_num_rows($verahoraf);
			
			//
			$listofecg=$añodesde."-03-01";
			$listofectg=$añodesde."-03-31";
			
			$verahorag=mysql_query("SELECT * FROM  invent_ingreso WHERE ingres_fech_i >= '$listofecg' and ingres_fech_i <= '$listofectg' ");
			$cuantog=mysql_num_rows($verahorag);
			//
			$listofech=$añodesde."-02-01";
			$listofecth=$añodesde."-02-28";
			
			$verahorah=mysql_query("SELECT * FROM  invent_ingreso WHERE ingres_fech_i >= '$listofech' and ingres_fech_i <= '$listofecth' ");
			$cuantoh=mysql_num_rows($verahorah);
			//
			$listofeci=$añodesde."-01-01";
			$listofecti=$añodesde."-01-31";
			
			$verahorai=mysql_query("SELECT * FROM  invent_ingreso WHERE ingres_fech_i >= '$listofeci' and ingres_fech_i <= '$listofecti' ");
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
 
 
 $DataSet->AddPoint(array($enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre),"Serie1");
 
 
 $DataSet->AddPoint(array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"),"Serie2");
 $DataSet->AddAllSeries();
 $DataSet->SetAbsciseLabelSerie("Serie2");

 // Initialise the graph
 $Test = new pChart(450,250);
 $Test->drawFilledRoundedRectangle(7,7,413,243,5,240,240,200);// dibuja lleno de rectangulo redondeado gris
 $Test->drawRoundedRectangle(5,5,415,245,5,230,230,230);
 $Test->createColorGradientPalette(195,204,56,223,110,41,20);// paleta de colores de degradado

 // Draw the pie chart
 $Test->setFontProperties("Fonts/tahoma.ttf",8);// letra
 $Test->AntialiasQuality = 0;
 $Test->drawPieGraph($DataSet->GetData(),$DataSet->GetDataDescription(),170,130,110,PIE_PERCENTAGE_LABEL,FALSE,50,20,6);
 $Test->drawPieLegend(330,12,$DataSet->GetData(),$DataSet->GetDataDescription(),250,250,250);

 // Write the title
 $Test->setFontProperties("Fonts/MankSans.ttf",10);//titulo
 $Test->drawTitle(10,20,"Meses",$añodesde,100,100,100); echo "Estadistica del año".$añodesde; // nombre y posicion

 $Test->Render("example10.png");  
 
 echo '<center><img src="Example10.png" border="0" width="450" height="250"></center>';
 
 }
 }
else
{
	echo "<script language='JavaScript'> alert('EL AÑO SELECCIONADO DEVE SER E MISMO EN ANBAS CASILLAS!'); </script>";
}	 
?>

	
