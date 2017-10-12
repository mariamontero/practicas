<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?> <html>
 <title></title>
 <head>
 <link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
 </head>
 <body>
<div id="menu2">
<table>
<tr>
    <form method="post" action="agregahijo2.php">
    <td><center><legend><h3><b>Representado</b></h3></legend></center> </td>
   	</tr>
    
    <tr>
    
    <td><b>Cedula Representante</b><br><select name="nacionalidad" ><option>V</option><option>E</option></select><input placeholder="Numerico" size="14px" type="texto" maxlength="8" name="cedurepre"></td>
    
    <td><b>Nombres Representado</b><br><input required  type="texto" maxlength="18" name="nombre"></td>
    </tr>
	<tr>   
 	<td><b>Apellidos Representado</b><br><input required  type="texto" maxlength="20" name="apellido"></td>
   	<td><b>Cedula</b><br><select name="nacionalidad" ><option>V</option><option>E</option></select><input placeholder="Numerico" size="13.9%" type="texto" maxlength="8" name="cedula"></td>
   	</tr>
    <tr>
    <td><b>Fecha Nacimiento</b><br><input required  type="date" name="fnacimiento"></td>
     
	<td><b>Sexo</b><br><div class="aca"><select  name="sexo"><option>Masculino</option><option>Femenino</option></select></div></td>

	</tr>    
    
   <tr>
   <td> <b>Diagnostico</b><br><input required  type="texto" maxlength="30" name="diagnostico"></td>
   <td><b>Fecha de ingreso:</b><br><input required value="<? echo date('Y-m-d'); ?>" type="date" name="fecha"></td>
   </tr>
     <br>
     <tr>
   <td><div class="centro"><input type="submit" name="Enviar"></div></td>
        </form> </tr>
        
          </div>
          </body>
          </html>
      