<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?><?
include_once("../conexion.php");
?>
<?php
echo '<center><b><a href="print_repre.php">IMPRIMIR LISTA REPRESENTANTES</a></b></center><br>';

$registros = 12; 

$pagina = $_GET["pagina"];

if (!$pagina) {
$inicio = 0;
$pagina = 1;
}
else {
	$inicio = ($pagina - 1) * $registros;
}

$resultado = mysql_query("SELECT * FROM representante WHERE 'visible' = 0");
$total_registros = mysql_num_rows($resultado) or die ( "<b> No hay Movimientos</b>"); 
$resultado = mysql_query("SELECT * FROM representante WHERE 'visible' = 0 ORDER BY repre_id ASC LIMIT $inicio, $registros");
$total_paginas = ceil($total_registros / $registros);
//fin consulta





echo "<center>";
echo "<table text-align:center;'>";
echo "<tr style='background:#06F'>";
echo "<td><b>Nombre</b></td>";
echo "<td><b>Apellidos</b></td>";
echo "<td><b>Nac</b></td>";
echo "<td><b>Cedula</b></td>";
echo "<td><b>Direccion</b></td>";		
echo "<td><b>Telefono</b></td>";
echo "<td><b>Movil</b></td>";
echo "<td><b>#Hijos</b></td>";
echo "<td><b>Estado civil</b></td>";
echo "<td><b>Trabaja</b></td>";
echo "<td><b>Vivienda</b></td>";
echo "<td><b>Fecha ing</b></td>";
echo "<td><b>Modificar</b></td>";
echo "<td><b>Ver Referencia</b></td>";

echo"</tr>";

while($resultados=mysql_fetch_array($resultado))
{

echo'<form method="post" action="modifrepre.php">';
	  echo "<tr bgcolor='#FFFACD'>";
	  echo "<td>" .$resultados['repre_nom']."<input type='hidden' name='nombre' value='".$resultados['repre_nom']."'</td>";
	  echo "<td>" .$resultados['repre_apell']. "<input type='hidden' name='apellidos' value='".$resultados['repre_apell']."'</td>";
	  echo "<td>" .$resultados['repre_nacidad']."<input type='hidden' name='nacionalidad' value='".$resultados['repre_nacidad']."'</td>";
	  echo "<td>" .$resultados['repre_ci']."<input type='hidden' name='cedula' value='".$resultados['repre_ci']."'</td>";
	  echo "<td>" .$resultados['repre_dirc']."<input type='hidden' name='direccion' value='".$resultados['repre_dirc']."'</td>";
	   echo "<td>" .$resultados['repre_tlf']."<input type='hidden' name='tlf' value='".$resultados['repre_tlf']."'</td>";
	   echo "<td>".$resultados['repre_cod_cel']."".$resultados['repre_movil']."<input type='hidden' name='codnumercel' value='".$resultados['repre_cod_cel']."'".$resultados['repre_movil']."'><input type='hidden' name='movil' value='".$resultados['repre_movil']."'></td>";
		
	    echo "<td>".$resultados['repre_num_hijos']."<input type='hidden' name='numhijos' value='".$resultados['repre_num_hijos']."'></td>";
		
		 echo "<td>" .$resultados['repre_edo_civil']."<input type='hidden' name='edocivil' value='".$resultados['repre_edo_civil']."'></td>";
		 
		  echo "<td>" .$resultados['repre_tbja']."<input type='hidden' name='trabaja' value='".$resultados['repre_tbja']."'></td>";
		   echo "<td>".$resultados['repre_vivda']."<input type='hidden' name='vivienda' value='".$resultados['repre_vivda']."'</td>";
		    
				echo "<td>" .$resultados['repre_fecha_reg']."<input type='hidden' name='fecha' value='".$resultados['repre_fecha_reg']."'</td>";
	 echo '<td><center><input type="submit" name="Enviar" value="Modificar"></center></td>';
	 
	 
	  
	echo" </form>";
	echo'<form method="post" action="vereferen.php">';
	echo"<input type='hidden' name='idref' value='".$resultados['repre_id_refe']."' >";
	echo '<td><center><input type="submit" name="Enviar" value="Referencia"></center></td>';
	echo"</form>";
	echo"</tr>";
} 
echo"</table>";
 
if(($pagina - 1) > 0) {
echo "<a href='verepre.php?pagina=".($pagina-1)."'>< Anterior</a> ";
} 

for ($i=1; $i<=$total_paginas; $i++){
if ($pagina == $i) {
echo "<b>".$pagina."</b> ";
} else {
echo "<a href='verepre.php?pagina=$i'>$i</a> ";
} }

if(($pagina + 1)<=$total_paginas) {
echo " <a href='verepre.php?pagina=".($pagina+1)."'>Siguiente ></a>";
} 
?> 


</body>
</html>
