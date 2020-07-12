<?php
	include'config.php';
	session_start();
?>
<?php include'top.php';?>
<style>
.table {
	width: 700px;
	margin-left:170px;
}
.tablenew{
color: white;
margin-bottom:-3px;
}
.thcc{
color: grey;
}
.thc{
//color: #0E938F;
color: 	#9ACD32;
}
btn { 
color: #F0E68C;
}
</style>
<body onunload="spinneroff();">
    <?php include'nav.php';?>
	<?php
	    if (isset($_POST['submit'])) {
			$date = Date("Y-m-d");
			$sql = ("SELECT COUNT(rota_generated) AS 'count' FROM rota WHERE rota_date = '$date' AND rota_generated = 'N'");
			$res=$link->query($sql);
			$row = mysqli_fetch_assoc($res);
            $count = $row['count'];
			if($count > 0) {			
				set_time_limit(10000);
				shell_exec('python Final_VREP_algorithm.py'); 
			}
			?>
			<script>
				$(document).ready(function() {
					$('#rotatab').show();
				});
			</script>			
			<?php
		}
    ?>
	<div class="container maincont">
	<br><br>
    <form method="post" action="tdayrota.php" role="form" onsubmit="spinner();">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<button type="submit" class="btn btn-success" name="submit">GENERATE ROTA</button>
		<br><br>
		<div id="waitani" style="position: absolute;top:350px;left:840px;width:188px;height:185px;z-index: 999;visibility: hidden;"><img src="imgs/load.gif" height="128" width="128" /></div>
        <div class="container" style="display:none" id="rotatab">
		<?php  
			$date = Date("Y-m-d");
			$sql = ("SELECT COUNT(DISTINCT rota_cab_number) AS 'count' FROM rota WHERE rota_date = '$date'");
			$res=$link->query($sql);
			$row = mysqli_fetch_assoc($res);
            $count = $row['count'];
			if($count > 0) {
			    $a=1;
				while($a <= $count) {
					$cabid="cab"; 
				    $cab=$cabid.$a;
					$sql1 = ("SELECT cab_driver_no AS 'driverno' FROM cab WHERE cab_number = '$cab'");
					$res1=$link->query($sql1);
					$row1 = mysqli_fetch_assoc($res1);
                    $driverno = $row1['driverno'];
					$sql1 = ("SELECT cab_driver_name AS 'drivername' FROM cab WHERE cab_number = '$cab'");
					$res1=$link->query($sql1);
					$row1 = mysqli_fetch_assoc($res1);
					$drivername = $row1['drivername'];
					echo '<table class="table table-dark table-hover tablenew">
						<thead>
							<tr>
							<th class="thc">CAB NUMBER:</th><th>';echo $cab;echo'</th>
							<th class="thc">';echo'DRIVER NUMBER:</th><th>';echo $driverno;echo'</th>
							<th class="thc">';echo'DRIVER NAME:</th><th>';echo $drivername;echo'</th>
							</tr>
						</thead>';
						echo '<br><table class="table table-dark table-hover">
						<thead>
							<tr>
							<tr>
								<th class="thcc">Employee-ID</th>
								<th class="thcc">Name</th>
								<th class="thcc">Location</th>
								<th class="thcc">Phone Number</th>
							</tr>
						</thead>';
						$sql1 = ("SELECT A.rota_employee_id, B.* FROM rota A, employee B WHERE A.rota_cab_number='$cab' AND A.rota_date = '$date' AND A.rota_employee_id = B.employee_id");
						$res1=$link->query($sql1);
						if($res1->num_rows>0) {
							$i=0;
							while($row1=$res1->fetch_assoc()) {
								echo"<tr>
								<td>".$row1['rota_employee_id']."</td>					
								<td>".$row1['employee_name']."</td>					
								<td>".$row1['location']."</td>					
								<td>".$row1['phone_number']."</td>					
								</tr>";  
								$i++;
							}
						}
						else {
							echo "<tr> <td> No Results Found </td> </tr>";
						}			
					echo '</table><br><br>';
					$a++;
					echo $a;
				}
            }			
		?>
		</div>
	</form>
    </div>
	<script>
		function spinner() {
			document.getElementById('waitani').style.visibility = 'visible';
		}

		function spinneroff() {
			document.getElementById('waitani').style.visibility = 'visible';
		}
	</script>
</body>