<?PHP
	$host = "localhost";
	$user = "root";
	$pwd = "";
	#Create connetion
	$conn = mysqli_connect($host, $user, $pwd);
	
	if(!$conn){
		die("connection failed!".mysqli_connect_error()); 
	}
	mysqli_select_db($conn, "ss30") or die ("Error in selecting db");
	#echo "connection successfully!";
	
	#chenge character set to utf8
	mysqli_set_charset($conn,"utf8");
	
	#function msg_style
	
	function msg_style($msg, $type){
		switch ($type){
			case 'success':
				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Success!</strong> '.$msg.'
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
				break;
				
			case 'info':
				echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
					  <strong>info!</strong> '.$msg.'
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
				break;
				
			case 'warning':
				echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>warning!</strong> '.$msg.'
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
				break;
		}
	}
	
	
?> 