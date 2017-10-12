<?php
session_start();

include_once("../conexion.php");

  
  if ($_POST['username']) {
//Comprobacion del envio del nombre de usuario y password
$username=trim($_POST['username']);
$password=md5($_POST['password']);
if ($password==NULL) {
echo "<div class='msjseccion'><b>Password Invalido</b></div>";
}else{
$query = mysql_query("SELECT username,password FROM usuarios WHERE username = '$username'") or die(mysql_error());
$data = mysql_fetch_array($query);
if($data['password'] != $password) {
echo "<div class='msjseccion'><b>Datos Incorrectos.. Por Favor Intenta De Nuevo</b> </div>";
}else{
$query = mysql_query("SELECT username,password FROM usuarios WHERE username = '$username'") or die(mysql_error());
$row = mysql_fetch_array($query);
$_SESSION["s_username"] = $row['username'];
die ("<script>window.location = '../index.php'</script>");



}
}
}  
?>
<html>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../estiloss.css" type="text/css" media="screen"/>
<script src="../jquery_v1.7.1.js" type="text/javascript"></script>
<script src="my_scrip.js" type="text/javascript"></script>
<title>FUNFECO</title>
</head>
<body>

<center>
<?php
echo '<div class="iniciousu">'; 
echo "<b>No Estas Autorizado, Favor Ingresa Tus Datos Para Acceder Al Sistema.</b>";
echo '<br/><br/>';
    // provee el formulario para hacer  login
    echo "<form method=post action=\"seccion.php\">";
    echo "<table>";
    echo "<tr><td><b>Usuario:</b></td>";
    echo "<td><input required type=text maxlength='8' name=username></td></tr>";
    echo "<tr><td><b>Contraseña:</b></td>";
    echo "<td><input required type='password' maxlength='10' name='password' ></td></tr>";
    echo "<tr><td colspan=2 align=center>";
	echo "<input type=submit value=\"Ingresar\"></td></tr>";
    echo "</table></form>";
	echo "<div id='olvido'><b>olvidaste tu contrasena</b>&nbsp;&nbsp;";
     echo "</div></div>";
   
	
   
?>
<div id="menuolvid">
<br><br><br>
<form action="recup_usu.php" method="post">
<input required style="font-style:italic" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre De Usuario" type="text" name="usuario" size="30"><br><br>
<input type="submit" value="Enviar">
</center></div>