<?php 
	session_start();
	
	if(!isset($_SESSION['user'])){
		header("main_page.php");
	}
	/* Main Content*/
	require "main_body.php";
	/* Main content*/


	$error = '';
	$con = mysqli_connect('localhost','root','root','project') or die('Error Connection');
	$user_id = $_SESSION['user']['id'];
	$arr = mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'");
	$det = mysqli_fetch_assoc($arr);
	$name = $det['name'];
	$surname = $det['surname'];
	$gender = $det['gender'];
	$avatar = $det['avatar'];
	/* Download picture*/
	if(isset($_POST['del_avatar_btn'])){
		$delete = mysqli_query($con, "UPDATE users SET avatar = NULL WHERE id = '$user_id'");

	}
	if(isset($_POST['avatar_btn'])){
		$allowed_exts = ["jpeg","jpg","png","gif"];
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_tmp = $_FILES['image']['tmp_name'];
		$array = explode('.',$file_name );
		$end = end($array);
		if(in_array($end, $allowed_exts)){
			if($file_size > 8000){
				$error = "file size not correct";
			}
			else{
				$upload = move_uploaded_file($file_tmp,"upload/avatar/".$file_name);
				if($upload){
					$update = mysqli_query($con, "UPDATE users SET avatar = '$file_name' WHERE id = '$user_id'");
	
				}
			}
		}else{
			$error = "extension not allowed, please choose a JPEG or PNG file.";
		}
	}/* Download picture*/

	/* check picture is null or not */

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
	/* check picture is null or not */

	

?>
<html>
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
						    <img src = "<?= $avatar ?>" width = "40px" style = "border-radius: 50%;">
						</li>

						<li class="nav-item">
						    <a class="nav-link active" href="">
						  	    <?= $name ?>
						    </a>
						</li>
						<li class="nav-item">
						    <a class="nav-link active" href="">
						  	    <?= $surname ?>
						    </a>
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
							    	<a class="dropdown-item" onclick="displaySettings()" href="#">
							    		Change
							    	</a>
							    </li>
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
		<div class = "position-relative" >

			<div class="modal modal-sheet position-absolute-center bg-body-secondary p-4 py-3 mx-auto top-50 start-50 translate-middle" tabindex="-1" role="dialog" id="modalSheet" style="z-index:200; display:none;margin-top:100px;">
					<div class="modal-dialog" role="document">
						<div class="modal-content rounded-4 shadow">
						  	<div class="modal-header border-bottom-0">
							  	<h1 class="modal-title fs-5">
							  		Change Profile
							  	</h1>
							  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
							  	onclick = "displaySettings()" >
							  		
							  	</button>
						  	</div>
						  		<form action="" method="post" enctype="multipart/form-data">
								  	<input type="file" name="image">
								  	<input type="submit" value="Upload Image" name="avatar_btn">
								  	<?php echo $error ?>
								  	<input type="submit" value="Delete Image" name="del_avatar_btn">

								</form>
								<?php echo $form ?>
						  	<div class="modal-body py-0">
						  	  	
						  	</div>
						  	<div class="modal-footer flex-column align-items-stretch w-100 	gap-2 pb-3 border-top-0">
							  	<button type="button" class="btn btn-lg btn-primary">		Save 	changes
							  	</button>
						  	</div>
						</div>
					</div>
			</div>
		</div>
		
		<main style="z-index:100;position:relative;">
			
			 
			
		</main>

		<script src = "js/user_main_page.js"></script>
		<script src = "js/bootstrap.min.js"></script>
		<script src = "js/bootstrap.bundle.min.js"></script>
		
	</body>
</html>
