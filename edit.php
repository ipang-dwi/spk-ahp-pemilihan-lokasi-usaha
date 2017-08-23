<?php
	include('config.php');
	$alternatif = $_POST['alternatif']; 
	$k1 = $_POST['k1'];
	$k2 = $_POST['k2']; 
	$k3 = $_POST['k3'];
	$k4 = $_POST['k4'];
	$k5 = $_POST['k5'];
	echo $alternatif." - ".$k1." - ".$k2." - ".$k3." - ".$k4." - ".$k5;
	
	$result = $mysqli->query("UPDATE alternatif SET `alternatif` = '".$alternatif."', `k1` = '".$k1."',`k2` = '".$k2."',`k3` = '".$k3."',`k4` = '".$k4."',`k5` = '".$k5."' WHERE `id_alternatif` = ".$_GET['id'].";");
	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		header('Location: alternatif.php');
	}
?>