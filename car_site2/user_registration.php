<?php
	session_start();
	
	
	$con = mysqli_connect('localhost','root','root','project') or die('Error Connection');
	$error = $success = $log_error = '';
	$name = $surname = $email = '';

	
	
	
	if(isset($_POST['reg_btn'])){
		$name = $_POST['reg_name'];
		$surname = $_POST['reg_surname'];
		$email = $_POST['reg_email'];
		$pass = $_POST['reg_pass'];
		$con_pass = $_POST['reg_con_pass'];
		$gender = $_POST['gender'];
		if(
			empty($name) ||
			empty($surname) ||
			empty($email) ||
			empty($pass) ||
			empty($con_pass)
		){
			$error = '<div class="alert alert-danger">
						  <strong>Danger!</strong> Fill All Fields
						</div>';
		} else{
			if($pass != $con_pass){
				$error = '<div class="alert alert-danger">
						  <strong>Danger!</strong> Password not correct!!!
						</div>';
			} else{
				$select = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
				$num = mysqli_num_rows($select);
				if($num == 0){
					$insert = mysqli_query($con, "INSERT INTO users (name,surname,email,password,gender) VALUES ('$name','$surname','$email','$pass','$gender')");
					if($insert){
						$success = '<div class="alert alert-success">
							   Successfully Registrated :)
							</div>';
						
						$name = $surname = $email = "";

						header("Location:user_main_page.php");
							
					}
				} else{
					$error = '<div class="alert alert-danger">
						  <strong>Danger!</strong> Email already exists!!!
						</div>';
				}
			}
		}
	}
	

?>
<html>
	<head>
		<link rel = "stylesheet" href = "css/bootstrap.min.css" />
		<link rel = "stylesheet" href = "css/style.css" />
	</head>
	<body>
		<div class="container mt-4 pt-4">
			<div class = "row">
				<div class = "col-lg-4 col-md-4 col-sm-12">
				  <h2>Registration Form</h2>
				  <form action = "" method = "post">
					<div class="form-group mt-4">
					  <label for="name">Name:</label>
					  <input  type="text" name = "reg_name" class="form-control <?php if(isset($_POST['reg_btn']) && $name == ''){ echo 'border-danger'; }?>" id="name" value = "<?php echo $name; ?>" required>
					</div>
					<div class="form-group mt-2">
					  <label for="surname">Surname:</label>
					  <input type="text" name = "reg_surname" class="form-control <?php if($surname == '' && isset($_POST['reg_btn'])){ echo 'border-danger'; }?>" id="surname" value = "<?php echo $surname; ?>">
					</div>
					<div class="form-group mt-2">
					  <label for="email">Email:</label>
					  <input type="email" name = "reg_email" class="form-control " id="email" value = "<?php echo $email; ?>" >
					</div>
					<div class="form-group mt-2">
					  <label for="pass">Password:</label>
					  <input type="password" name = "reg_pass" class="form-control" id="pass">
					</div>
					<div class="form-group mt-2">
					  <label for="con_pass"> Confirm Password:</label>
					  <input type="password" name = "reg_con_pass" class="form-control" id="con_pass">
					</div>
					<div class="form-group mt-4">
						<label class="radio-inline">
						  <input type="radio" name="gender" checked value = "male">Male
						</label>
						<label class="radio-inline">
						  <input type="radio" name="gender" value = "female">Female
						</label>
					</div>
					<div class="form-group mt-4">
						<button type="submit" class="btn btn-primary" name = "reg_btn">Registration</button>
					</div>
				  </form>
				  <?php echo $error.$success; ?>
				</div>
				
			</div>
		</div>

		<script src = "js/jquery.js"></script>
		<script src = "js/bootstrap.min.js"></script>
		<script src = "js/main.js"></script>
	</body>	
</html>
