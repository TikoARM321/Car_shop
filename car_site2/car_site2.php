
<html>
	<head>
		<link rel = "stylesheet" href = "css/bootstrap.min.css" />
<script>
			function showHint(str) {
			  if (str.length == 0) {
			    document.getElementById("txtHint").innerHTML = "";
			    return;
			  } else {
			    var xmlhttp = new XMLHttpRequest(); //classic obyect
			    xmlhttp.onreadystatechange = function() {
			     
			      if (this.readyState == 4 && this.status == 200) {
			        document.getElementById("txtHint").innerHTML = this.responseText;
			      }
			    };
			    xmlhttp.open("GET", "gethint.php?q=" + str, true);
			    xmlhttp.send();
			  }
			}
</script>
	</head>
	
	<body>
		<form action='main_page_user.php' method='get'>
			model<input type = "text" name = "model" onkeyup="showHint(this.value)"><br>
			<p>Suggestions: <span id="txtHint"></span></p>
			minimal gin<input type = "text" name = "gin_min" ><br>
			maximal gin<input type = "text" name = "gin_max" ><br>
			Minimal TARI<input type = "text" name = "min_tar" ><br>
			Maximal TARI<input type = "text" name = "max_tar" ><br>
			<input type='submit' value='man gal'>
		</form>



	</body>
</html>