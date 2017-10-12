<html>
 <title></title>
 <head>
 <link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
 <script src="../jquery_v1.7.1.js" type="text/javascript"></script>
 <script src="my_scrip.js" type="text/javascript"></script>
 </head>
 <body>

<?

include_once("../conexion.php");
include_once("select.php");

$uno=$_POST['uno'];


if (is_numeric($uno))
{
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$cantidad=trim($_POST['cantidad']);
	$idhijo=$_POST['idhijo'];
    $idrepresent=$_POST['idrepresent'];
	$uno;
	if($nombre == "" or $descripcion == "")
	{
		echo "<script language='JavaScript'> alert('Deve seleccionar nombre y descripcion'); </script>";
	}
	else
	{
		if ($cantidad <= '0')
		{
			echo "<script language='JavaScript'> alert('la cantidad esta en 0 Finalizado!'); </script>";
		}
		else
		{
			
			$vercantidad=mysql_query("select * from inventario where inven_nom = '$nombre' and inven_descrip = '$descripcion'")or die ("error en el vercantidad");
			$trae=mysql_fetch_array($vercantidad);
			$cantidadhay=$trae["inven_canti"];
			$idinventa=$trae["inven_id"];
			if ($cantidadhay == '0')
			{
				echo "<script language='JavaScript'> alert('El articulo seleccionado tiene una cantidad de 0'); </script>";
			}
			else
			{
			if ($cantidad <= $cantidadhay)
			{
				$resultado=mysql_query("select * from invent_ingreso where ingres_id_art = '$idinventa' and ingres_canti != '0'") or die ( "error en el select 2");
$total_registros = mysql_num_rows($resultado) or die ("<script language='JavaScript'> alert('No Existen Registros!'); </script>");

echo "<center>";
echo "<table text-align:center;'>";
echo "<tr style='background:#06F'>";
echo "<td><b>Cantidad</b></td>";
echo "<td><b>Fecha Ingreso</b></td>";
echo "<td><b>Fecha Vencimiento</b></td>";
echo "<td><b>Eliminar Cant.</b></td>";
echo "<td><b>Eliminar 1 art</b></td>";
echo"</tr>";
while($resultados = mysql_fetch_array($resultado))
{
	echo '<form  action="elim_solic2.php" method="post">';
	
	
	echo "<input type='hidden' name='xyz' value='".$resultados['ingres_id']."'>";
	$esto = $resultados['ingres_id'];
	echo '<input type="hidden" name="cantidadhay" value='.$cantidadhay.'>';
	echo '<input type="hidden" name="xyz" value='.$esto.'>';
	echo '<input type="hidden" name="idinventa" value='.$idinventa.'>';
	echo '<input type="hidden" name="cantidadmetida" value='.$cantidad.'>';
		echo '<input type="hidden" name="uno" value='.$uno.'>';
		
		echo"<input type='hidden' name='idhijo' value=".$idhijo.">";
        echo"<input type='hidden' name='idrepresent' value=".$idrepresent.">";
		
	
	
	echo'<tr style="background-color:#9FF" >';
	echo "<td>" .$resultados['ingres_canti']."<input type='hidden' name='cantidadd' value='".$resultados['ingres_canti']."'</td>";
    echo "<td>" .$resultados['ingres_fech_i']."<input type='hidden' name='fechaingreso' value='".$resultados['ingres_fech_i']."'</td>";
	echo "<td>" .$resultados['ingres_fech_v']."<input type='hidden' name='fechavencimiento' value='".$resultados['ingres_fech_v']."'</td>";
	echo '<td><input type="number" placeholder="cantidad a eliminar" name="cantieliminr"></td>';
    echo '<td><center> <input type="submit" name="Enviar" value="Eliminar"> </center></td>';

echo "</tr></form>";

}
echo '<tr style="background-color:#9FF" ><td>Quedan:</td><td>'.$cantidad.'</td></tr>';
echo "</table>";
				
			}
			else
			{
			echo "<script language='JavaScript'> alert('La cantidad seleccionada sobrepasa el monto de lo existente'); </script>";	
			} 
			}
			
		} 
		
	}
	
}
else
{

$idsolic=$_POST['idsoli'];
$idhijo=$_POST['idhijo'];
$idrepresent=$_POST['idrepresent']; 


?>
<div id="salidsoli">
<table>
  <center><b>Seleccione la salida del Inventario</b></center>
  
  <tr>
<?


 echo '<td><b>Tipo</b><br><div id="tienetipo"> <form> <select  name="tipo">'.$options_invent.'</select></div></td>';
	echo"</form>";
   
   ?>
  
      <td><b>Nombre</b><br><div id="traenomb"><div id="enviaprogranomb"><form> <select name="envinom" id="acaz"><option></option></select></form></div></div></td>
      </tr>
      <tr>
      <form action="elim_solic.php" method="post">
      
      <select name="nombre" hidden="nombre" id="acax"><option></option></select>
      
        <td><b>Descripcion</b><br><select name="descripcion" id="acay"><option></option></select></td>
      
      
    
    
     
     <td> <b>Cantidad</b><br><input required type="number" name="cantidad"></td><br>
     
     <?
	 echo"<input type='hidden' name='idhijo' value=".$idhijo.">";
     echo"<input type='hidden' name='idrepresent' value=".$idrepresent.">";
	 ?>
     
     
     </tr>
      </table>
   <center><input type="submit" name="Guardar" value="Guardar" ></center>
  <? echo' <input type="hidden" name="uno" value="'.$idsolic.'"> ';?>
    </form>
</div>

<?
}
?>
</body>
</html>