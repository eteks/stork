         <?php
include "includes/header.php";
function generate_combinations(array $data, array &$all = array(), array $group = array(), $value = null, $i = 0)
{
    $keys = array_keys($data);
    if (isset($value) === true) {
        array_push($group, $value);
    }

    if ($i >= count($data)) {
        array_push($all, $group);
    } else {
        $currentKey     = $keys[$i];
        $currentElement = $data[$currentKey];
        foreach ($currentElement as $val) {
            generate_combinations($data, $all, $group, $val, $i + 1);
        }
    }

    return $all;
}

$papersize = mysqlQuery("SELECT * FROM `stork_paper_size`");
$papersides = mysqlQuery("SELECT * FROM `stork_paper_side`");
$papertypes = mysqlQuery("SELECT * FROM `stork_paper_type`");
$paperprinttypes = mysqlQuery("SELECT * FROM `stork_paper_print_type`");

$papersize_array = array();
$papersides_array = array();
$papertypes_array = array();
$paperprinttypes_array = array();

while ( $result = mysql_fetch_array( $papersize )){
    $tmp = array($result['paper_size']);    
    array_push( $papersize_array, $tmp );
}

while ( $result = mysql_fetch_array( $papersides )){
    $tmp = array($result['paper_side']);    
    array_push( $papersides_array, $tmp );
}

while ( $result = mysql_fetch_array( $papertypes )){
    $tmp = array($result['paper_type']);    
    array_push( $papertypes_array, $tmp );
}

while ( $result = mysql_fetch_array( $paperprinttypes )){
    $tmp = array($result['paper_print_type']);  
    array_push( $paperprinttypes_array, $tmp );
}

// print_r($papersize_array);
// print_r($papersides_array);
// print_r($papertypes_array);
// print_r($paperprinttypes_array);

$datas = generate_combinations(array($papersize_array,$papersides_array,$papertypes_array,$paperprinttypes_array));

// echo count($datas);

// $estimated_cost = mysqlQuery("SELECT * FROM stork_cost_estimation 
//                                     INNER JOIN stork_paper_print_type ON stork_paper_print_type.paper_print_type_id= stork_cost_estimation.cost_estimation_paper_print_type_id 
//                                     INNER JOIN stork_paper_side ON stork_paper_side.paper_side_id=stork_cost_estimation.cost_estimation_paper_side_id 
//                                     INNER JOIN stork_paper_size ON stork_paper_size.paper_size_id=stork_cost_estimation.cost_estimation_paper_size_id 
//                                     INNER JOIN stork_paper_type ON stork_paper_type.paper_type_id=stork_cost_estimation.cost_estimation_paper_type_id
//                                     ");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All States</title>
</head>
<body>
<?php include 'includes/navbar_admin.php'; ?>
<section class="header-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 hidden-xs dashboard_header">
                <h1 class="mh-title"> My Dashboard </h1>
            </div>
            <div class="col-md-3 search-w SC-w hd-pd ">
                <span class="search-icon dropdowSCIcon">
                    <i class="fa fa-search"></i>
                </span>
                <div class="search-safari" style="display:none;">
                    <!-- <div class="search-form dropdowSCContent">
                        <form method="POST" action="#">
                            <input type="text" name="search" placeholder="Search" />
                            <input type="submit" name="search" value="Search">
                            <i class="fa fa-search"></i>
                        </form>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</section>
<div class="page-content blocky">
<div class="container" style="margin-top:20px;">   
    <?php include 'includes/sidebar.php'; ?>
    <div class="mainy col-md-9 col-sm-8 col-xs-12"> 
        <div class="heading_section col-md-12">
        <h3 class="acc-title lg clone_heading"> Cost estimation</h3>
<div class="amout_fixed_status">
        <span> Amount fixed status </span><select id="select-category" name="categories">
    <option value=""> </option>
    <option value="Fixed">Fixed</option>
    <option value="Not Fixed">Not Fixed</option>
</select>
</div>
        <div class="clear_both"> </div>
        </div>
            <div class="form-edit-info">
                <table class="data-table cost_table" id="my-orders-table">
                    <thead>
                    <tr class="">
                        <th>Paper Print Type </th>
                        <th>Paper Side</th>
                        <th>Paper Size</th>
                        <th>Paper Type</th>                      
                        <th>Amount fixed Status</th>            
                    </tr>
                    </thead>
                    <?php 
                    foreach ($datas as $value) {
                        $size = implode(" ",$value[0]);
                        $side = implode(" ",$value[1]);
                        $type = implode(" ",$value[2]);
                        $print_type = implode(" ",$value[3]);

                    ?>
                    <tr class="">
                        <td><?php echo $print_type ?></td>
                        <td><?php echo $side ?></td>
                        <td><?php echo $size ?></td>
                        <td><?php echo $type ?></td> 
                        <td class="fixed_notfixed">
                        <?php 
                            $estimated_cost = mysqlQuery("SELECT * FROM stork_cost_estimation 
                                    INNER JOIN stork_paper_print_type ON stork_paper_print_type.paper_print_type_id= stork_cost_estimation.cost_estimation_paper_print_type_id 
                                    INNER JOIN stork_paper_side ON stork_paper_side.paper_side_id=stork_cost_estimation.cost_estimation_paper_side_id 
                                    INNER JOIN stork_paper_size ON stork_paper_size.paper_size_id=stork_cost_estimation.cost_estimation_paper_size_id 
                                    INNER JOIN stork_paper_type ON stork_paper_type.paper_type_id=stork_cost_estimation.cost_estimation_paper_type_id
                                    where cost_estimation_status=1");
                            $rows_count = mysql_num_rows($estimated_cost);
                            if ($rows_count == 0){
                               echo "Not Fixed"; 
                            }
                            else{
                                while ($cost_array = mysql_fetch_array($estimated_cost)) {   
                                    if(trim($cost_array['paper_print_type']) == trim($print_type) && trim($cost_array['paper_size']) == trim($size) && trim($cost_array['paper_side']) == trim($side) && trim($cost_array['paper_type']) == trim($type)){        
                                        $status = "Fixed";
                                        break;
                                    } 
                                    else{
                                        $status = "Not Fixed";
                                    }
                                }
                                echo $status;
                            }    
                        ?>
                        </td>    
                    </tr> 
                    <?php } ?>     
                </table>                                  
    </div>
    <div class="clearfix"></div>
    <!-- Jquery for delete -->
    <script type="text/javascript" >
        $(document).on("click", ".delete", function () {
        var myId = $(this).data('id');
        $(".modal-body #vId").val( myId );
        $("#del_link").prop("href", "cost_estimation.php?delete="+myId);
        });
    </script>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body delete_message_style">
                    <input type="hidden" name="delete" id="vId" value=""/>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center>
                            <h5>Are you sure you want to delete this Product? </h5>
                        </center>
                </div>
                <div class="modal-footer footer_model_button">
                    <a name="action" id="del_link" class="btn btn-danger" href=""  value="Delete">Yes</a>                       
                    <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>
</div>
<script type="text/javascript">
    var dataTable = $('table').dataTable();
    $('#select-category').on('change',function(){
            var selectedValue = $(this).val();
            dataTable.fnFilter("^"+selectedValue+"$", 4, true); //Exact value, column, reg
    });
</script>

<?php include 'includes/footer.php'; ?>
