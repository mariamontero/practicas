<?
include_once('../conexion.php');

$sql_des = "SELECT DISTINCT `inven_tipo` FROM `inventario` ORDER BY `inven_id` ASC ";
		$result_des = mysql_query($sql_des);
		$options_tipo = '';
		while ($row_des = mysql_fetch_array($result_des))
			{	$options_tipo = $options_tipo.'<option value="'.$row_des['inven_tipo'].'">'.$row_des['inven_tipo'].'</option>'; }
			
			$sql_des = "SELECT DISTINCT `prov_nom` FROM `proveedores` ORDER BY `prov_id` ASC ";
		$result_des = mysql_query($sql_des);
		$options_prov = '';
		while ($row_des = mysql_fetch_array($result_des))
			{	$options_prov = $options_prov.'<option value="'.$row_des['prov_nom'].'">'.$row_des['prov_nom'].'</option>'; }
			
			
			$sql_des = "SELECT DISTINCT `inven_tipo` FROM `inventario` ORDER BY `inven_id` ASC ";
		$result_des = mysql_query($sql_des);
		$options_invent = '';
		while ($row_des = mysql_fetch_array($result_des))
			{	$options_invent = $options_invent.'<option value="'.$row_des['inven_tipo'].'">'.$row_des['inven_tipo'].'</option>'; }

			
?>