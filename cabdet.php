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
            if (isset($_POST['submit'])) {
                 # submit-button was clicked
				 $date = $_POST['date'];
            }
			else {
			     $date = Date("Y-m-d");
		    }
			$cab_no=$seater=$driver_name=$driver_no="";
			$cabnum_err=$seater_err=$drivername_err=$drivernum_err="";
            if (isset($_POST['add'])) {
				 if(empty(trim($_POST["cab_num"]))){
                          $cabnum_err = '**Please enter cab-number**';
                 } else{
                          $cab_no = trim($_POST["cab_num"]);
						  if (!preg_match("/^[a-zA-Z0-9- ]*$/",$cab_no)) {
						       $cabnum_err = '**Only letters numbers and hyphen allowed**'; 
					      }
						  if(strlen($cab_no)>10){
						       $cabnum_err = '**Invalid cab number**';
						  }
                 }
				 if(empty(trim($_POST["seater"]))){
                          $seater_err = '**Please enter seater**';
                 } else{
                          $seater = trim($_POST["seater"]);
						  if (!preg_match("/^[0-9]*$/",$seater)) {
						       $seater_err = '**Only numbers are allowed**';
					      }
						  if(strlen($seater)>2){
						       $seater_err = '**Invalid seater value**';
						  }
                 }
				 if(empty(trim($_POST["dri_name"]))){
                          $drivername_err = '**Please enter driver name**';
                 } else{
                          $driver_name = trim($_POST["dri_name"]);
						  if (!preg_match("/^[a-zA-Z0-9- ]*$/",$driver_name)) {
						       $drivername_err = '**Only letters numbers and hyphen allowed**'; 
					      }
						  if(strlen($driver_name)>50){
						       $drivername_err = '**Name cannot be more than 50 characters**';
						  }
                 }
				 if(empty(trim($_POST["dri_num"]))){
                          $drivernum_err = '**Please enter driver-number**';
                 } else{
                          $driver_no = trim($_POST["dri_num"]);
						  if (!preg_match("/^[0-9]*$/",$driver_no)) {
									$drivernum_err = '**Only numbers are allowed**';
					      }
						  if(strlen($driver_no)>11){
						       $drivernum_err = '**Invalid phone number**';
						  }
                 }
				 if(empty($cabnum_err) && empty($seater_err) && empty($drivername_err) && empty($drivernum_err)){
                          $sql="INSERT INTO cab (cab_number,cab_seater,cab_driver_name,cab_driver_no) VALUES('$cab_no', '$seater', '$driver_name', '$driver_no')";
				          if ($link->query($sql) === TRUE) {
						  ?>
						  <script>
						    $(document).ready(function() {
							    $('#myModal').modal('hide');
						    });
							$(document).ready(function() {
							    $('#done').modal('show');
						    });
					      </script>
						  
						<?php
				        }	
                 }						
				        else{
					 	?>
					    <script>
						    $(document).ready(function() {
							    $('#myModal').modal('show');
						    });
					    </script>
				        <?php
				        } 
	        }
            ?>
	<br>
	<div class="container maincont">
        <form method="post" action="cabdet.php" role="form">
			<div class="control-group form-group">
				<div class="controls">
					<br>
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="font-family: Raleway; color: white; font-size: 20px;">DATE</label>
					&nbsp;&nbsp;
					<input type="text" class="datepicker" name="date" id="mydate" autocomplete="off" value="<?php echo $date;?>">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="submit" class="btn btn-success" name="submit">SUBMIT</button>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">ADD NEW CAB</button>
				</div>
			</div>
		</form>
	</div>
	<div class="container">
		<br><br>  	
		<table class="table table-dark table-hover">
			<thead>
				<tr>
					<th class="thc">CAB-NUMBER</th>
					<th class="thc">SEATER</th>
					<th class="thc">DRIVER-NAME</th>
					<th class="thc">DRIVER-NUMBER</th>
				</tr>
			</thead>
			<?php  
				$sql = ("SELECT distinct B.*, A.rota_date FROM rota A, cab B where A.rota_date = '$date' and A.rota_cab_number = B.cab_number");
				$res=$link->query($sql);
				if($res->num_rows>0) {
					$i=0;
					while($row=$res->fetch_assoc()) {
						echo"<tr>
						<td>".$row['cab_number']."</td>
						<td>".$row['cab_seater']."</td>
						<td>".$row['cab_driver_name']."</td>
						<td>".$row['cab_driver_no']."</td>						
						<td><a href=\"deletecab.php?id=".$row['cab_number']."&datedel=".$row['rota_date']."\">Delete</a></td>
						</tr>";  
						$i++;
					}
				}
				else {
					echo "<tr> <td> No Results Found </td> </tr>";
				}			
			?>	    
        </table>
	</div>
	<!-- Modal HTML Markup -->
	<div id="myModal" class="modal fade">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Give Cab Details</h5>
				</div>
				<div class="modal-body">
					<form role="form" method="POST" action="">
						<input type="hidden" name="_token" value="">
                        <div class="form-group">
							<label class="control-label">Cab-number</label>
							<div>
								<input type="text" class="form-control input-lg" name="cab_num" value="<?php echo $cab_no;?>">
								<span class="text-danger"><?php echo $cabnum_err; ?></span>
							</div>
                        </div>
                        <div class="form-group">
							<label class="control-label">Seater</label>
							<div>
								<input type="text" class="form-control input-lg" name="seater" value="<?php echo $seater;?>">
								<span class="text-danger"><?php echo $seater_err; ?></span>
							</div>
                        </div>
                        <div class="form-group">
							<label class="control-label">Driver name</label>
							<div>
								<input type="text" class="form-control input-lg" name="dri_name" value="<?php echo $driver_name;?>">
								<span class="text-danger"><?php echo $drivername_err; ?></span>
							</div>
                        </div>
                        <div class="form-group">
							<label class="control-label">Driver number</label>
							<div>
								<input type="text" class="form-control input-lg" name="dri_num" value="<?php echo $driver_no;?>">
								<span class="text-danger"><?php echo $drivernum_err; ?></span>
							</div>
						</div>	
					</div>	
				    <div class="modal-footer">
					     <input type="submit" name="add" class="btn btn-success mr-auto" data-toggle="modal" value="Add"></button>
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
                     Cab details are added successfully
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
		    </div>
		</div>
	</div>
</body>