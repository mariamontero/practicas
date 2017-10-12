<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include_once("../conexion.php");?>
<? include_once("select.php");?>



<script src="jquery_v1.7.1.js" type="text/javascript"></script>
<script src="my_script.js" type="text/javascript"></script>
 <link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<div id="menuinginvent">
<center><h2><legend><b>Ingreso Articulo</b></legend></h2></center> 
<?


echo"<div id='isquierda2'><b>Tipo</b><div id='letra-g'><form><select class='isquierd2' name='tipo'>'".$options_tipo."'</select></div></form></div>";



	echo'<b> Nombre:</b><br> <div id="letra-f"> <form><select class="isquierd3" id="marcax" name="nombre" ><option></option></select></form></div><br>';

echo"<form action='ingresoarticulos' method='post'>";
echo'<div id="isquierda2"><label><b>Descripcion</b><br><select class="isquierd2" id="marcaxx" name="descripcion" ><option></option></select></label></div>';




echo'<select hidden="marcaxxx" id="marcaxxx" name="nombrejq" ><option  ></option></select>';

echo"<b>Cantidad:</b><br><input type='text' name='cantidad'></label><br>";

echo"<div id='isquierda'><b>Benefactor</b><br><input type='text' name='venefactor'></div> ";
?>
<b>Fecha de ingreso:</b><br><input value="<? echo date('Y-m-d'); ?>" type="texto" name="fechae">
<br><?
echo"<b>F vencimiento</b><br><input type='text' name='fechav'> ";


echo"<br><br><center><input type='submit' value='guardar'></center>";
?>
</div>
</body>
</html>