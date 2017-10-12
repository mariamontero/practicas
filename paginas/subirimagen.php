<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<html>
<head>
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
</head>
</html>
<?
include_once('../conexion.php');

$fecha=trim($_POST['fecha']);
$rcedula=trim($_POST['cedula']);
$bnombre=trim($_POST['bnombre']);

$bnombre=strtolower($bnombre);

$a=$_FILES['imagen1'];
$b=$_FILES['imagen2'];
$c=$_FILES['imagen3'];
$d=$_FILES['imagen4'];
$e=$_FILES['imagen5'];
$f=$_FILES['imagen6'];
$g=$_FILES['imagen7'];
if($a=="" and $b=="" and $c=="" and $d=="" and $e=="" and $f=="" and $g=="")
{
	echo "<script language='JavaScript'> alert('DEBE INSERTAR ALGUNA IMAGEN'); </script>";
	
}
else
{
	

$vesiesta=mysql_query("select * from representante where repre_ci like '$rcedula'") or die ("error en el select 1");
$esta=(mysql_fetch_array($vesiesta));
if ($esta == "")
{
	echo "<script language='JavaScript'> alert('CEDULA NO REGISTRADA'); </script>";
	
	
}
else
{
	$idrepre=$esta['repre_id'];
	
	
	$select2=mysql_query("select * from beneficiario where benefi_idr = '$idrepre' and benefi_nom = '$bnombre'") or die ("errorrr");
	$trajo=mysql_fetch_array($select2);
	
	if ($trajo == "0")
	{
		echo "<script language='JavaScript'> alert('EL NOMBRE DEL NIÑO NO ESTA REGISTRADO U ASIGNADO A UN REPRESENTANTE'); </script>";
	}
	else
	{
	
	//imagen
	$cedulaveri=$esta['repre_ci'];
	$archi="../imagenes/".$cedulaveri."";
	if(file_exists($archi))

	{
		//foto familiar con carpet
		$imagen=$_FILES['imagen7'];
		$nombre=$_FILES['imagen7'] ["name"];
		$archivo="../imagenes/".$cedulaveri."/".$nombre;




		while(file_exists($archivo))
		{
			mt_srand(time());
			$numero = mt_rand(0,1000);
			$aux=explode(".",$nombre);
			$tamano= sizeof($aux);
	
			$extencion=$aux[$tamano-1];//recoge la extencion de la imagen
			$pos=0;
			$nombre="";
			while ($pos<$tamano-1)//excluye la extencion para crear en nombre
			{
				$nombre.=$aux[$pos];
				$pos=$pos+1;
			}
			$nombre=$nombre.$numero.".".$extencion;
			$archivo="../imagenes/".$nombre;

		}

		$nombre=$nombre;
		if (move_uploaded_file($imagen["tmp_name"],"../imagenes/".$cedulaveri."/".$nombre))
			{
	
			}
			else
			{
	
			}
		
		//carta de resiencia con carpet
		$imagen=$_FILES['imagen6'];
		$nombre=$_FILES['imagen6'] ["name"];
		$archivo="../imagenes/".$cedulaveri."/".$nombre;




		while(file_exists($archivo))
		{
			mt_srand(time());
			$numero = mt_rand(0,1000);
			$aux=explode(".",$nombre);
			$tamano= sizeof($aux);
	
			$extencion=$aux[$tamano-1];//recoge la extencion de la imagen
			$pos=0;
			$nombre="";
			while ($pos<$tamano-1)//excluye la extencion para crear en nombre
			{
				$nombre.=$aux[$pos];
				$pos=$pos+1;
			}
			$nombre=$nombre.$numero.".".$extencion;
			$archivo="../imagenes/".$nombre;

		}

		$nombre=$nombre;
		if (move_uploaded_file($imagen["tmp_name"],"../imagenes/".$cedulaveri."/".$nombre))
			{

			}
			else
			{
	
			}
			
			//solicitud a mano con carpet
		$imagen=$_FILES['imagen5'];
		$nombre=$_FILES['imagen5'] ["name"];
		$archivo="../imagenes/".$cedulaveri."/".$nombre;




		while(file_exists($archivo))
		{
			mt_srand(time());
			$numero = mt_rand(0,1000);
			$aux=explode(".",$nombre);
			$tamano= sizeof($aux);
	
			$extencion=$aux[$tamano-1];//recoge la extencion de la imagen
			$pos=0;
			$nombre="";
			while ($pos<$tamano-1)//excluye la extencion para crear en nombre
			{
				$nombre.=$aux[$pos];
				$pos=$pos+1;
			}
			$nombre=$nombre.$numero.".".$extencion;
			$archivo="../imagenes/".$nombre;

		}

		$nombre=$nombre;
		if (move_uploaded_file($imagen["tmp_name"],"../imagenes/".$cedulaveri."/".$nombre))
			{

			}
			else
			{
	
			}
			
			//partida nacimient repre con carpet
		$imagen=$_FILES['imagen4'];
		$nombre=$_FILES['imagen4'] ["name"];
		$archivo="../imagenes/".$cedulaveri."/".$nombre;




		while(file_exists($archivo))
		{
			mt_srand(time());
			$numero = mt_rand(0,1000);
			$aux=explode(".",$nombre);
			$tamano= sizeof($aux);
	
			$extencion=$aux[$tamano-1];//recoge la extencion de la imagen
			$pos=0;
			$nombre="";
			while ($pos<$tamano-1)//excluye la extencion para crear en nombre
			{
				$nombre.=$aux[$pos];
				$pos=$pos+1;
			}
			$nombre=$nombre.$numero.".".$extencion;
			$archivo="../imagenes/".$nombre;

		}

		$nombre=$nombre;
		if (move_uploaded_file($imagen["tmp_name"],"../imagenes/".$cedulaveri."/".$nombre))
			{

			}
			else
			{
	
			}
		//copia cedula repre con carpet
		$imagen=$_FILES['imagen3'];
		$nombre=$_FILES['imagen3'] ["name"];
		$archivo="../imagenes/".$cedulaveri."/".$nombre;




		while(file_exists($archivo))
		{
			mt_srand(time());
			$numero = mt_rand(0,1000);
			$aux=explode(".",$nombre);
			$tamano= sizeof($aux);
	
			$extencion=$aux[$tamano-1];//recoge la extencion de la imagen
			$pos=0;
			$nombre="";
			while ($pos<$tamano-1)//excluye la extencion para crear en nombre
			{
				$nombre.=$aux[$pos];
				$pos=$pos+1;
			}
			$nombre=$nombre.$numero.".".$extencion;
			$archivo="../imagenes/".$nombre;

		}

		$nombre=$nombre;
		if (move_uploaded_file($imagen["tmp_name"],"../imagenes/".$cedulaveri."/".$nombre))
			{

			}
			else
			{
	
			}
		
		
		//partia de nacimiento con carpeta
		$imagen=$_FILES['imagen2'];
		$nombre=$_FILES['imagen2'] ["name"];
		$archivo="../imagenes/".$cedulaveri."/".$nombre;




		while(file_exists($archivo))
		{
			mt_srand(time());
			$numero = mt_rand(0,1000);
			$aux=explode(".",$nombre);
			$tamano= sizeof($aux);
	
			$extencion=$aux[$tamano-1];//recoge la extencion de la imagen
			$pos=0;
			$nombre="";
			while ($pos<$tamano-1)//excluye la extencion para crear en nombre
			{
				$nombre.=$aux[$pos];
				$pos=$pos+1;
			}
			$nombre=$nombre.$numero.".".$extencion;
			$archivo="../imagenes/".$nombre;

		}

		$nombre=$nombre;
		if (move_uploaded_file($imagen["tmp_name"],"../imagenes/".$cedulaveri."/".$nombre))
			{

			}
			else
			{
	
			}

			//informe medico con carpeta
			$imagen=$_FILES['imagen1'];
			$nombre=$_FILES['imagen1'] ["name"];
			$archivo="../imagenes/".$cedulaveri."/".$nombre;




			while(file_exists($archivo))
			{
				mt_srand(time());
				$numero = mt_rand(0,1000);
				$aux=explode(".",$nombre);
				$tamano= sizeof($aux);
	
				$extencion=$aux[$tamano-1];//recoge la extencion de la imagen
				$pos=0;
				$nombre="";
				while ($pos<$tamano-1)//excluye la extencion para crear en nombre
				{
					$nombre.=$aux[$pos];
					$pos=$pos+1;
				}
				$nombre=$nombre.$numero.".".$extencion;
				$archivo="../imagenes/".$nombre;

			}

			$nombre=$nombre;
			if (move_uploaded_file($imagen["tmp_name"],"../imagenes/".$cedulaveri."/".$nombre))
			{
				
			}
			else
			{

			}	
	}
	else 
	{
		$estructura = '../imagenes/'.$cedulaveri;
		if(!mkdir($estructura, 0777, true)) 

		{
				die('Fallo al crear las carpetas...');
		}
	
	
	
		else
		{
			//foto familiar sin carpeta
			$imagen=$_FILES['imagen7'];
			$nombre=$_FILES['imagen7'] ["name"];
			$archivo="../imagenes/".$cedulaveri."/".$nombre;




			while(file_exists($archivo))
			{
				mt_srand(time());
				$numero = mt_rand(0,1000);
				$aux=explode(".",$nombre);
				$tamano= sizeof($aux);
	
				$extencion=$aux[$tamano-1];//recoge la extencion de la imagen
				$pos=0;
				$nombre="";
				while ($pos<$tamano-1)//excluye la extencion para crear en nombre
					{
						$nombre.=$aux[$pos];
						$pos=$pos+1;
					}
				$nombre=$nombre.$numero.".".$extencion;
				$archivo="../imagenes/".$nombre;

			}

			$nombre=$nombre;
			if (move_uploaded_file($imagen["tmp_name"],"../imagenes/".$cedulaveri."/".$nombre))
				{

				}
			else
			{
				
			}
			
			//carta de residencia sin carpeta
			$imagen=$_FILES['imagen6'];
			$nombre=$_FILES['imagen6'] ["name"];
			$archivo="../imagenes/".$cedulaveri."/".$nombre;




			while(file_exists($archivo))
			{
				mt_srand(time());
				$numero = mt_rand(0,1000);
				$aux=explode(".",$nombre);
				$tamano= sizeof($aux);
	
				$extencion=$aux[$tamano-1];//recoge la extencion de la imagen
				$pos=0;
				$nombre="";
				while ($pos<$tamano-1)//excluye la extencion para crear en nombre
					{
						$nombre.=$aux[$pos];
						$pos=$pos+1;
					}
				$nombre=$nombre.$numero.".".$extencion;
				$archivo="../imagenes/".$nombre;

			}

			$nombre=$nombre;
			if (move_uploaded_file($imagen["tmp_name"],"../imagenes/".$cedulaveri."/".$nombre))
				{
					
				}
			else
			{
				
			}
			//solicitud a mano sin carpeta
			$imagen=$_FILES['imagen5'];
			$nombre=$_FILES['imagen5'] ["name"];
			$archivo="../imagenes/".$cedulaveri."/".$nombre;




			while(file_exists($archivo))
			{
				mt_srand(time());
				$numero = mt_rand(0,1000);
				$aux=explode(".",$nombre);
				$tamano= sizeof($aux);
	
				$extencion=$aux[$tamano-1];//recoge la extencion de la imagen
				$pos=0;
				$nombre="";
				while ($pos<$tamano-1)//excluye la extencion para crear en nombre
					{
						$nombre.=$aux[$pos];
						$pos=$pos+1;
					}
				$nombre=$nombre.$numero.".".$extencion;
				$archivo="../imagenes/".$nombre;

			}

			$nombre=$nombre;
			if (move_uploaded_file($imagen["tmp_name"],"../imagenes/".$cedulaveri."/".$nombre))
				{
					
				}
			else
			{
				
			}
			//partida de nac repre sin carpeta
			$imagen=$_FILES['imagen4'];
			$nombre=$_FILES['imagen4'] ["name"];
			$archivo="../imagenes/".$cedulaveri."/".$nombre;




			while(file_exists($archivo))
			{
				mt_srand(time());
				$numero = mt_rand(0,1000);
				$aux=explode(".",$nombre);
				$tamano= sizeof($aux);
	
				$extencion=$aux[$tamano-1];//recoge la extencion de la imagen
				$pos=0;
				$nombre="";
				while ($pos<$tamano-1)//excluye la extencion para crear en nombre
					{
						$nombre.=$aux[$pos];
						$pos=$pos+1;
					}
				$nombre=$nombre.$numero.".".$extencion;
				$archivo="../imagenes/".$nombre;

			}

			$nombre=$nombre;
			if (move_uploaded_file($imagen["tmp_name"],"../imagenes/".$cedulaveri."/".$nombre))
				{
					
				}
			else
			{
				
			}
			
			//copia cedula repre sin carpeta
			$imagen=$_FILES['imagen3'];
			$nombre=$_FILES['imagen3'] ["name"];
			$archivo="../imagenes/".$cedulaveri."/".$nombre;




			while(file_exists($archivo))
			{
				mt_srand(time());
				$numero = mt_rand(0,1000);
				$aux=explode(".",$nombre);
				$tamano= sizeof($aux);
	
				$extencion=$aux[$tamano-1];//recoge la extencion de la imagen
				$pos=0;
				$nombre="";
				while ($pos<$tamano-1)//excluye la extencion para crear en nombre
					{
						$nombre.=$aux[$pos];
						$pos=$pos+1;
					}
				$nombre=$nombre.$numero.".".$extencion;
				$archivo="../imagenes/".$nombre;

			}

			$nombre=$nombre;
			if (move_uploaded_file($imagen["tmp_name"],"../imagenes/".$cedulaveri."/".$nombre))
				{
					
				}
			else
			{
				
			}
			//partida de nacimiento del paciente sin carpeta
			$imagen=$_FILES['imagen2'];
			$nombre=$_FILES['imagen2'] ["name"];
			$archivo="../imagenes/".$cedulaveri."/".$nombre;




			while(file_exists($archivo))
			{
				mt_srand(time());
				$numero = mt_rand(0,1000);
				$aux=explode(".",$nombre);
				$tamano= sizeof($aux);
	
				$extencion=$aux[$tamano-1];//recoge la extencion de la imagen
				$pos=0;
				$nombre="";
				while ($pos<$tamano-1)//excluye la extencion para crear en nombre
					{
						$nombre.=$aux[$pos];
						$pos=$pos+1;
					}
				$nombre=$nombre.$numero.".".$extencion;
				$archivo="../imagenes/".$nombre;

			}

			$nombre=$nombre;
			if (move_uploaded_file($imagen["tmp_name"],"../imagenes/".$cedulaveri."/".$nombre))
				{
					
				}
			else
			{
				
			}

			//infmr medico sin carpeta
			$imagen=$_FILES['imagen1'];
			$nombre=$_FILES['imagen1'] ["name"];
			$archivo="../imagenes/".$cedulaveri."/".$nombre;




			while(file_exists($archivo))
			{
				mt_srand(time());
				$numero = mt_rand(0,1000);
				$aux=explode(".",$nombre);
				$tamano= sizeof($aux);
	
				$extencion=$aux[$tamano-1];//recoge la extencion de la imagen
				$pos=0;
				$nombre="";
				while ($pos<$tamano-1)//dexcluye la extencion para crear en nombre
				{
					$nombre.=$aux[$pos];
					$pos=$pos+1;
				}
					$nombre=$nombre.$numero.".".$extencion;
					$archivo="../imagenes/".$nombre;

			}

			$nombre=$nombre;
			if (move_uploaded_file($imagen["tmp_name"],"../imagenes/".$cedulaveri."/".$nombre))
			{
		
			}
			else
			{
		
			}
		}
	 }
	 
	
	    $login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		$evento="subir documento del ciudadano con cedula:  ".$rcedula;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
	 
	 
	echo "<script language='JavaScript'> alert('SUBIDO CORRECTAMENTE'); </script>";
	}
	}}
	
?>