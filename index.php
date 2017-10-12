<?  
session_start();
if(!isset($_SESSION['s_username']))header("location:./paginas/seccion.php");  
echo " <div id='iniseccion'><b>".$_SESSION['s_username']."</b> <a href=\"./paginas/logout.php\"></a></div>";  
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="estiloss.css" type="text/css" media="screen"/>
<title>index</title>
</head>
<body>

<center><div id="logo"><img src="./img/apollo.png"></div></center>
<div id="logocandado"> <a href=./paginas/logout.php><img src="img/candado.png"></a></div>
<div id="busqinici">
<form method="post" target="prt1.1" action="./paginas/buscarcedrepre2.php">
<b><input type="text" maxlength="8" placeholder="BUSCAR CEDULA REPRESENTANTE" size="20%" name="busccedula"></b>

</div>
<div id="lupa"><input type="image" src="img/lupa.png"></div></form>
<div id="trans">
 <div id="menu">

	<ul class="nav">
    	  <li><a href="index.php">INICIO</a></li>
          <li><a href="#">BENEFICIARIOS</a>
        		<ul>
      				 <li><a href="#">Representante</a>
                     <ul>
               		 <li><a href="./paginas/agregarepre.php" target="prt1.1">agregar</a></li>
               		 <li><a href="./paginas/verepre.php" target="prt1.1">ver</a></li>
               	  	 </ul>
                     </li>
                     
					 <li><a href="#">Representado</a>
                     <ul>
               		 <li><a href="./paginas/agregahijo.php" target="prt1.1">agregar</a></li>
               		 <li><a href="./paginas/vebene.php" target="prt1.1" >ver</a></li>
               	  	 </ul>
                     </li>
       				 <li><a href="#">Documentos</a>
                     <ul>
               		 <li><a href="./paginas/agreg_docum.php" target="prt1.1">agregar</a></li>
               		 <li><a href="./paginas/verdocument.php" target="prt1.1" >ver</a></li>
               	  	 </ul>
                     </li>
       			 	 <li><a href="./paginas/estatus.php" target="prt1.1">Estatus</a></li>
         
        		</ul>
       	</li>
        <li><a href="#">SOLICITUD</a>
        <ul>
      		 <li><a href="./paginas/solicitud.php"  target="prt1.1">Ing.Solicitud</a></li>
       		 <li><a href="#" >Ver Solicitud</a>
             <ul>
             
              <li><a href="./paginas/versolic.php"  target="prt1.1">Pendientes</a></li>
              <li><a href="./paginas/ver_soli_inac.php"  target="prt1.1">Entregadas</a></li>
             
             </ul>
             </li>
             </ul></li>
        <li><a href="#">INVENTARIO</a>
         <ul>
      		 <li><a href="#">Inventario.</a><ul>
               		 <li><a href="./paginas/agreg_aliment.php" target="prt1.1">agregar</a></li>
               		 <li><a href="./paginas/ver_invent.php" target="prt1.1">ver</a></li>
               	  	 </ul>
                    </li>
       		
        	 </ul>
            </li>
        <li><a href="#">PROVEEDORES</a>
         <ul>
      		 <li><a href="./paginas/agregaproveed.php" target="prt1.1">Ing.Proveedor</a></li>
       		 <li><a href="./paginas/verprov.php" target="prt1.1">Ver Proveedor</a></li>
       		
        	 </ul>
        </li>
         <li><a href="#">ESTADISTICAS</a>
         <ul>
             <li><a href="./paginas/estadisticas_inventario.php" target="prt1.1">Estadistica Ingreso Inventario</a></li>
             <li><a href="./paginas/estadisticas_atendidos.php" target="prt1.1">Estadistica Atendidos</a></li>
       		
         </ul>
         </li>
         
        <li><a href="#">AYUDAS</a>
         <ul>
      		 <li><a href="./paginas/historialporfeha.php" target="prt1.1">Historial</a></li>
       		  <li><a href="./Manual De Usuario funfeco.PDF"  target="prt1.1" >Ayuda</a></li>
         </ul>
        
        </li>
         <li><a href="#">USUARIOS</a>
         <ul>
      		 <li><a href="./paginas/agreusu.php" target="prt1.1">Usuario Nuevo</a></li>
             <li><a href="./paginas/verusu.php" target="prt1.1">Ver Usuarios</a></li>
             
             </ul>
         
         </li>
          <li><a href="./paginas/backup.php" target="prt1.1">COPIA DE SEGURIDAD</a></li>
	</ul>
    
</div>
</div>
<div id="parta">
<iframe name="prt1.1"  width="100%"  scrolling="auto" frameborder="1" height="65%">
</iframe>
</div>
</body>
</html>