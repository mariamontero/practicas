<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?><?
include_once("../conexion.php");
?>

<html>
<head>
	
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



$registros = 12; 

$pagina = $_GET["pagina"];

if (!$pagina) {
$inicio = 0;
$pagina = 1;
}
else {
	$inicio = ($pagina - 1) * $registros;
}

$resultado = mysql_query("SELECT * FROM usuarios WHERE 'visible' = 0");
$total_registros = mysql_num_rows($resultado) or die ( "<b> No hay Movimientos</b>"); 
$resultado = mysql_query("SELECT * FROM usuarios WHERE 'visible' = 0 ORDER BY username ASC LIMIT $inicio, $registros");
$total_paginas = ceil($total_registros / $registros);
//fin consulta





echo "<center>";
echo "<table text-align:center;'>";
echo "<tr style='background:#06F'>";
echo "<td><b>nombre</b></td>";
echo "<td><b>nivel</b></td>";
echo "<td><b>pregunta</b></td>";
echo "<td><b>Eliminar</b></td>";

echo"</tr>";

while($resultados=mysql_fetch_array($resultado))
{

echo'<form method="post" action="elimi_usu.php">';
	  echo "<tr bgcolor='#FFFACD'>";
	  echo "<td>" .$resultados['username']."<input type='hidden' name='nombre' value='".$resultados['username']."'</td>";
	  echo "<td>" .$resultados['nivel']."<input type='hidden' name='nacionalidad' value='".$resultados['nivel']."'</td>";
	  echo "<td>" .$resultados['question']."<input type='hidden' name='cedula' value='".$resultados['question']."'</td>";
	  echo '<td><center><input type="submit" name="Enviar" value="Eliminar"></center></td>';
	 
	 
	  
	echo" </form>";
	echo"</tr>";
} 
echo"</table>";
 
if(($pagina - 1) > 0) {
echo "<a href='verusu.php?pagina=".($pagina-1)."'>< Anterior</a> ";
} 

for ($i=1; $i<=$total_paginas; $i++){
if ($pagina == $i) {
echo "<b>".$pagina."</b> ";
} else {
echo "<a href='verusu.php?pagina=$i'>$i</a> ";
} }

if(($pagina + 1)<=$total_paginas) {
echo " <a href='verusu.php?pagina=".($pagina+1)."'>Siguiente ></a>";
} 
}?> 


</body>
</html>
