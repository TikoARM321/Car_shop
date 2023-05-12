<?php
$conn = mysqli_connect('localhost','root','root','car_buy') or die ("could not connect to mysql");
	$select = mysqli_query($conn, "SELECT * FROM car");
	while($row = mysqli_fetch_assoc($select)){
			$car_model = $row['car_model'];
			$car_year = $row['car_year'];
			$car_price = $row['car_price'];
			$img = $row['image'];
			$phone_num = $row['phone_num'];
			$id = $row['id'];
		echo   "
					<html>
						<head>
							<link rel = 'stylesheet' href = 'css/bootstrap.min.css' />
							<link rel = 'stylesheet' href = 'css/style.css'>
						</head>
						
						<body class = 'row container py-3 text-center row-cols-md-3' style = 'margin-top:50px;'>
							<tbody>
								<div class='col' style = 'float:left'  >
									<a href='car_details.php?id= $id' style = 'text-decoration:none' >
										<div class='card shadow-sm' >
											<ul class='list-unstyled mt-3 mb-4'>
												<li style = 'text-transform: uppercase; text:bold;'>
													MODEL : $car_model
													<input type='hidden' name = 'car_model' value=$car_model > 
												</li>
												<li>
													ARJEQ : $ $car_price  
													<input type='hidden' name = 'car_price' value=$car_price >
												</li>
												<li>
													TARI :  $car_year թ.
													<input type='hidden' name = 'car_year' value=$car_year > 
												</li>
												<li>
													Heraxosi hamar : +374 $phone_num  
													<input type='hidden' name = 'phone_num' value=$phone_num >
												</li>
												<li>
													 
												</li>
											</ul>
											<div>
												<img src='images/$img' style = 'width:100%;height:200px;';>
												<input type='hidden' name = 'img' value=$img >
											</div>									
										</div>
									</a>
								</div>
							</tbody>
						</body>
					</html>
					";
	}

?>