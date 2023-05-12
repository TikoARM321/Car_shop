
	<?php
		session_start();


		if(isset($_SESSION['user'])){
			unset($_SESSION['user']);
		}
		if(isset($_COOKIE['log_email'])){
			
			setcookie("log_email", $log_email, time()-3600);
			setcookie("log_pass", $log_pass, time()-3600);
		}

		header('location:main_page.php');
		
	
	?>
	