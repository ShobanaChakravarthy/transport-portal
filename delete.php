<?php
	include'config.php';
	$employee_id = $_GET['id'];
	$date = $_GET['datedel'];
	mysqli_query($link,"DELETE FROM rota WHERE rota_employee_id = '$employee_id' and rota_date = '$date'");
	mysqli_query($link,"UPDATE rota SET rota_generated = 'N' WHERE rota_date = '$date'");
	header("Location: empdet.php");
?>