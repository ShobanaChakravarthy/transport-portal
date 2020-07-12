<?php
	include'config.php';
	session_start();
?>
<?php include'top.php';?>
<style>
.thc{
//color: #0E938F;
color: 	#9ACD32;
}
a{
color: red;
}
a:hover{
color: red;
}
</style>
<body>
	<?php include'nav.php';?>

	<?php
		// define variables and set to empty values
		$date = "";
		$empidErr = $cabidErr = "";
		$empid = $cabid = "";
		$date = Date("Y-m-d");
		if (isset($_POST['submit'])){
			$date = $_POST['date'];
		}

		if (isset($_POST['empAddBtn'])) {
			// define variables and set to empty values
			$date = $_POST["modal-date"];
				if (empty($_POST["emp-id"])) {
					$empidErr = "Employee Id is required";
				} else {
					$empid = test_input($_POST["emp-id"]);
					// check if name only contains numbers
					if (!preg_match("/^[0-9]*$/",$empid)) {
						$empidErr = "Only numbers are allowed";
					}
					$sql = ("Select * from employee where employee_id = '$empid'");
					$res=$link->query($sql);
					if($res->num_rows == 0) {	
						$empidErr = "Not a valid employee id";
					}
				}
				if (empty($_POST["cab-id"])) {
					$cabidErr = "Cab Number is required";
				} else {
					$cabid = test_input($_POST["cab-id"]);
					// check if name only contains letters and number and hyphen
					if (!preg_match("/^[a-zA-Z0-9- ]*$/",$cabid)) {
						$cabidErr = "Only letters numbers and hyphen allowed"; 
					}
					$sql = ("Select * from cab where cab_number = '$cabid'");
					$res=$link->query($sql);
					if($res->num_rows == 0) {	
						$cabidErr = "Not a valid cab number";
					}
				}
				if ($empidErr == "" and $cabidErr == "") {
					$sql = "INSERT INTO rota VALUES('$date', '$empid', '$cabid', 'N')";
					if ($link->query($sql) === TRUE) {
						?>
						  <script>
						    $(document).ready(function() {
							    $('#empAddModal').modal('hide');
						    });
							
							
							$(document).ready(function() {
							    $('#done').modal('show');
						    });
					      </script>
						<?php
					}
				}
				else {
					?>
					<script>
						$(document).ready(function() {
							$('#empAddModal').modal('show');
						});
					</script>
					<?php
				}
		}
		function test_input($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
		}

	?>
	<br>
	<div class="container maincont">
        <form method="post" action="empdet.php" role="form">
			<div class="control-group form-group">
				<div class="controls">
					<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="font-family: Raleway; color: white; font-size: 20px;"> DATE</label>
					&nbsp;&nbsp;
					<input type="text" class="datepicker" name="date" id="mydate" autocomplete="off" value="<?php echo $date;?>">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="submit" class="btn btn-success" name="submit" id="empdetsubmit">SUBMIT</button>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#empAddModal">ADD</button>
				</div>
			</div>
		</form>
	</div>
	<div class="container">
		<br><br>  	
		<table class="table table-dark table-hover">
			<thead>
				<tr>
					<th class="thc">EMPLOYEE-ID</th>
					<th class="thc">EMPLOYEE-NAME</th>
					<th class="thc">ACCOUNT</th>
					<th class="thc">LOCATION</th>
				</tr>
			</thead>
			<?php  
				$sql = ("Select A.*, B.rota_date from employee A, rota B where B.rota_date = '$date' and B.rota_employee_id = A.employee_id");
				$res=$link->query($sql);
				if($res->num_rows>0) {
					while($row=$res->fetch_assoc()) {
						echo"<tr>
						<td>".$row['employee_id']."</td>
						<td>".$row['employee_name']."</td>
						<td>".$row['account']."</td>
						<td>".$row['location']."</td>
						<td><a href=\"delete.php?id=".$row['employee_id']."&datedel=".$row['rota_date']."\">Delete</a></td>
						</tr>";  
					}
				}
				else {
					echo "<tr> <td> No Results Found </td> </tr>";
				}			
			?>	    
        </table>
	</div>
	<!-- Modal HTML Markup -->
	<div id="empAddModal" class="modal fade">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form role="form" method="POST" action="">
				<div class="modal-header" style="padding:30px 50px;">
					<h5 class="modal-title">Give Employee Details</h5>
				</div>
				<div class="modal-body" style="padding:35px 50px;">
						<input type="hidden" name="modal-date" value="<?php echo $date;?>">
                        <div class="form-group">
							<label class="control-label">Employee-id</label>
							<div>
								<input type="text" class="form-control input-lg" name="emp-id" value="<?php echo $empid;?>">
								<span class="text-danger">* <?php echo $empidErr;?></span>
							</div>
                        </div>
                        <div class="form-group">
							<label class="control-label">Cab-Number</label>
							<div>
								<input type="text" class="form-control input-lg" name="cab-id" value="<?php echo $cabid;?>">
								<span class="text-danger">* <?php echo $cabidErr;?></span>
							</div>
                        </div>
						<div class="form-check-inline">
                            <label class="form-check-label" for="radio1">
                                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>For Today
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">For Current Month
                            </label>
                       </div> 
				</div>
				<div class="modal-footer">
					<button type="submit" name="empAddBtn" class="btn btn-primary mr-auto">Add</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
				</form>  
			</div><!-- /.modal-content -->
		</div ><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- Modal HTML Markup -->
	<div id="done" class="modal fade">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                     <h4 class="modal-title">Success</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                     Employee details are added successfully
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
		    </div>
		</div>
	</div>
</body>
