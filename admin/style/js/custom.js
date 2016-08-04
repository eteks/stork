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

  $('.stork_admin_table').each(function() {
    var thCount = $(this).find('th').length;        
    if(thCount == 3) {
      $(this).css('width','840px');
      $(this).find('th:first-child').css('width','350px');
      $(this).find('th:nth-child(2)').css('width','280x');
      $(this).find('th:nth-child(3)').css('width','200px');
    }
    else if(thCount == 4) {
      $(this).css('width','840px');
      $(this).find('th:first-child').css('width','268px');
      $(this).find('th:nth-child(2)').css('width','168px');
      $(this).find('th:nth-child(3)').css('width','168px');
      $(this).find('th:last-child').css('width','145px');
    }
    else if(thCount == 5) {
      $(this).css('width','840px');
      $(this).find('th:first-child').css('width','208px');
      $(this).find('th:nth-child(2)').css('width','208px');
      $(this).find('th:nth-child(3)').css('width','110px');
      $(this).find('th:nth-child(4)').css('width','110px');
      $(this).find('th:last-child').css('width','110px');
    }
    else if(thCount == 6) {
      $(this).css('width','930px');
      $(this).find('th:first-child').css('width','250px');
      $(this).find('th:nth-child(2)').css('width','130px');
      $(this).find('th:nth-child(3)').css('width','234px');
      $(this).find('th:nth-child(4)').css('width','250px');
      $(this).find('th:nth-child(5)').css('width','230px');
      $(this).find('th:last-child').css('width','110px');
    }
    else if(thCount == 7) {
      $(this).css('width','990px');
      $(this).find('th:first-child').css('width','230px');
      $(this).find('th:nth-child(2)').css('width','170px');
      $(this).find('th:nth-child(3)').css('width','260px');
      $(this).find('th:nth-child(4)').css('width','240px');
      $(this).find('th:nth-child(5)').css('width','150px');
      $(this).find('th:nth-child(6)').css('width','230px');
      $(this).find('th:last-child').css('width','110px');
    }
    else if(thCount == 9) {
      $(this).css('width','1230px');
      $(this).find('th:first-child').css('width','330px');
      $(this).find('th:nth-child(2)').css('width','200px');
      $(this).find('th:nth-child(3)').css('width','444px');
      $(this).find('th:nth-child(4)').css('width','200px');
      $(this).find('th:nth-child(5)').css('width','150px');
      $(this).find('th:nth-child(6)').css('width','346px');
      $(this).find('th:nth-child(7)').css('width','110px');
      $(this).find('th:nth-child(8)').css('width','230px');
      $(this).find('th:last-child').css('width','110px');
    }
     else if(thCount == 10) {
      $(this).css('width','1350px');
      $(this).find('th:first-child').css('width','284px');
      $(this).find('th:nth-child(2)').css('width','180px');
      $(this).find('th:nth-child(3)').css('width','319px');
      $(this).find('th:nth-child(4)').css('width','200px');
      $(this).find('th:nth-child(5)').css('width','210px');
      $(this).find('th:nth-child(6)').css('width','170px');
      $(this).find('th:nth-child(7)').css('width','320px');
      $(this).find('th:nth-child(8)').css('width','202px');
      $(this).find('th:nth-child(9)').css('width','202px');
      $(this).find('th:last-child').css('width','110px');
    }
    else if(thCount == 11) {
      $(this).css('width','1500px');
      $(this).find('th:first-child').css('width','204px');
      $(this).find('th:nth-child(2)').css('width','180px');
      $(this).find('th:nth-child(3)').css('width','200px');
      $(this).find('th:nth-child(4)').css('width','445px');
      $(this).find('th:nth-child(5)').css('width','340px');
      $(this).find('th:nth-child(6)').css('width','280px');
      $(this).find('th:nth-child(7)').css('width','190px');
      $(this).find('th:nth-child(8)').css('width','202px');
      $(this).find('th:nth-child(9)').css('width','300px');
      $(this).find('th:nth-child(10)').css('width','326px');
      $(this).find('th:last-child').css('width','230px');
    }
    else if(thCount == 13) {
      $(this).css('width','1620px');
      $(this).find('th:first-child').css('width','204px');
      $(this).find('th:nth-child(2)').css('width','600px');
      $(this).find('th:nth-child(3)').css('width','400px');
      $(this).find('th:nth-child(4)').css('width','280px');
      $(this).find('th:nth-child(5)').css('width','280px');
      $(this).find('th:nth-child(6)').css('width','280px');
      $(this).find('th:nth-child(7)').css('width','200px');
      $(this).find('th:nth-child(8)').css('width','280px');
      $(this).find('th:nth-child(9)').css('width','430px');
      $(this).find('th:nth-child(10)').css('width','194px');
      $(this).find('th:nth-child(11)').css('width','326px');
      $(this).find('th:nth-child(12)').css('width','326px');
      $(this).find('th:last-child').css('width','110px');
    }
    else if(thCount == 15) {
      $(this).css('width','1850px');
      $(this).find('th:first-child').css('width','270px');
      $(this).find('th:nth-child(2)').css('width','400px');
      $(this).find('th:nth-child(3)').css('width','240px');
      $(this).find('th:nth-child(4)').css('width','300px');
      $(this).find('th:nth-child(5)').css('width','410px');
      $(this).find('th:nth-child(6)').css('width','320px');
      $(this).find('th:nth-child(7)').css('width','200px');
      $(this).find('th:nth-child(8)').css('width','280px');
      $(this).find('th:nth-child(9)').css('width','480px');
      $(this).find('th:nth-child(10)').css('width','250px');
      $(this).find('th:nth-child(11)').css('width','250px');
      $(this).find('th:nth-child(12)').css('width','250px');
      $(this).find('th:nth-child(13)').css('width','326px');
      $(this).find('th:nth-child(14)').css('width','250px');
      $(this).find('th:last-child').css('width','130px');
    }

  else if(thCount == 16) {
      $(this).css('width','1850px');
      $(this).find('th:first-child').css('width','270px');
      $(this).find('th:nth-child(2)').css('width','400px');
      $(this).find('th:nth-child(3)').css('width','240px');
      $(this).find('th:nth-child(4)').css('width','300px');
      $(this).find('th:nth-child(5)').css('width','410px');
      $(this).find('th:nth-child(6)').css('width','320px');
      $(this).find('th:nth-child(7)').css('width','200px');
      $(this).find('th:nth-child(8)').css('width','280px');
      $(this).find('th:nth-child(9)').css('width','480px');
      $(this).find('th:nth-child(10)').css('width','250px');
      $(this).find('th:nth-child(11)').css('width','250px');
      $(this).find('th:nth-child(12)').css('width','250px');
      $(this).find('th:nth-child(13)').css('width','326px');
      $(this).find('th:nth-child(14)').css('width','250px');
      $(this).find('th:nth-child(15)').css('width','250px');
      $(this).find('th:last-child').css('width','130px');
    }
  });

  // $('.city_table,.state_table,.track_table,.cost_table,.offerzone_table,.paperprinttypes_table,.papertypes_table,.paperside_table,.area_table,.papersize_table,.papersize_table,.college_table,.admin_table,.user_table,.transaction_table').DataTable();

  $('.city_table,.state_table,.track_table,.cost_table,.offerzone_table,.paperprinttypes_table,.papertypes_table,.paperside_table,.area_table,.papersize_table,.papersize_table,.college_table,.admin_table,.user_table,.transaction_table').DataTable({
    "bAutoWidth": false, // Disable the auto width calculation
  });

var table = $('.stork_admin_table').DataTable();


$('.stork_admin_table th').each(function(index, th) {
  $(th).unbind('click');
  $(th).append('<span class="sort-btn btn-asc sort_asc"><i class="fa fa-sort-asc" aria-hidden="true"></i></span>');
  $(th).append('<span class="sort-btn btn-desc sort_desc"><i class="fa fa-sort-desc" aria-hidden="true"></i></span>');
  $('.sort_desc').css('display','none');
  $(th).find('.btn-asc').click(function(e) {
    var this_button = $(this);
     table.column(index).order('desc').draw();
        this_button.css('display','none');
        this_button.next().css('display','inline');
  }); 
  $(th).find('.btn-desc').click(function(e) {
    var this_button = $(this);
     table.column(index).order('asc').draw(); 
     this_button.css('display','none'); 
     this_button.prev().css('display','inline'); 
  }); 

});    




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

  var options = {
        now: "12:00", //hh:mm 24 hour format only, defaults to current time
        twentyFour: false,  //Display 24 hour format, defaults to false
        upArrow: 'wickedpicker__controls__control-up',  //The up arrow class selector to use, for custom CSS
        downArrow: 'wickedpicker__controls__control-down', //The down arrow class selector to use, for custom CSS
        close: 'wickedpicker__close', //The close class selector to use, for custom CSS
        hoverState: 'hover-state', //The hover state class to use, for custom CSS
        title: 'Timepicker', //The Wickedpicker's title
        meridiem: false
    };
  $('.timepicker').wickedpicker(options);

  $(document).on('change','#holiday_date',function(){
    var weekday=new Array(7);
    weekday[0]="Monday";
    weekday[1]="Tuesday";
    weekday[2]="Wednesday";
    weekday[3]="Thursday";
    weekday[4]="Friday";
    weekday[5]="Saturday";
    weekday[6]="Sunday";
    var holiday_date = $(this).datepicker('getDate');
    var dayOfWeek = weekday[holiday_date.getUTCDay()];
    $('#holiday_day').val(dayOfWeek);
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
  $('#phone,#noofsystem,#no_of_limitation').keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 44 && e.which != 45 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        // $("#error_test").html("Digits Only").show().fadeOut("slow");
        return false;
    }
   });
});
$(document).ready(function () { 
    $('#dob,#holiday_date,.date_picker').datepicker({
        dateFormat: 'dd/mm/yy',
        altField: '#thealtdate',
        altFormat: 'yy-mm-dd'
    });
     $('.date_picker').datepicker({
        dateFormat: 'mm/dd/yy',
        altField: '#thealtdate'
    });

      $('#firstname').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
        $('#lastname').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
         $('#statename').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
         $('#cityname').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
        $('#areaname').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
        $('#collegename').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
          $('#customername').keydown(function (e) {
          if (e.shiftKey || e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
      $("#deliverycharge").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which !=46 &&  e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#error_test").html("Digits Only").show().fadeOut("slow");
               return false;
    }
        });
      $("#totalitems,#order_student_year").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which !=46 &&  e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#error_test").html("Digits Only").show().fadeOut("slow");
               return false;
    }
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
// $('.plain_print_menu').on('click',function() {
//   $('.plain_printing').addclass('open');
// });
/* add offer */
 $("#offeramount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which !=46 &&  e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#error_test").html("Digits Only").show().fadeOut("slow");
               return false;
    }
        });

    $("#eligibleamtforoffer").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which !=46 &&  e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#error_test").html("Digits Only").show().fadeOut("slow");
               return false;
    }
        });
  $('#sel_c').change(function()
  {
    var option = $(this).find('option:selected').val();
    if (option == 'cost') {
    $('#showoption').text("Offer cost");
   $('#offeramount').removeAttr("placeholder","Offer Amount").attr("placeholder","Offer cost")    
 }
     else {
     $('#showoption').text("Offer percentage (%)");
      $('#offeramount').removeAttr("placeholder","Offer Amount").attr("placeholder","Offer percentage (%)") 
     }
  });


});
