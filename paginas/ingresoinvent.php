 <html>
 <title></title>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="../estilos.css" type="text/css" media="screen"/>
 </head>
 <body>
<div id="menuinvent">
    <form method="post" action="ingresoinvent2.php">
    <center><h2><legend><b>Nuevo Ingreso</b></legend></h2></center>
    
     <div id="isquierda"> <b>Tipo</b><br><select name="tipo" ><option >Medicamentos</option><option>Alimentos</option><option>Enceres</option></select></div>
    
   <b>Nombre</b><br><input required  type="texto" maxlength="15" name="nombrep"><br>
   <div id="isquierda"> <b>Descripcion</b><br><input required  type="texto" name="descripcion"></div>
   <b>Cantidad</b><br><input requiered type="text" maxlength="5" name="cantidad"><br>
    <div id="isquierda"> <b>Benefactor</b><br><input requiered type="text" maxlength="40" name="benefactor"></div>
    <b>Fecha de ingreso:</b><br><input value="<? echo date('Y-m-d'); ?>" type="texto" name="fechae"><br>
   <div id="isquierda"> <b>Fecha vencimiento</b><br><input required placeholder="formato año-mes-dia"  type="texto" name="fechav"></div>
  
   
     <br/><br/><br/>
   <center>  <input type="submit" name="Enviar"> </center>
        
        </form> 
     </div>
          </body>
          </html>
      