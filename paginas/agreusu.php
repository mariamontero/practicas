<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Agregar Usuarios</title>
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
</head>

<body>

<?

include_once("../conexion.php");


session_start();     
$usuario=$_SESSION['s_username'];
$admin=administrador;
$query = mysql_query("SELECT username,nivel FROM usuarios WHERE username = '$usuario'") or die(mysql_error());
$data = mysql_fetch_array($query);
if($data['nivel'] != $admin) 
{
echo "<script language='JavaScript'> alert('Solo administradores pueden hacer estos cambios!'); </script>";

}
else
{
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Agregar Usuarios</title>
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
</head>

<body>

<div id="menu1">

<table>
<tr>

    <form method="post" action="agreusu2.php">
  <td><center><h3><legend><b>Usuarios</b></legend></h3></center></td>
  </tr>
    <tr>
   <td> <b>Usuario</b><br><input required  type="texto" maxlength="8" name="nombre"> </td> 
    <td>  <b>Contraseña</b><br><input required maxlength="10"  type="password" name="clave"></td> 
    </tr>
    
    
    <tr>
    <td><b>Nivel</b><br><div class="aca"><select name="nivel"><option>Administrador</option><option>Usuario</option></select></div></td>
    
   
    <td><b>Pregunta Secreta</b><br><select id="acortsele" name="pregunta"><option>Nombre de tu primera mascota</option><option>Nombre de tu Profesora Favorita</option><option>Lugar de Nacimiento de la Madre</option>
    </select></td>
    </tr>
     
     <tr>
     <td><b>Respuesta Secreta</b><br><input required  type="texto" maxlength="20" name="respuesta"></td>
    <td> <b>Confirme Respuesta</b><br><input required  type="texto" maxlength="20" name="respuesta2"></td>
    </tr>
    
     
     
  <td> <input type="submit" name="Enviar" value="Guardar"></td>

   </tr>
    
    </table>
      </form> 
    </div>

<?
}
?>
</body>
</html>