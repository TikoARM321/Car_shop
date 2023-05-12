<?php
	session_start();
	$con = mysqli_connect('localhost','root','root','project') or die('Error Connection');

	$error = $success = $log_error = '';
	$name = $surname = $email = '';

	if(isset($_COOKIE['log_email']) && isset($_COOKIE['log_pass'])){
		$cookie_email = $_COOKIE['log_email'];
		$cookie_pass = $_COOKIE['log_pass'];

		echo $cookie_email;
		$select = mysqli_query($con, "SELECT * FROM users WHERE email = '$cookie_email' AND password = '$cookie_pass'");
		$num = mysqli_num_rows($select);
		if($num == 1){
			$assoc = mysqli_fetch_assoc($select);
				$_SESSION['user'] = $assoc;
				header('Location:user_main_page.php');
		}
	}

	if(isset($_POST['log_btn'])){
		$log_email = $_POST['log_email'];
		$log_pass = $_POST['log_pass'];
		
		$select = mysqli_query($con, "SELECT * FROM users WHERE email = '$log_email' AND password = '$log_pass'");
		$num = mysqli_num_rows($select);
		if($num == 0){
			$log_error = '<div class="alert alert-danger">
						  <strong>Danger!</strong> Wrong Email or password!!!
						</div>';
		}else{
			if(isset($_POST['remember'])){
				setcookie("log_email", $log_email, time()+3600*24*365);
				setcookie("log_pass", $log_pass, time()+3600*24*365);
			}
			$assoc = mysqli_fetch_assoc($select);
			$_SESSION['user'] = $assoc;
			header('Location:user_main_page.php');
		}
	}
?>
<html>
	<head>
		<link rel = "stylesheet" href = "css/bootstrap.min.css" />
		<link rel = "stylesheet" href = "css/style.css" />
	</head>
	<body>
		<div class = "col-lg-4 col-md-4 col-sm-12">
					<h2>LogIn Form</h2>
					<form action = "" method = "post">
						<div class="form-group">
						  <label for="log_email">Email:</label>
						  <input type="email" name = "log_email" class="form-control" id="log_email">
						</div>
						<div class="form-group">
						  <label for="log_pass">Password:</label>
						  <input type="password" name = "log_pass" class="form-control" id="log_pass">
						</div>
						<div class="form-group mt-4">
							<button type="submit" class="btn btn-primary" name = "log_btn">
							LogIn</button>
						</div>
						<div class="checkbox form-group mt-4">
						  <label><input type="checkbox" class = "mt-3" name="remember"> Remember me</label>
						</div>
						
					</form>
					<?php echo $log_error; ?>
		</div>

		<script src = "js/jquery.js"></script>
		<script src = "js/bootstrap.min.js"></script>
		<script src = "js/main.js"></script>
	</body>	
</html>