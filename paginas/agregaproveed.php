<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
<title>Proveedores</title>
</head>
<body>

<div id="menproveedores">
<table>
<tr><td> Proveedores</td></tr>
<form action="agregaproveed2.php" method="post">
<tr>
<td><b>nombre</b><br><input required type="text" maxlength="30" name="nombre"></td><td><b>direccion</b><br><input required type="text" maxlength="100" name="direccion"></td>
</tr>
<tr>
<td><b>Telefono</b><br>

<?
$variabe=12;
$limit=95;
echo"<select name='cod_tlf'>";
for($variable = 12; $variable <= $limit; ++$variable )
{
echo"<option>02".$variable."</option>";
}
echo"</select>";

?>

<input size="10%" required placeholder="Numerico" type="text" maxlength="7" name="telefono"></td><td><b>Rif</b><br><input required placeholder="Numerico" type="text" maxlength="12" name="rif"></td>
</tr>
<tr>
<td><b>Correo</b><br><input required type="email" maxlength="35" name="correo"></td><td><b>Fecha</b><br><input required value="<? echo date('Y-m-d'); ?>"  type="date" name="fecha"></td>
</tr>
<tr><td><input type="submit" value="Enviar"></td></tr>
</form>
</table>
</div>

</body>
</html>