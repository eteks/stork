<?php
	//if(!isset($connection)){
date_default_timezone_set('Asia/Kolkata');
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
	  	$start_time_split = explode(" ", $row1['schedule_time_start']);
	  	$end_time_split = explode(" ", $row1['schedule_time_end']);
	  	$time_in_24_hour_format_start  =date("G:i", strtotime($start_time_split[0].':'.$start_time_split[2].' '.$start_time_split[3]));
	  	$time_in_24_hour_format_end  = date("G:i",  strtotime($end_time_split[0].':'.$end_time_split[2].' '.$end_time_split[3]));
		$start_time_calc= strtotime($time_in_24_hour_format_start);
		$end_time_calc= strtotime($time_in_24_hour_format_end);
		$hours_per_slot = ($end_time_calc-$start_time_calc)/60;
		$zero    = new DateTime('@0');
		$offset  = new DateTime('@' . $hours_per_slot * 60);
		$diff    = $zero->diff($offset);
		$duration =  $diff->format('%H:%I:%S');
		if(strtolower($timingtype) == 'fixed'){
			$costing_entered_data = mysqli_query($connection, "select * from ".CABINCOSTESTIMATION." where cabin_cost_estimation_timing_type = '".$timingtype."' and cabin_cost_estimation_duration = '".$duration."' and cabin_cost_estimation_status ='1'");
		}else if(strtolower($timingtype) == 'flexible'){
			$costing_entered_data = mysqli_query($connection, "select * from ".CABINCOSTESTIMATION." where cabin_cost_estimation_timing_type = '".$timingtype."' and cabin_cost_estimation_duration = '01:00:00' and cabin_cost_estimation_status ='1'");
		}
		
		$costing_data_array = mysqli_fetch_array($costing_entered_data);
		$row_cnt = mysqli_num_rows($costing_entered_data);
		$current_time = date("G:i", time());
		$current_time_calc = strtotime($current_time);
		//show available slots for fixed with amount allocation based on if shcheduled time greater than the current time of today 
		if($row_cnt>0 && strtolower($timingtype) == 'fixed'){
			if($required_date == date("Y-m-d")){
				if($current_time_calc < $start_time_calc){ 
?>
					<div class="slot fl">
				    	<i class="fa fa-clock-o cabin_available" aria-hidden="true" title="Click to select this slot" data-id="<?php echo $row1['schedule_time_id']; ?>"> </i> 
				    	<div style="text-align:center;">
				    		<span><?php echo $row1['schedule_time_start']; ?> - <?php echo $row1['schedule_time_end'] ?> </span><br>
				    	    <span><?php echo (isset($system_availablity_array['sum_value'])?$system_availablity_array['sum_value']:'0'); ?> / <?php echo $total_system['total_number_of_system']; ?></span>
				    	    <input type="hidden" class="system_availability" value="<?php echo $total_system['total_number_of_system']-(isset($system_availablity_array['sum_value'])?$system_availablity_array['sum_value']:'0'); ?>">
				    		<input type="hidden" class="total_hours_per_slot" value="<?php echo $duration; ?>">
				    		<input type="hidden" class="timeslotamount" value="<?php echo $costing_data_array['cabin_cost_estimation_amount']; ?>">
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
				    	    <span>Closed</span>
				    	</div>		                	
				    </div>
<?php
				}	
			}
			else {
?>
				<div class="slot fl">
			    	<i class="fa fa-clock-o cabin_available" aria-hidden="true" title="Click to select this slot" data-id="<?php echo $row1['schedule_time_id']; ?>"> </i> 
			    	<div style="text-align:center;">
			    		<span><?php echo $row1['schedule_time_start']; ?> - <?php echo $row1['schedule_time_end'] ?> </span><br>
			    	    <span><?php echo (isset($system_availablity_array['sum_value'])?$system_availablity_array['sum_value']:'0'); ?> / <?php echo $total_system['total_number_of_system']; ?></span>
			    	    <input type="hidden" class="system_availability" value="<?php echo $total_system['total_number_of_system']-(isset($system_availablity_array['sum_value'])?$system_availablity_array['sum_value']:'0'); ?>">
			    		<input type="hidden" class="total_hours_per_slot" value="<?php echo $duration; ?>">
			    		<input type="hidden" class="timeslotamount" value="<?php echo $costing_data_array['cabin_cost_estimation_amount']; ?>">
			    	</div>		                	
			    </div> 
<?php
			}
		}
		//show available slots for flexible with amount allocation based on if shcheduled time greater than the current time of today 
		else if($row_cnt>0 && strtolower($timingtype) == 'flexible'){
			if($required_date == date("Y-m-d")){
				if($current_time_calc < $start_time_calc){
?>
					<div class="slot fl">
				    	<i class="fa fa-clock-o cabin_available" aria-hidden="true" title="Click to select this slot" data-id="<?php echo $row1['schedule_time_id']; ?>"> </i> 
				    	<div style="text-align:center;">
				    		<span><?php echo $row1['schedule_time_start']; ?> - <?php echo $row1['schedule_time_end'] ?> </span><br>
				    	    <span><?php echo (isset($system_availablity_array['sum_value'])?$system_availablity_array['sum_value']:'0'); ?> / <?php echo $total_system['total_number_of_system']; ?></span>
				    		<input type="hidden" class="system_availability" value="<?php echo $total_system['total_number_of_system']-(isset($system_availablity_array['sum_value'])?$system_availablity_array['sum_value']:'0'); ?>">
				    		<input type="hidden" class="total_hours_per_slot" value="<?php echo $duration; ?>">
				    		<input type="hidden" class="timeslotamount" value="<?php echo $costing_data_array['cabin_cost_estimation_amount']; ?>">
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
				    	    <span>Closed</span>
				    	</div>		                	
				    </div>
<?php
					
				}
			}
			else{
				
?>
					<div class="slot fl">
				    	<i class="fa fa-clock-o cabin_available" aria-hidden="true" title="Click to select this slot" data-id="<?php echo $row1['schedule_time_id']; ?>"> </i> 
				    	<div style="text-align:center;">
				    		<span><?php echo $row1['schedule_time_start']; ?> - <?php echo $row1['schedule_time_end'] ?> </span><br>
				    	    <span><?php echo (isset($system_availablity_array['sum_value'])?$system_availablity_array['sum_value']:'0'); ?> / <?php echo $total_system['total_number_of_system']; ?></span>
				    		<input type="hidden" class="system_availability" value="<?php echo $total_system['total_number_of_system']-(isset($system_availablity_array['sum_value'])?$system_availablity_array['sum_value']:'0'); ?>">
				    		<input type="hidden" class="total_hours_per_slot" value="<?php echo $duration; ?>">
				    		<input type="hidden" class="timeslotamount" value="<?php echo $costing_data_array['cabin_cost_estimation_amount']; ?>">
				    	</div>		                	
				    </div>
<?php
			}
		}
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
