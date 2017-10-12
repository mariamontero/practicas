<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?
include_once("../conexion.php");

$var=$_POST['variable'];
if(is_numeric($var))
{
	$cedula=$_POST['cedula'];
	
	$verced = mysql_query("select * from representante where repre_ci like '$cedula'") or die ("error en el elect 1");
	$result= mysql_fetch_array($verced);
	if ($result == 0)
	{
		echo "<script language='JavaScript'> alert('Cedula Errónea o no Registrada'); </script>";
	}
	else
	{
		function valida_imagen($imagen)
		{
			$rdo= 0;
			if(ereg("[Jj][Pp][Gg]",$imagen)) $rdo = 1; //validar extenciones
			if(ereg("[Gg][Ii][Ff]",$imagen)) $rdo = 1;
			if(ereg("[Pp][Nn][Gg]",$imagen)) $rdo = 1;
			if(ereg("[Bb][Nn][Pp]",$imagen)) $rdo = 1;
				 
				 return $rdo;
		}
		
		$puntero = opendir('../imagenes/'.$cedula.'');
		$img = 1;
	
	echo"<table><tr>";
	
		while(false!==($imagenes=readdir($puntero)))
		{
			
			
			if($imagenes!="." && $imagenes!="..")
			{
				
				if($img == 1)
				{
				echo"<td><a href='../imagenes/".$cedula."/$imagenes' > </td>";
				
				
				echo"<form method='post' action='elimin_img.php'>";
				echo"<td>";
				echo"<input type='hidden' name='nombre' value='".$imagenes."'>";
				echo"<input type='hidden' name='cedula' value='".$cedula."'>";
				
				echo"<img onclick='javascript:this.width=650;this.height=738' ondblclick='javascript:this.width=100;this.height=80' src='../imagenes/".$cedula."/$imagenes' with=100 height=100></img></td>";
				
				echo"<td><input type='submit' value='Eliminar'></form></td>";
				
			
				echo"</a>";
				
				
				
					}
				
				
				
		
	} 
}echo"</tr></table>";

}
}
else
{
?>
<div>
<h2>Documentos del Representante</h2>
<div>
<form action="verdocument.php" method="post">
<input required type="text" name="cedula" placeholder="Cedula Representante">
<input type="hidden" name="variable" value="1">
<input type="submit" value="ver">
</form>
</div>




</div>
<?
}
?>
</body>
</html>