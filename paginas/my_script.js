$(document).ready(function() {
 
 $('#letra-g form').click(function() {
    $.get('vejqnom.php', $(this).serialize(), function(data) { 
      $('#marcax').html(data);
    });
    return false;
 });
 
 

	
	
  $('#letra-f form').click(function() {
    $.get('vejqbombre.php',$(this).serialize(), function(data) { 
      $('#marcaxx').html(data); 
    });
    return false;
 });
 

$('#letra-f form').click(function() {
    $.get('jq2.php',$(this).serialize(), function(data) { 
      $('#marcaxxx').html(data); 
    });
    return false;
 });	
 
 
 
 $('#menuinexisente submit').click(function() {
    $.get('verinventdet.php',$(this).serialize(), function(data) { 
      $('#marcaxz').html(data);
    });
    return false;
});	
 
 	
		$('#menuinexisente').hide();
		$('#menuexisente').hide();
			
		$('#menu1o').click( function(){
			$('#menuinexisente').animate({opacity:'toggle',
			     height:'toggle'}, 'slow');
				 $('#menuexisente').hide();
	
});
		$('#menuinexisente').hide();
		$('#menuexisente').hide();
			
		$('#menu2o').click( function(){
			$('#menuexisente').animate({opacity:'toggle',
			     height:'toggle'}, 'slow');
				 $('#menuinexisente').hide();
	
});

		
 
 
 
				 
});



 