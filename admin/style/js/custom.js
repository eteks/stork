 /*Admin sidebar starts */

$(document).ready(function(){

  $(window).resize(function()
  {
    if($(window).width() >= 991){
      $(".sidey").slideDown(350);
    }                
  });
  $('.paging-nav a').each(function() {
    
  });
});
 
$(document).ready(function(){

  // var $rows = $('.state_table tbody tr');
  // $(document).on('keyup','.search',function() {
  //     var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();      
  //     $rows.show().filter(function() {
  //         var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
  //         return !~text.indexOf(val);
  //     }).hide();   
  // });

  $('.city_table,.state_table,.track_table,.cost_table,.offerzone_table,.paperprinttypes_table,.papertypes_table,.paperside_table,.area_table,.papersize_table,.papersize_table,.college_table,.admin_table,.user_table,.transaction_table').DataTable();

  $('.error_message_mandatory').delay(2000).fadeOut();

  $(".has_submenu > a").click(function(e){
    // alert($.trim($(this).text()));
    $('.breadcrumb').html('<li><a>'+$.trim($(this).text())+'</a></li>');
    e.preventDefault();
    var menu_li = $(this).parent("li");
    var menu_ul = $(this).next("ul");

    if(menu_li.hasClass("open")){
      menu_ul.slideUp(350);
      menu_li.removeClass("open");
    }
    else{
      $(".nav > li > ul").slideUp(350);
      $(".nav > li").removeClass("open");
      menu_ul.slideDown(350);
      menu_li.addClass("open");
    }
  });

  $('.change_status').on('change',function(){
    $('.change_status_value').val('1');
  });
  
});

$(document).ready(function(){
  $(".sidebar-dropdown a").on('click',function(e){
      e.preventDefault();

      if(!$(this).hasClass("dropy")) {
        // hide any open menus and remove all other classes
        $(".sidey").slideUp(350);
        $(".sidebar-dropdown a").removeClass("dropy");
        
        // open our new menu and add the dropy class
        $(".sidey").slideDown(350);
        $(this).addClass("dropy");
      }
      
      else if($(this).hasClass("dropy")) {
        $(this).removeClass("dropy");
        $(".sidey").slideUp(350);
      }
  });

});
$(document).ready(function () { 
  //called when key is pressed in textbox
  $("#phone").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 44 && e.which != 45 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        // $("#error_test").html("Digits Only").show().fadeOut("slow");
        return false;
    }
   });
});
$(document).ready(function () {
    $('#dob').datepicker({
        dateFormat: 'dd/mm/yy',
        altField: '#thealtdate',
        altFormat: 'yy-mm-dd'
    });
    
});

$(document).ready(function () {
    $('#dateofdelivered').datepicker({
        dateFormat: 'dd/mm/yy',
        altField: '#thealtdate',
        altFormat: 'yy-mm-dd'
    });
    $('#my-orders-table_filter input').addClass('placeholder_input_search');
    $('.placeholder_input_search').prop('placeholder','Search');

});

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#amount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which !=46 &&  e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#error_test").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });

$(document).ready(function () {
  $('#my-orders-table_filter').appendTo('.search-safari');
  $('#my-orders-table_length').insertAfter(".clone_heading");
  $('#my-orders-table_filter').addClass('search-form');
});
});
/* Admin sidebar navigation ends */