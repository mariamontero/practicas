<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<? include_once("select.php");?>
<html>
 <title></title>
 <head>
 <link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
 <script src="../jquery_v1.7.1.js" type="text/javascript"></script>
 <script src="my_scrip.js" type="text/javascript"></script>
 </head>
 <body>

 <input id="botonesagregali" type="button" value="Existente"> &nbsp;&nbsp;&nbsp;<input id="botonesagregaliinex"  type="button"  value="Inexistente">


<div id="exitentealim">
<table>
  <center><b>Inventario</b></center>
  
  <tr>
  
   <?
 echo '<td><b>Tipo</b><br><div id="tienetipo"> <form> <select  name="tipo">'.$options_invent.'</select></div></td>';
	echo"</form>";
   
   ?>
  
      <td><b>Nombre</b><br><div id="traenomb"><div id="enviaprogranomb"><form> <select name="envinom" id="acaz"><option></option></select></form></div></div></td>
      </tr>
      <tr>
      <form action="agreg_aliment2.php" method="post">
      
      <select name="nombre" hidden="nombre" id="acax"><option></option></select>
      
        <td><b>Descripcion</b><br><select name="descripcion" id="acay"><option></option></select></td>
      
      <td><b>Cantidad</b><br><input placeholder="Numerico" required type="text" name="cantidad" maxlength="10"></td> 
      </tr> 
    <?
    echo'<td><b>Proveedor</b><br><select name="proveedor">"'.$options_prov.'"</select></td>';
	?>
     <td> <b>Fecha de ingreso:</b><br><input value="<? echo date('Y-m-d'); ?>"  type="date" name="fechai"></td>
    </tr><tr>
     
     <td> <b>Fecha de Vencimiento:</b><br><input  value="<? echo date('Y-m-d'); ?>" required type="date" name="fechav"></td><br>
     
     </tr>
      </table>
   <center><input type="submit" name="Enviar" ></center>
    </form>
    
   
     
       

</div>
    
<div id="inexitentealim">

<table>
    <form method="post" action="agreg_aliment2.php">
  <center><b>Alimento</b></center>
  
    <tr>
    <td> <b>Tipo</b><br><select name="tipo" ><option >Medicamentos</option><option>Alimentos</option><option>Enceres</option></select></td> 
   <td> <b>Nombres</b><br><input required  type="texto" name="nombre"> </td> 
    </tr><tr>
    <td>  <b>Descripcion</b><br><input required  type="texto" name="descripcion"></td> 
    <td><b>Cantidad</b><br><input placeholder="Numerico" type="text" name="cantidad" maxlength="10"></td> 
    </tr><tr>
   <?
    echo'<td><b>Proveedor</b><br><select name="proveedor">"'.$options_prov.'"</select>';
	?>
     <td> <b>Fecha de ingreso:</b><br><input value="<? echo date('Y-m-d'); ?>"  type="date" name="fechai"></td>
     </tr>
     <tr>
     
     <td> <b>Fecha de Vencimiento:</b><br><input value="<? echo date('Y-m-d'); ?>"  type="date" name="fechav"></td>
     
    </tr>
    
    </table>
   <center><input type="submit" name="Enviar" ></center>
      </form> 
</div>


          </body>
          </html>
      