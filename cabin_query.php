<?php
	//if(!isset($connection)){
		require_once ("dbconnect.php");
		require_once("function.php");
	//}
	
	if(!empty($_POST['require_date'])) {
		$required_date = $_POST['require_date'];
		$timingtype = $_POST['timeing_type'];
	}
	else {
		$required_date = date("Y-m-d");
		$timingtype = 'fixed';
	}
	$cabin_slot_query = mysqli_query($connection, "select * from ".CABINSLOTTIME." where schedule_time_timing_type = '".$timingtype."' and schedule_time_status='1'");
	
	$cabin_total_query = mysqli_query($connection, "select * from ".CABINTOTALSYSTEM." where total_number_of_system_timing_type = '".$timingtype."' and total_number_of_system_status='1'");
	$total_system = mysqli_fetch_array($cabin_total_query);
	
	while($row1 = mysqli_fetch_array($cabin_slot_query)){
	  $system_availablity_query = mysqli_query($connection, "select sum(number_of_system_booked) as sum_value from ".CABINSYSTEMAVAILABLE." where system_availability_timing_type = '".$timingtype."' and system_booked_date = '".$required_date."' and system_schedule_time_id =".$row1['schedule_time_id']);
	  $system_availablity_array = mysqli_fetch_array($system_availablity_query);
	  $available_systems = $total_system['total_number_of_system']-$system_availablity_array['sum_value'];
	  if($available_systems > 0){
?>
	<div class="slot fl">
    	<i class="fa fa-clock-o cabin_available" aria-hidden="true" title="Click to select this slot"> </i> 
    	<div style="text-align:center;">
    		<span><?php echo $row1['schedule_time_start']; ?> - <?php echo $row1['schedule_time_end'] ?> </span><br>
    	    <span><?php echo (isset($system_availablity_array['sum_value'])?$system_availablity_array['sum_value']:'0'); ?> / <?php echo $total_system['total_number_of_system']; ?></span>
    	</div>		                	
    </div> 
<?php 
	  }
	  else{
?>
	<div class="slot fl">
    	<i class="fa fa-clock-o cabin_booked" aria-hidden="true" title="Click to select this slot"> </i> 
    	<div style="text-align:center;">
    		<span><?php echo $row1['schedule_time_start']; ?> - <?php echo $row1['schedule_time_end'] ?> </span><br>
    	    <span><?php echo $system_availablity_array['sum_value']; ?> / <?php echo $total_system['total_number_of_system']; ?></span>
    	</div>		                	
    </div>
<?php
	  }
  	} 
?>
