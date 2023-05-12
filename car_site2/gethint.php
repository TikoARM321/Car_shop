<?php
// Array with names
$con = mysqli_connect('localhost','root','root','car_buy') or die ("could not connect to mysql");
$arr = mysqli_query($con, "SELECT * FROM car");
while($row = mysqli_fetch_assoc($arr)){
  $a[] = $row['car_model'];
}
$a = array_unique($a); 
// get the q parameter from URL
$q = $_GET["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $car_model) {
    if (stristr($q, substr($car_model, 0, $len))) {
      if ($hint === "") {
        $hint = $car_model;
      } else {
        $hint .= ", $car_model";

      }
    }
  }
}



// Output "no suggestion" if no hint was found or output correct values
if($hint===""){
  echo "no suggestions";
}else{
  echo "" . $hint;
}
?>

