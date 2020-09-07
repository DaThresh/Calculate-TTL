<?php

	session_start();
	include ($_SERVER['DOCUMENT_ROOT']."/config/dbinfo.php");

	$price = $_POST['price'];
	$state = $_POST['state'];
	$saletype = $_POST['saletype'];
	$tradein = $_POST['tradein'];
	$resident = $_POST['resident'];
	$presumptive = $_POST['presumptive'];
	$tradeinvalue = $_POST['tradeinvalue'];
	$total = 0;
	
	$conn = mysqli_connect('localhost',$db_username,$db_password,$db_db);
	if(!$conn){
		echo "Error connection to database";
	}
	
	$result = mysqli_query($conn,"SELECT * FROM states WHERE state = '" . strtolower($state) . "'");
	while($row = mysqli_fetch_assoc($result)){
		$statetaxrate = $row['rate'] * .01 + 1;
		$fees = $row['fees'];
	}
	
	mysqli_free_result($result);
	mysqli_close($conn);
	
	if($saletype=='dealer'){
		if($tradein=='true'){
			$price = $price - $tradeinvalue;
		}
		$total = $price * $statetaxrate;
	} else if ($saletype=='private'){
		if ($price > .8 * $presumptive){
			$total = $price * $statetaxrate;
		} else {
			$total = $presumptive * .8 * $statetaxrate;
		}
	} else {
		echo 'Specify sale type! Dealer or private?';
	}
	
	if($resident=='true'){
		$total += 90;
	}
	
	$total = $total + $fees;
	$total = $total - $price;
	
	echo '<html>';
	echo $price;
	echo "<br>";
	echo $state;
	echo "<br>";
	echo $saletype;
	echo "<br>";
	echo $tradein;
	echo "<br>";
	echo $statetaxrate;
	echo "<br>";
	echo $fees;
	echo "<br>";
	echo "Total TTL: $" . $total;
	
	echo '</html>';
	
?>