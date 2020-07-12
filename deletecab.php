<?php
	include'config.php';
	$cab_id = $_GET['id'];
	$date = $_GET['datedel'];
	mysqli_query($link,"DELETE FROM rota WHERE rota_cab_number = '$cab_id' and rota_date='$date'");
	mysqli_query($link,"UPDATE rota SET rota_generated = 'N' WHERE rota_date = '$date'");
	header("Location: cabdet.php");
?>