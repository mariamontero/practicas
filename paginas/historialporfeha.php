<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<?php
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
	
$selecttodo=mysql_query ("select * from historial order by histo_id desc") or die ("<script language='JavaScript'> alert('	No Existe Historial!'); </script>");
$trajiste=mysql_fetch_array($selecttodo);

?>
<center>
<table text-align:center;>
<tr style='background:#06F' >
<td><b>Usuario</b></td>
<td><b>Evento</b></td>
<td><b>Fecha</b></td>
</tr>
<?
while($traeme=mysql_fetch_array($selecttodo))
{
echo"<tr bgcolor='#FFFACD'>";
echo '<td>'.$traeme["histo_login"].'</td>';
echo '<td>'.$traeme["histo_evento"].'</td>';
echo '<td>'.$traeme["histo_fecha"].'</td>';
}

echo "</tr></table></center>";

}
?>
	

	
	
	
	
	
	
	
