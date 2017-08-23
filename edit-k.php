<?php
	include('config.php');
	$kriteria = $_POST['kriteria']; 
	$bobot = $_POST['bobot'];
	
	$result = $mysqli->query("UPDATE kriteria SET `kriteria` = '".$kriteria."', `bobot` = '".$bobot."' WHERE `id_kriteria` = ".$_GET['id'].";");
	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		header('Location: kriteria.php');
	}
?>