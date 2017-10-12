$(document).ready(function() {
	
		$('#menuolvid').hide();
			
		$('#olvido').click( function(){
			$('#menuolvid').animate({opacity:'toggle',
			     height:'toggle'}, 'slow');
	
	
	
 });
 
 
 
 
    $('#exitentealim').hide();
			
		$('#botonesagregali').click( function(){
			$('#exitentealim').animate({opacity:'toggle',
			     height:'toggle'}, 'slow');
				 
				  $('#inexitentealim').hide();
 
 
 });
 
 
 
  
  $('#inexitentealim').hide();
			
		$('#botonesagregaliinex').click( function(){
		$('#inexitentealim').animate({opacity:'toggle',
			     height:'toggle'}, 'slow');
				 $('#exitentealim').hide();
 
 
 });
 
 
 
 
$('#tienetipo form').click(function() {
    $.get('enviatipo.php', $(this).serialize(), function(data) { 
      $('#acaz').html(data);
    });
    return false;
 });
 
 
 $('#traenomb form').click(function() {
    $.get('envianom.php', $(this).serialize(), function(data) { 
      $('#acay').html(data);
    });
    return false;
 });
 
 
 
  $('#enviaprogranomb form').click(function() {
    $.get('enviaarchijq.php', $(this).serialize(), function(data) { 
      $('#acax').html(data);
    });
    return false;
 });
 
 
 
 
 
  
 });