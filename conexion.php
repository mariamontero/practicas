<?php
mysql_connect("localhost", "root", "20423290cmxck") or dimine("No ha sido posible conectar a la tabla");
mysql_query("SET NAMES 'utf8'"); //solucion caracteres especiales como la ñ
mysql_select_db("funfeco")or die("No ha sido posible conectar a la Base de Datos");

	function Conectarse() 
	{ 
		$base_de_datos = "funfeco";
		$db_usuario = "root"; 
		$db_password = "20423290cmxck"; 
	   
		if (!($link = mysql_connect("localhost", $db_usuario, $db_password))) 
		{ 
			echo "Error conectando a la base de datos."; 
			exit(); 
		} 
		if (!mysql_select_db($base_de_datos, $link)) 
		{ 
			echo "Error seleccionando la base de datos."; 
			exit(); 
		} 		
		mysql_query ("SET NAMES 'utf8'");
		return $link; 
	} 	
?>
