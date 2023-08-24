


<?php include_once 'pages/Header/header.php';?>
   

<?php

	$p_menu='';
	if(isset($_GET['p'])){
		$p_menu = $_GET['p'];
		if($p_menu != "signup" && $p_menu != "reset-password" && $p_menu != "login" && $p_menu != "404"){
			include_once 'pages/Header/menu.php';
		}
		
	}else{
		include_once 'pages/Header/menu.php';
	}
	
?>

 
<!-- Call Pages-->
<?php
	
	

	if(isset($_GET['p'])){
		require "pages/".$_GET['p'].".php.";
	}else{
		require 'pages/homepage.php';
	}
	
	
?>
	
<!-- end page-->
	
<?PHP
	include_once 'config_db/config_db.php';

?> 	
   
		
		
<?php include_once 'pages/Footer/footer.php';?>	
	 