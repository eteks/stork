$(document).ready(function(){
	
	//print booking first tab menu
	$('#product-detail .print_book_user_type').click(function(){
		
		if($(this).val().trim() == 'student'){
			$('#print_book_state').addClass('dn');
			$('#print_book_college').removeClass('dn');
			$('.print_book_college_stu').removeClass('dn');
		}
		
		else if($(this).val().trim() == 'professional'){
			$('#print_book_college').addClass('dn');
			$('#print_book_state').removeClass('dn');
			$('.print_book_college_stu').addClass('dn');
		}
		
	});
	
	//print booking second tab menu
	$('#product-detail .print_book_print_type').click(function(){
		if($(this).val().trim() == 'bwc'){
			$('.only_for_color_with_bw').removeClass('dn');
			$('.print_book_confirm_color').removeClass('dn');
		}
		
		else{
			$('.only_for_color_with_bw').addClass('dn');
			$('.print_book_confirm_color').addClass('dn');
		}
		
	});
	
	//add more color pages
	$('.add_more_color_page').on('click	',function(){
		$("<tr class='only_for_color_with_bw'><td>Enter color print page no</td><td><input type='text' name='color_page' value='' class='color_print_page_no'/></td><td><input type='file' name='color_page_files[]' /></td></tr>").insertAfter('.only_for_color_with_bw:last');
	});
	
	// for confirmation tab menu when click tab 4 click
	$('#print_booking_confirmation').click(function(){
		
		//print type
		if($('#product-detail .pbptc').is(':checked')){
			$('#product-detail .print_book_confirm_print_type').html('Color');
		}
		else if($('#product-detail .pbptbw').is(':checked')){
			$('#product-detail .print_book_confirm_print_type').html('Black & White');
		}
		else{
			$('#product-detail .print_book_confirm_print_type').html('Black & White and Color');
		}
		
		// print side
		if($('#product-detail .pbpsss').is(':checked')){
			$('#product-detail .print_book_confirm_print_side').html('Single Side');
		}
		else{
			$('#product-detail .print_book_confirm_print_side').html('Double Side');
		}
		
		//paper size 
		$('#product-detail .print_book_confirm_paper_size').html($('#product-detail  .print_book_paper_size option:selected').text());
		
		//Paper type
		$('#product-detail .print_book_confirm_paper_type').html($('#product-detail  .print_book_paper_type option:selected').text());
		
		//Color print page no
		if($('#product-detail .pbptbwc').is(':checked')){
			
			var total_color_pages = 0;
			var color_page_numbers = '';
			$('.only_for_color_with_bw').each(function(){
				var value = $(this).find('.color_print_page_no').val();
				var words = value.split(",");
				color_page_numbers +=value+',';
				total_color_pages += words.length;
			});
			$('#product-detail .print_book_confirm_color_pages').html(color_page_numbers);
			$('#product-detail .print_book_confirm_total_color_pages').html(total_color_pages);
		}
		
		//total no of pages
		$('#product-detail .print_book_confirm_total_number_pages').html($('#product-detail .total_number_of_page').val());
		
		//total cost
		$('#product-detail .print_book_confirm_total_cost').html($('#product-detail .print_book_total_cost').val());
		
		//shipping details
		$('#product-detail .print_book_confirm_total_ship_lane1').html($('#product-detail .registered_user_line1').val());
		$('#product-detail .print_book_confirm_total_ship_lane2').html($('#product-detail .registered_user_line2').val());
	});
	
});// END DOCUMENT READY FUNCTION
