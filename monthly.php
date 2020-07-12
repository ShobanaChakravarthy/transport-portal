<?php
	include'config.php';
	session_start();
?>
<?php

$start = new DateTime(date('Y-m-d'));
$end = new DateTime(date('Y-m-t'));
$end1 = date('Y-m-t');
$interval = $start->diff($end);
$c = $interval->format("%a");
$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
$prev_date = date('Y-m-d', strtotime($date .' -1 day'));
$sqlq = "SELECT * FROM rota WHERE rota_date = '".$prev_date."' ";
$res=$link->query($sqlq);
if($res->num_rows>0) {
   while($row=$res->fetch_assoc()) {
		 $var1 = $row['rota_employee_id'];
		 $var2 = $row['rota_cab_number'];  
		 for($i = 1; $i <= $c; $i++){	
             $a = date("Y-m-d", strtotime($prev_date . ' + ' . $i . 'day'));
	         $empid = $var1;
	         $cabid = $var2;
		     $sql = "INSERT INTO rota VALUES('$a', '$empid', '$cabid', 'N')";
			 $link->query($sql);
		 }
   }	
}
?>