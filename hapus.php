<?php
	include('config.php');
	
	$result = $mysqli->query("delete from alternatif where id_alternatif = ".$_GET['id'].";");
	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		header('Location: alternatif.php');
	}
?>