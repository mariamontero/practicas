


<html>
<head>
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
</head>
</html>

<?
include_once('../conexion.php');


$tipo=trim($_POST['tipo']);
$nombrep=trim($_POST['nombrep']);
$descripcion=trim($_POST['descripcion']);
$cantidad=trim($_POST['cantidad']);
$benefactor=trim($_POST['benefactor']);
$fechae=trim($_POST['fechae']);
$fechav=trim($_POST['fechav']);


if(!is_numeric($cantidad))

	{
	echo"la cantidad no es un numero";	
	}
	else
	{
		
		$consul=mysql_query("select * from inventario where tipo = '$tipo' and nombrep = '$nombrep' and descripcion = '$descripcion'") or die ("error en 1ra consulta");
		$cont = mysql_fetch_array($consul);
			if ($cont == 0)
			
		{
		
			$inserta=mysql_query("insert into inventario (tipo,cantidad,fechae,idbene,fechav,nombrep,descripcion) VALUES ('$tipo','$cantidad','$fechae','$benefactor','$fechav','$nombrep','$descripcion')") or die ("EEERRROOOOOOOORRRR");
		
		
	//agragar a productos
	
	$traeidd=mysql_query("select id from inventario where tipo = '$tipo' and nombrep = '$nombrep' and descripcion = '$descripcion' ");
	$traeid=(mysql_fetch_array($traeidd));
	$esteesid=$traeid['id'];
	//agragar a productos contar filas y agregar
	
	$i=1;
	$estado=existente;
	
	
	for($i=1; $i <= $cantidad; ++$i )
	
	{
		$inserteenpro=mysql_query("insert into productos (estado,idi) VALUES ('$estado','$esteesid') ") or die ("error en el insert productos"); 
		
	}
	
	
	
	
	
	
	
	
	echo"registrado";
	
		} 
		else
		{
			$hay=$cont['cantidad'];
			$nuevacant= ($hay + $cantidad);
			
			
			$cargarr=mysql_query("update inventario set cantidad ='$nuevacant' where tipo = '$tipo' and nombrep = '$nombrep' and descripcion = '$descripcion'") or die ("error en el cargar");
			
			$traeidd=mysql_query("select id from inventario where tipo = '$tipo' and nombrep = '$nombrep' and descripcion = '$descripcion' ");
	$traeid=(mysql_fetch_array($traeidd));
	$esteesid=$traeid['id'];
	//agragar a productos contar filas y agregar
	
	$i=1;
	$estado=existente;
	
	
	for($i=1; $i <= $cantidad; ++$i )
	
	{
		$inserteenpro=mysql_query("insert into productos (estado,idi) VALUES ('$estado','$esteesid') ") or die ("error en el insert productos"); 
		
	}
				
			
			echo"registrado";
			
		}
	
	 } 

?>
