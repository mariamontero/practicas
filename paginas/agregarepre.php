<?   
session_start();
if(!isset($_SESSION['s_username']))header("location:seccion.php");  
?>
<html>
 <title></title>
 <head>
 <link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
 </head>
 <body>
<div id="menu1">

<table>


    <form method="post" action="agregarepre2.php">
  <center><h3><b>Representante</b></h3></center><br>
    <tr>
   <td> <b>Nombres</b><br><input required  type="texto" maxlength="18" name="nombre"> </td> 
    <td>  <b>Apellidos</b><br><input required  type="texto" maxlength="20" name="apellidos"></td> 
     <td><b>Cedula</b><br><select name="nacionalidad" ><option>V</option><option>E</option></select><input placeholder="Numerico" size="14px" maxlength="8" type="text"  name="cedula"></td>
    </tr>
    <tr>
    
   
 <td><b>Direccion</b><br><input required  type="texto" maxlength="100" name="direccion"></td>
 <td><p><b>Telefono Casa</b>
 <br>
 <?
$variabe=12;
$limit=95;
echo"<select name='codcasa'>";
for($variable = 12; $variable <= $limit; ++$variable )
{
echo"<option>02".$variable."</option>";
}
echo"</select>";

?>

 <input required placeholder="Numerico" size="6%"   type="texto" maxlength="7" name="telefono"></td>
     <td><b>Telefono movil</b><br><select name="codnumercel" ><option>0412</option><option>0414</option><option>0424</option><option>0416</option><option>0426</option>
     </select><input required size="10%" placeholder="Numerico" maxlength="7" type="texto" name="tlfmov"></td>
 </tr>
    <tr>
    <td><b>Edo.civil</b><br><div class="aca"><select name="edocivil"><option>Soltero</option><option>Casado</option><option>Viudo</option><option>Divorciado</option><option>En Concubinato</option></select></div></td>
    <td><b>Trabaja act.</b><br><div class="aca"><select name="trabajaac" ><option>Si Labora</option><option>No Labora </option></select></div></td>
    <td><b>N#.hijos</b><br><input required placeholder="Numerico" maxlength="2"  type="texto" name="numhijos"></td>
    </tr>
     <tr>
      <td> <b>Posee vivienda</b><br><div class="aca"><select name="vivienda" ><option>Si posee vivienda</option><option>No posee vivienda </option></select></div></td>
      <td><b>Persona de Contacto</b><br><input required  type="texto" maxlength="18" name="rpnombre"></td>
    <td> <b>Apellido de Contacto</b><br><input required  type="texto" maxlength="20" name="rpapellido"></td>
    </tr>
     <tr>
     <td>  <b>Cedula de Contacto</b><br><select name="rpnacionalidad" ><option>V</option><option>E</option></select><input size="10px"  type="texto" maxlength="8" name="rpcedula"></td>
    <td> <b>Tlf Casa.Contacto</b><br>
    
     <?
$variabe=12;
$limit=95;
echo"<select name='refecodcasa'>";
for($variable = 12; $variable <= $limit; ++$variable )
{
echo"<option>02".$variable."</option>";
}
echo"</select>";

?>

 <input required placeholder="Numerico" size="6%"   type="texto" maxlength="7" name="rptlff"></td>
    
    
    <td><b>Tlf movil Contacto</b><br><select name="codnumercelr" ><option>0412</option><option>0414</option><option>0424</option><option>0416</option><option>0426</option></select><input required size="10%" placeholder="Numerio" type="texto" maxlength="7" name="tlfmovr"></td>
    </tr>
     <tr>
     <td><b>Direccion de Contaacto</b><br><input size="19px" required  type="texto" maxlength="100" name="direccionr"></td>
     <td> <b>Fecha de ingreso:</b><br><input value="<? echo date('Y-m-d'); ?>"  type="date" name="fecha"></td>

     </tr><br>
     <tr>
  <td></td><td> <center><input type="submit" name="Enviar" ></center></td><td></td>	
</tr>
    </table>
      </form> 
    </div>
          </body>
          </html>
      