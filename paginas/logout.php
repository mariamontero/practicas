<? 
session_start();  
if(!isset($_SESSION['s_username'])){  
header("location: ../index.php");  
} else {  
session_unset();  
session_destroy();  
header("location: ../index.php");  
}  
?> 