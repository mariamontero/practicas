<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?><html>
 <title></title>
 <head>
 <link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
 </head>
 <body>
 <div id="menusolic">
<table>
<tr>
    <form enctype="multipart/form-data" method="post" action="subirimagen.php">
   <center><h2><legend><b>Documentos</b></legend></h2></center><br>
    </tr>
 	<tr>
    <td><b>Cedula</b><br><select name="nacionalidad" ><option>V</option><option>E</option></select><input placeholder="Numerico" size="14px" type="texto" name="cedula"></td>
    <td><b>Nombre Representado</b><br><input required  type="texto" name="bnombre"></td>
    </tr>
     </table>
     
     <table>
     <tr> 
     <td><b>informe medico del paciente</b><br><input type="file" name="imagen1"></td>
      </tr>
       <tr>
     <td><b>partida de nacimiento del paciente</b><br><input  type="file" name="imagen2"></td>
     </tr>
      <tr> 
     <td><b>copia cedula repre.</b><br><input required type="file" name="imagen3"></td>
      </tr>
       <tr> 
     <td><b>patida nacimiento repre.</b><br><input required type="file" name="imagen4"></td>
      </tr>
       <tr> 
     <td><b>solicitud a mano</b><br><input required type="file" name="imagen5"></td>
      </tr>
       <tr> 
     <td><b>carta de residencia</b><br><input required type="file" name="imagen6"></td>
      </tr>
       <tr> 
     <td><b>foto familiar</b><br><input required type="file" name="imagen7"></td>
      </tr>
      
      <tr> 
   <td> <center><b>Fecha de ingreso:</b></center><center><input value="<? echo date('Y-m-d'); ?>" required type="texto" name="fecha"></center></td>
    </tr>
      <tr> 
     
    <td><center><input type="submit" name="Enviar"></center></td>
        </form> 
         </tr>
         </table></div>
       
          </body>
          </html>
      