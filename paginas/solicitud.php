<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<? include_once("../conexion.php");?>
<? include_once("select.php");?>



<script src="jquery_v1.7.1.js" type="text/javascript"></script>
<script src="my_script.js" type="text/javascript"></script>
 <script src="my_scrip.js" type="text/javascript"></script>
<link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

 
<div id="menuexisente">
<table>
<center><b>Demanda</b></center> 
  <tr>
   <?
 echo '<td><b>Tipo</b><br><div id="tienetipo"> <form> <select  name="tipo"><option>-seleccione-</option>'.$options_invent.'</select></div></td>';
 echo"</form>";
   ?>
      <td><b>Nombre</b><br><div id="traenomb"><div id="enviaprogranomb"><form> <select name="envinom" id="acaz"><option></option></select></form></div></div></td>
    </tr>
    <tr>
    <form action="insert_solici.php" method="post">
    <select name="nombreexis" hidden="nombre" id="acax"><option></option></select>
    <td><b>Descripcion</b><br><select name="descripcion" id="acay"><option></option></select></td>
     
      <td><b>Fecha de ingreso:</b><br><input disabled value="<? echo date('Y-m-d'); ?>"  type="date" name="fecha"><input value="<? echo date('Y-m-d'); ?>" hidden="fecha"  type="date" name="fecha"></td>  </tr>
    
    </table>
    <center><input type="submit" name="Enviar1" ></center>
  
    </div>
    
    

<div id="menusoli">
 <table>
    
   <tr> <center><h2><b>Solicitud</b></h2></center></tr>
    <tr>
 	<td><b>Cedula Representante</b><br><input name="cedula" placeholder="Numero" type="texto" required ></td>
    <td><b>Nombre Representado</b><br><input required  type="texto" name="nombrenino"><br></td>
    </tr>
     <tr>
     <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Recipe</b><input required  type="checkbox" name="imagen1"></td>
     <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Copia CI</b><input required  type="checkbox" name="imagen2"></td>
     </tr>
     
     <tr><td align="right"><i>SOLICITA</i></td><td align="left"><i>ARTICULO</i></td></tr>
     
     <tr><br><br>
   <td><div id="menu2o"<center><input type="button" name="boton1" value="Existente"></center></div></td>
     <td><div id="menu1o"><center><input type="button" name="boton2" value="Inexistente"></center></div></td>
     </tr>
 	
     </table>
</div>  
     
     
     
     
     
     
   
    <div id="menuinexisente">
    <table>
   
    <center><b>Demanda</b></center>
  
    <tr>
    <? echo '<td><b>Tipo</b><br><select  name="tipox" >"<option>-seleccione-</option>'.$options_invent.'"</select> </td>'; ?> 
   <td> <b>Nombre</b><br><input  type="texto" name="nombre"> </td> 
    </tr><tr>
    <td>  <b>Descripcion</b><br><input  type="texto" name="descripcionx"></td>
      <td> <b>Fecha de ingreso:</b><br><input disabled value="<? echo date('Y-m-d'); ?>"   type="date" name="fecha"></td>
     </tr>
    
    </table>
   <center><input type="submit" name="Enviar2" ></center>
       </form>
   </div>
   
     
     
     
     
     
    

     
     
     
     
     
     
     
    
          </body>
          </html>
      