<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>

<?

$cantidadhay=$_POST['cantidadhay'];//total global
$cantidadeliminar=$_POST['cantieliminr'];
$idexacto=$_POST['xyz'];
$idinventa=$_POST['idinventa'];
$cantidad=$_POST['cantidadmetida'];//cantidad introdujo
$uno=$_POST['uno'];

$idhijo=$_POST['idhijo'];
$idrepresent=$_POST['idrepresent'];


$haytotalporparte=$_POST['cantidadd'];

include_once("../conexion.php");

if($cantidadeliminar == "")
{
echo "<script language='JavaScript'> alert('deve llenar la casilla elim. cantidad y precionar el boton de al lado eliminar'); </script>";
}
else
{

	
	
	if ($cantidad >= $cantidadeliminar)
	{
		
		
		$quedan = $cantidad - $cantidadeliminar;
		$quedatotal = $cantidadhay - $cantidadeliminar;
		$quedaparte = $haytotalporparte - $cantidadeliminar;
		
		
		
		$dater=date('Y-m-d');
		
		$insettasalida=mysql_query("insert into salidas (salid_id_repre,salid_id_benefac,salid_id_invent,salid_cantid,salid_fecha) VALUES ('$idrepresent','$idhijo','$idinventa','$cantidadeliminar','$dater')") or die ("un gran error");
		 
		  $cargarr=mysql_query("update invent_ingreso  set ingres_canti = '$quedaparte' where ingres_id = '$idexacto' ") or die ("error en el cargar");	
		 
		  $cargarr=mysql_query("update inventario  set inven_canti = '$quedatotal' where inven_id = '$idinventa' ") or die ("error en el cargar 2");	
		  
		  
		$login=$_SESSION['s_username'];
		$fechar=date('Y-m-d');
		$evento="Se a eliminado una Solicitud activa";
		$insetahistori=mysql_query("insert into historial (histo_login,histo_evento,histo_fecha) values ('$login','$evento','$fechar')") or die ("error en el insert historial");
	
		   
		 
		 if ($quedan == '0')
		 {
			 $quedatiaa='inactivo';
			 	 $cargarr=mysql_query("update solicitudes  set solic_estado = '$quedatiaa' where solic_id = '$uno' ") or die ("error en el cargar 3");	
			 
			echo "<script language='JavaScript'> alert('Realizado'); </script>";
		 }
		 else
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
	echo '<input type="hidden" name="cantidadhay" value='.$quedatotal.'>';
	echo '<input type="hidden" name="xyz" value='.$esto.'>';
	echo '<input type="hidden" name="idinventa" value='.$idinventa.'>';
	$cantidad = $quedan;
	echo '<input type="hidden" name="uno" value='.$uno.'>';
	echo '<input type="hidden" name="cantidadmetida" value='.$quedan.'>';
	
	
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
echo '<tr style="background-color:#9FF" ><td>Quedan:</td><td>'.$quedan.'</td></tr>';
echo "</table>";

		 }
		 
	}
	else
	{
		echo "<script language='JavaScript'> alert('la cantidad escrita supera la cantidad del articulo'); </script>";
	}





}



?>