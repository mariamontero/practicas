<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../estiloss.css" type="text/css" media="screen"/>
</head>
</html>

<? include_once('../conexion.php');

$uno=$_POST['uno'];

if ($uno == "")
{

$respuesta=$_POST['respuesta'];
$usu=$_POST['usu'];
$pregunta=$_POST['pregunta'];
if($respuesta == "" )
{

$usuario=trim($_POST['usuario']);

$usuario=strtolower($usuario);



$conect=mysql_query("select username from usuarios where username = '$usuario' ") or die ("ERROR EN EL SELECT 1 ");
$trajo = mysql_fetch_array ($conect);
if ($trajo == 0 )
{
	echo "<script language='JavaScript'> alert('El Nombre De Usuario No Esta Registrado'); </script>";
	die ("<script>window.location = '../index.php'</script>");
}
else
{
	$vepregunt=mysql_query("select question from usuarios where username = '$usuario'") or die ("Error en el select 2");
	$reult=mysql_fetch_array($vepregunt);
	
	$pregunta=$reult['question'];
echo"<div id='preguntasecret'>";
echo'<center><form action="recup_usu.php" method="post">';
echo "<b>Responde La Siguiente Pregunta:</b><br>";
echo"<b>".$pregunta."</b><br><br>";
echo'<input type="password" required name="respuesta" size="25" placeholder="Respuesta">';
echo '<input type="hidden" name="usu" value="'.$usuario.'" >';
echo '<input type="hidden" name="pregunta" value="'.$pregunta.'" >';
echo' <input type="submit" value="Enviar"></center>';
echo "</div>";
}



}
else
{
	
	$respuesta=md5($respuesta);
	$vesiesta=mysql_query("select * from usuarios where username = '$usu' and question = '$pregunta' and answer = '$respuesta' ");
	
	$traje=mysql_fetch_array($vesiesta);
	if ($traje == "")
	{
		echo "<script language='JavaScript'> alert('Respuesta Incorrecta'); </script>";
		die ("<script>window.location = 'seccion.php'</script>");
	}
	else
	{
		?>
        <div id="nuevacontra">  <center>
        <b>Escriba Su Nueva Contraseña <? echo $usu; ?> </b><br><br>
        <form action="recup_usu.php" method="post">
        <input type="password" required name="contrase" placeholder="Nueva Contraseña"> (*)Al Menos 8 Caracteres
        <input type="hidden" name="respuesta" value=" <? $pregunta=$_POST['respuesta']; ?> ">
         <input type="hidden" name="pregunta" value=" <? $pregunta=$_POST['pregunta']; ?> ">
      <?  echo'<input type="hidden" name="usu" value="'.$usu.'"> <br><br>';?>
        <input type="hidden" name="uno" value="1" >
     <input type="submit" value="Guardar"></center>
        </form>
        </div>
        <?
		
	}
}

}
else

{
	$usuario=$_POST['usu'];
	$contraseña=$_POST['contrase'];
	$pregunta=$_POST['pregunta'];
	$respuesta=$_POST['respuesta'];
	if ($contraseña == "")
	{
			echo "<script language='JavaScript'> alert('Deve llenar el campo nueva contraseña'); </script>";
	}
	else
	{
		
		$cuanto= strlen($contraseña);
if ($cuanto <= 7 )
{
	echo "<script language='JavaScript'> alert('la clave deve contener al menos 8 caracteres se recomiendas numeros y letras'); </script>";
	die ("<script>window.location = '../index.php'</script>");	
}
else
{ 

$contras=md5($contraseña);

	$cargarr=mysql_query("update usuarios set password = '$contras' where username = '$usuario'") or die ("error en el cargar");	
	echo "<script language='JavaScript'> alert('Cambio De Clave Exitoso'); </script>";
	die ("<script>window.location = '../paginas/seccion.php'</script>");	
		
}
}
	
	
}
?>