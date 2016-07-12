<?php

define("HOSTNAME", "localhost");//localhost
define("DBUSER", "root");//root
define("DBPASSWORD", "");
define("DATABASE", "stork");//stork

// this is for google settings
define("GOOGLECLIENTID", "917333063130-v76t7dmqcvvbtq4cum8h9kej9dlql8jb.apps.googleusercontent.com"); // Client ID
define("GOOGLECLIENTSECRET", "tKRvzUInxty26p19oMli58V9"); // Client Secret id
define("GOOGLEREDIRECTURL", "http://www.printstork.com/demo/googleuserfunction.php"); // Redirect Url - Please check with google api account details
define("GOOGLEHOMEURL", "http://www.printstork.com/demo/index.php"); //Google Home url - Please check with google api account details
define("GOOGLEAPPNAME", "Login to Printstork");


// this is for facebook settings
define("FACEBOOKAPPID", "800444590056438"); //facebook app id
define("FACEBOOKAPPSECRET", "d422bcf132c700ed89d03865cdff884a"); //facebook secret id
define("FACEBOOKGRAPHVERSION", "v2.5");//facebook graph version
define("FACEBOOKLOGINURL", "http://www.printstork.com/demo/fbuserfunction.php");//facebook login url


//database table names
define("STATE",'stork_state');
define("ADMIN",'stork_admin_users');
define("AREA",'stork_area');
define("COLLEGE",'stork_college');
define("COSTESTIMATION",'stork_cost_estimation');
define("OFFER",'stork_offer_zone');
define("ORDER",'stork_order');
define("ORDERDETAILS",'stork_order_details');
define("PRINTTYPE",'stork_paper_print_type');
define("PAPERSIDE",'stork_paper_side');
define("PAPERSIZE",'stork_paper_size');
define("PAPERTYPE",'stork_paper_type');
define("PRINTINGTYPE",'stork_printing_type');
define("UPLOADFILES",'stork_upload_files');
define("USERS",'stork_users');
define("NUMBEROFCOPIES",'stork_multicolor_copies');
define("PRINTINGTYPE",'stork_printing_type');
define("CITY",'stork_city');
define("BINDINGAMOUNT",'stork_cost_estimation_binding');
define("PROJECTCOSTESTIMATION",'stork_cost_estimation_project_printing');
define("MULTICOLOR",'stork_cost_estimation_multicolor');



//php allows only ajax call
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

// uploaded file extensions
$ALLOWEDFILE = array('doc','docx','pdf');

// cc avenue details
define("MERCHANTID",'101665'); // merchant id
define('CCAVENUEREDIRECTURL','http://printstork.com/demo/ccavResponseHandler.php'); //redirect url
define('CCAVENUECANCELURL','http://printstork.com/demo/ccavResponseHandler.php'); //cancel url

// forgot password from email address
define("FORGOTPASSWORDEMAILID",'info@etekchnoservices.com'); 


//printing type
$printing_type = array('plain_printing' => 'Plain Printing','project_printing' => 'Project Printing','multicolor_printing' => 'Mutlticolor Printing');
?>