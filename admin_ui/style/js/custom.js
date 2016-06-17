/* Admin sidebar starts */

$(document).ready(function(){

  $(window).resize(function()
  {
    if($(window).width() >= 991){
      $(".sidey").slideDown(350);
    }                
  });

});
 
$(document).ready(function(){

  $('.error_message_mandatory').delay(2000).fadeOut();

  $(".has_submenu > a").click(function(e){
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
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#error_test").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(document).ready(function () {
    
    $('#date').datepicker({
        dateFormat: 'dd-mm-yy',
        altField: '#thealtdate',
        altFormat: 'yy-mm-dd'
    });
    
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
});
/* Admin sidebar navigation ends */