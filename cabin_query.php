<?php
	if(!empty("require_date")) {
		$required_date = $_POST['require_date'];
		echo $required_date;
	}
	else {
		echo"success";
		$required_date = date("Y-m-d");
	}
	$cabin_slot_query = mysqli_query($connection, "select * from ".CABINSLOTTIME." left join ".CABINSYSTEMAVAILABLE." on ".CABINSLOTTIME.".schedule_time_id =" .CABINSYSTEMAVAILABLE.".system_schedule_time_id AND ".CABINSYSTEMAVAILABLE.".system_booked_date = '$required_date' WHERE ".CABINSLOTTIME.".schedule_time_status='1'");
	$cabin_total_query = mysqli_query($connection, "select * from ".CABINTOTALSYSTEM);
	$total_system = mysqli_fetch_array($cabin_total_query);

	while($row1 = mysqli_fetch_array($cabin_slot_query)){  ?>
	<div class="slot fl">
    	<i class="fa fa-clock-o" aria-hidden="true" title="Click to select this slot"> </i> 
    	<div style="text-align:center;">
    		<span> <?php echo $row1['schedule_time_end'] ?>- <?php echo $row1['schedule_time_start'] ?></span>
    	    <span> <?php echo $row1['number_of_system_available']; ?> / <?php echo $total_system['total_number_of_system']; ?></span>
    	</div>		                	
    </div> 
    <?php } ?>
