<?php
	$con = mysqli_connect('localhost','root','root','car_buy') or die ("could not connect to mysql");

	
	$id = $_GET['id'];	
	$arr = mysqli_query($con, "SELECT * FROM car where id = $id");
	$car1 = mysqli_fetch_assoc($arr);
	$id = $car1['id'];
	$car_model = $car1['car_model'];
	$car_year = $car1['car_year'];
	$img = $car1['image'];
	$car_price = $car1['car_price'];
	$vazq = $car1['vazq@'];
	$pox_tup = $car1['pox_tup'];
	$xek = $car1['xek@'];
	$sharjich = $car1['sharjich'];
	$guin = $car1['guin'];
	$phone_num = $car1['phone_num'];


?>
<?php require "header.php" ?>;
<html>
	<head>
		<link rel = 'stylesheet' href = 'css/bootstrap.min.css' />
		<link rel = 'stylesheet' href = 'css/style.css' />
	</head>
	<body style = "padding: 100px 100px 0px 100px;">
		
		<div class = "row g-4 py-5 row-cols-1 row-cols-lg-2">
			<div class = "feature col">
				<img src="images/<?php echo $img;?>" style = "width:486;height:345;border-radius:25px">
			</div>
			<div class = "feature col">
				<h3 class="fs-2" style = "text-transform: uppercase"> մակնիշ :<?php echo $car_model;?>
				</h3> 
				<table class = "pad-top-6 ad-det table">
					<tbody>
						<tr class = "border-bottom pb-2" >
							<td class = "bold">
								Տարեթիվ
							</td>
							<td class = "bold text-end">
								<?php echo $car_year;?> թ.
							</td>
						</tr>
						<tr class = "border-bottom mb-1">
							<td class = "bold">
								Գին 
							</td>
							<td class = "bold text-end">
								$<?php echo $car_price;?>
							</td>
						</tr>
						<tr class = "border-bottom mb-1">
							<td class = "bold">
								Վազքը 
							</td>
							<td class = "bold text-end">
								<?php echo $vazq;?> կմ
							</td>
						</tr>
						<tr class = "border-bottom mb-1">
							<td class = "bold">
								Փոխանցման Տուփը
							</td>
							<td class = "bold text-end">
								<?php echo $pox_tup;?>
							</td>
						</tr>
						<tr class = "border-bottom mb-1">
							<td class = "bold">
								Ղեկը 
							</td>
							<td class = "bold text-end">
								<?php echo $xek;?>
							</td>
						</tr>
						<tr class = "border-bottom mb-1">
							<td class = "bold">
								Շարժիչը 
							</td>
							<td class = "bold text-end">
								<?php echo $sharjich;?>
							</td>
						</tr>
						<tr class = "border-bottom mb-1">
							<td class = "bold">
								Գույնը 
							</td>
							<td class = "bold text-end">
								<?php echo $guin;?>
							</td>
						</tr>
						<tr class = "border-bottom mb-1">
							<td class = "bold">
								Հեռախոսահամար 
							</td>
							<td class = "bold text-end">
								+374 <?php echo $phone_num;?>
							</td>
						</tr>
					</tbody>

				</table>
				


				
			</div>
		</div>

	</body>
</html>