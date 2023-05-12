<?php 

session_start();
	
	if(isset($_SESSION['user'])){
		
		$id = $_SESSION['user']['id'];
		$name = $_SESSION['user']['name'];
		$surname = $_SESSION['user']['surname'];
		$gender = $_SESSION['user']['gender'];
		$avatar = $_SESSION['user']['avatar'];

		if($avatar == null){
			if($gender == 'male'){
			$avatar = 'images-avatar/male.jpg';
			}
			else if($gender == 'female'){
			$avatar = 'images-avatar/female.jpg';	
			}
		}
		else{
			$avatar = 'upload/avatar/'.$avatar;
		}

			

		echo   '	<html>
						<head>
							<link rel = "stylesheet" href = "css/bootstrap.min.css" />
							<link rel = "stylesheet" href = "css/style.css" />
						</head>
						
						<body>
							<header class="d-flex flex-wrap justify-content-center py-3 mb-4">
								<nav class = "navbar navbar-expand-md navbar-dark fixed-top bg-dark">
									<div class="container">
									    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
									        	<svg class="bi me-2" width="40" height="32">
									        		<use xlink:href="#bootstrap"></use>
									        	</svg>
									        	<span class="fs-4">Car BUY</span>
									    </a>
									    <ul class="nav">

									    	<li class="nav-item">
											    <img src = "'.$avatar.'" width = "40px" style = "border-radius: 50%;">
											</li>


											<li class="nav-item">
											    <a class="nav-link active" href="">
											  	     '.$name.'
											    </a>
											</li>
											<li class="nav-item">
											    <a class="nav-link active" href="">
											  	    '.$surname.'
											    </a>
											</li>
											<li class="nav-item"><a href="main_page.php" class="nav-link active" aria-current="page">Home</a>
											</li>
											<li class="nav-item"><a href="car_site2.php" class="nav-link active" aria-current="page">Find what you want</a>
											</li>
											<li class="nav-item"><a href="add_haytarutiun.php" class="nav-link active" aria-current="page">Add haytararutiun</a></li>
											<li class="nav-item">
												<!-- DROPDOWN-->
												<div class="dropdown">
												  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"  >
												    Settings
												  </button>
												  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
												    <li>
												    	<a class="dropdown-item" href="logout.php">
												    		Log Out
												    	</a>
												    </li>
												    
												  </ul>
												</div>

											</li>
											<li class="nav-item">
											    <a class="nav-link disabled" href="#">Disabled</a>
											</li>
										</ul>
									</div>
								</nav>
							</header>
							<main style="z-index:100;position:relative;">
							</main>

							<script src = "js/user_main_page.js"></script>
							<script src = "js/bootstrap.min.js"></script>
							<script src = "js/bootstrap.bundle.min.js"></script>
							
						</body>
				</html>
			';
	}
	else {
		echo 
		'
		<html>
			<head>
				<link rel = "stylesheet" href = "css/bootstrap.min.css" />
				<link rel = "stylesheet" href = "css/style.css" />
			</head>
			<body>
				<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
					<nav class = "navbar navbar-expand-md navbar-dark fixed-top bg-dark">
						<div class="container">
						      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
						        	<svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
						        	<span class="fs-4">Car BUY</span>
						      </a>
						      <ul class="nav nav-pills">
						      		<li class="nav-item"><a href="main_page.php" class="nav-link active" aria-current="page">Home</a>
									</li>
						      		<li class="nav-item"><a href="car_site2.php" class="nav-link active" aria-current="page">Find what you want</a>
						      		</li>

						      		<br>
							        <li class="nav-item"><a href="user_login.php" class="nav-link active" aria-current="page">Login</a></li>
							        <br>
							        <li class="nav-item"><a href="user_registration.php" class="nav-link active" aria-current="page">Register</a></li>
						      </ul>
						</div>
					</nav>
				</header>
				<main></main>
				<footer></footer>
				<script src = "js/jquery.js"></script>
				<script src = "js/bootstrap.min.js"></script>
				<script src = "js/main.js"></script>
			</body>	
		</html>

		';
	}
		
?>


