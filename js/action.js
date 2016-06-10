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
	
	// for confirmation tab menu
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
			$('#product-detail .print_book_confirm_color_pages').html($('#product-detail  .color_print_page_no').val());
			var value = $('#product-detail  .color_print_page_no').val();
			var words = value.split(",");
			$('#product-detail .print_book_confirm_total_color_pages').html(words.length);
		}
	});
	
});// END DOCUMENT READY FUNCTION
