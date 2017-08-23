<?php
/*
// config file for dbase connection setting.. by ipang, http://firstplato.com email:admin@firstplato.com
*/

$mysqli = new mysqli('localhost','root','1717','candra');
	if($mysqli->connect_errno){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}

?>