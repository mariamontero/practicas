<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<?
include_once('../conexion.php');
$nombre=$_POST['nombre'];
$cedula=$_POST['cedula'];




if(unlink("../imagenes/".$cedula."/".$nombre.""))
{
	
	echo'<form action="verdocument.php" method="post">';
		echo' <input type="hidden" name="variable" value="'.$cedula.'" ';
		echo' <input type="submit" name="enviar" >';
		
		echo "<script language='JavaScript'> alert('Imagen Borrada'); </script>";
		
		
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
}echo"</tr></table>"; $login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		$evento="Elimino documento del representante con cedula:  ".$cedula;
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");

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