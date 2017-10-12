<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?><?

$proveedor=$_POST['proveedor'];
$cantidad=$_POST['cantidad'];
$descripion=$_POST['descripcion'];
$nombrejq=$_POST['nombrejq'];

echo $nombrejq;echo"<br>";
echo $descripcion;






?>

