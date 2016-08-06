<?php
include "includes/header.php";

$binding_type_array = array("soft_binding"=>"Soft Binding","spiral_binding"=>"Sprial Binding","wireo_binding"=>"Wireo Binding","comb_binding"=>"Comb Binding","handmade_binding"=>"Handmade Binding","case_binding"=>"Case Binding");

if (isset($_GET['delete']) && is_numeric($_GET['delete'])) 
{
    $val = $_GET['delete'];
    mysqlQuery("DELETE FROM `stork_cost_estimation_binding` WHERE `cost_estimation_binding_id`='$val'");
    $isDeleted = true;
    $deleteProduct = true;
}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All Binding cost Estimation</title>
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
                <span class="search-icon dropdowSCIcon" title="Search">
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
        <h3 class="acc-title lg clone_heading">Binding Cost estimation</h3>
<div class="amout_fixed_status">
        <span>Amount fixed status </span><select id="select-category" name="categories">
    <option value="">All</option>
    <option value="Fixed">Fixed</option>
    <option value="Not Fixed">Not Fixed</option>
</select>
</div>
        <div class="clear_both"> </div>
        </div>
        <div class="add_section">
            <a href="add_binding_cost_estimation.php"> <span> Add </span><span>[+]</span> </a>
        </div>
            <div class="form-edit-info">
                <table class="data-table binding_cost_table stork_admin_table" id="my-orders-table">
                    <thead>
                    <tr class="">
                        <th>Binding Type</th>
                        <th>Amount</th>                     
                        <th>Amount fixed Status</th> 
                        <th>Status</th> 
                        <th>Created Date</th>
                        <th class="table_action">Action</th>               
                    </tr>
                    </thead>
                    <?php 
                    foreach ($binding_type_array as $key=>$value) {
                        $binding_type_key = $key;
                        $binding_type_value = $value;
                    ?>
                    <tr class="">
                        <td><?php echo $binding_type_value ?></td>
                        <?php 
                            $estimated_cost = mysqlQuery("SELECT * FROM stork_cost_estimation_binding");
                            $rows_count = mysql_num_rows($estimated_cost);
                            if ($rows_count == 0){
                               echo "<td>-</td><td class='fixed_notfixed'>Not Fixed</td><td>-</td><td>-</td><td>-</td>"; 
                            }
                            else{
                                while ($cost_array = mysql_fetch_array($estimated_cost)) {   
                                    $createddate=strtotime($cost_array['create_date']);
                                    $date = date('d/m/Y', $createddate);
                                    if(trim($cost_array['cost_estimation_binding_type']) == trim($binding_type_key)){        
                                        $status = "<td>".$cost_array['cost_estimation_binding_amount']."</td><td class='fixed_notfixed'>Fixed</td><td>".($cost_array['cost_estimation_binding_status'] == 1?"Active":"Inactive")."</td><td>".$date."<td class='table_action th_hidden a-center last'>
                                                    <span class='nobr'>
                                                    <a title='Edit' class='btn btn-primary btn-xs' href='edit_cost_estimation_binding.php?id=".$cost_array['cost_estimation_binding_id']."'><i class='fa fa-pencil-square-o'></i></a>
                                                    <span class='separator'></span> 
                                                    <a class='btn btn-xs btn-danger delete' title='Delete' data-id=".$cost_array['cost_estimation_binding_id']." href='#myModal1' data-toggle='modal' id='delete'><i class='fa fa-trash-o'></i></a>
                                                    </span>
                                                    </td>";
                                        break;
                                    } 
                                    else{
                                        $status = "<td>-</td><td class='fixed_notfixed'>Not Fixed</td><td>-</td><td>-</td><td>-</td>";
                                    }
                                }
                                echo $status;
                            }    
                        ?>   
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
        $("#del_link").prop("href", "binding_cost_estimation_combination.php?delete="+myId);
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
        if($("#select-category").val()!=""){
            var selectedValue = $(this).val();
            dataTable.fnFilter("^"+selectedValue+"$", 2, true); //Exact value, column, reg 
        }
        else {
            dataTable.fnFilter( $('#select-category').val(),2);
        }
            
    });
</script>

<?php include 'includes/footer.php'; ?>
