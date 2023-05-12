<?php
	session_start();	
		$con = mysqli_connect('localhost','root','root','car_buy') or die ("could not connect to mysql"); ;
		$error = $success = '';
		$car_model = $car_year = $image = $car_price = $reg_btn = $phone_num = $vazq = $pox_tup = $xek = $sharjich = $guin = '';
				
		if(isset($_GET['reg_btn'])){
			$car_model = $_GET['car_model'];
			$car_year = $_GET['car_year'];
			$image = $_GET['image'];
			$car_price = $_GET['car_price'];
			$phone_num = $_GET['phone_num'];
			$vazq = $_GET['vazq@'];
			$pox_tup = $_GET['pox_tup'];
			$xek = $_GET['xek@'];
			$sharjich = $_GET['sharjich']; 
			$guin = $_GET['guin'];
			

			$insert = mysqli_query($con, "INSERT INTO `car` (`car_model`,`car_year`,`image`,`car_price`,`phone_num`,`vazq@`,`pox_tup`,`xek@`,`sharjich`,`guin`) VALUES ('$car_model','$car_year','$image','$car_price','$phone_num','$vazq','$pox_tup','$xek','$sharjich','$guin')");	
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
				  	<h2>CAR to BUY</h2>
				  	<form action = "" method = "get">
						<div class="form-group mt-4">
						  	<label for="car_model"> car model:</label>
						  	<input  type="text" name = "car_model" class="form-control">
						</div>
						<div class="form-group mt-2">
						  	<label for="car_year">car year:</label>
						  	<input type="number" name = "car_year" class="form-control" id="car_year">
						</div>
						<div class="form-group mt-2">
						  	<label for="phone_num">Phone Number:</label>
						  	<input type="number" name = "phone_num" class="form-control" id="phone_num">
						</div>
						<div class="form-group mt-2">
							<label>Select Image File:</label>
							<input type="file" name="image">
						</div>
						<div class="form-group mt-2">
						  	<label for="car_price">Car Price:</label>
						  	<input type="number" name = "car_price" class="form-control" id="car_price">
						</div>
						<div class="form-group mt-2">
						  	<label for="vazq@">Վազքը:</label>
						  	<input type="number" name = "vazq@" class="form-control" id="vazq@">
						</div>
						<div class="form-group mt-2">
						  	<label for="pox_tup">Փոխանցման Տուփ:</label>
						  	<input type="text" name = "pox_tup" class="form-control" id="pox_tup">
						</div>
						<div class="form-group mt-2">
						  	<label for="xek@">Ղեկը:</label>
						  	<input type="text" name = "xek@" class="form-control" id="xek@">
						</div>
						<div class="form-group mt-2">
						  	<label for="sharjich">Շարժիչ:</label>
						  	<input type="text" name = "sharjich" class="form-control" id="sharjich">
						</div>
						<div class="form-group mt-2">
						  	<label for="guin">Գույն:</label>
						  	<input type="text" name = "guin" class="form-control" id="guin">
						</div>
						<div class="form-group mt-4">
							<button type="submit" class="btn btn-primary" name = "reg_btn">Registration</button>
						</div>
				  	</form>
				</div>			
			</div>
		<script src = "js/jquery.js"></script>
		<script src = "js/bootstrap.min.js"></script>
		<script src = "js/main.js"></script>
	</body>
</html>
