<?

include_once("../conexion.php");

$idelimsoli=$_POST['idb'];
$solicitud=$_POST['solicitud'];



$elimina=mysql_query("delete from solicitudes where idb like '$idelimsoli' and solicitud = '$solicitud'") or die ("error en el delete");

echo"se a eliminado la solicitud";

?>

