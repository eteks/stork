<?php
require_once("settings.php");
class dbConnect {
    public $DB_HOST = HOSTNAME;
    public $DB_USER = DBUSER;
    public $DB_PASSWORD = DBPASSWORD;
    public $DB_DATABASE = DATABASE;
	public function connect() {
        $conn = mysqli_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASSWORD,$this->DB_DATABASE);
        //mysqli_select_db($this->DB_DATABASE, $conn);
        if(!$conn){
            die ("Cannot connect to the database");
        }
        else{
            // Code to insert default data on Printing Type Table
            $printing_type_plain_query = mysqli_query($conn, 'select * from stork_printing_type where printing_type="plain_printing"');
            if(mysqli_num_rows($printing_type_plain_query) == 0){
                mysqli_query($conn,"INSERT INTO `stork_printing_type` (`printing_type_id`, `printing_type`, `printing_type_status`, `created_date`) VALUES (NULL, 'plain_printing', '1', CURRENT_TIMESTAMP)");
                $printing_type_id = mysqli_insert_id($conn);
                // Code to insert default data on Paper Print Type Table
                mysqli_query($conn,"INSERT INTO `stork_paper_print_type` (`paper_print_type_id`, `paper_print_type`,`printing_type_id`,`paper_print_type_status`, `created_date`) VALUES (NULL, 'Color with Black & White','$printing_type_id','1', CURRENT_TIMESTAMP)");

            }   
            $printing_type_project_query = mysqli_query($conn, 'select * from stork_printing_type where printing_type="project_printing"');
            if(mysqli_num_rows($printing_type_plain_query) == 0){
                mysqli_query($conn,"INSERT INTO `stork_printing_type` (`printing_type_id`, `printing_type`, `printing_type_status`, `created_date`) VALUES (NULL, 'project_printing', '1', CURRENT_TIMESTAMP)");
                $printing_type_id = mysqli_insert_id($conn);
                // Code to insert default data on Paper Print Type Table
                mysqli_query($conn,"INSERT INTO `stork_paper_print_type` (`paper_print_type_id`, `paper_print_type`,`printing_type_id`,`paper_print_type_status`, `created_date`) VALUES (NULL, 'Color with Black & White','$printing_type_id','1', CURRENT_TIMESTAMP)");
                // Code to insert default data on Paper Side Table
                mysqli_query($conn,"INSERT INTO `stork_paper_side` (`paper_side_id`, `paper_side`,`printing_type_id`,`paper_side_status`, `created_date`) VALUES (NULL, 'Single Side','$printing_type_id','1', CURRENT_TIMESTAMP)");
            }   
            $printing_type_multi_query = mysqli_query($conn, 'select * from stork_printing_type where printing_type="multicolor_printing"');
            if(mysqli_num_rows($printing_type_plain_query) == 0){
                mysqli_query($conn,"INSERT INTO `stork_printing_type` (`printing_type_id`, `printing_type`, `printing_type_status`, `created_date`) VALUES (NULL, 'multicolor_printing', '1', CURRENT_TIMESTAMP)");
                $printing_type_id = mysqli_insert_id($conn);
                // Code to insert default data on Paper Print Type Table
                mysqli_query($conn,"INSERT INTO `stork_paper_print_type` (`paper_print_type_id`, `paper_print_type`,`printing_type_id`,`paper_print_type_status`, `created_date`) VALUES (NULL, 'Color with Black & White','$printing_type_id','1', CURRENT_TIMESTAMP)");
            }  
        }
        return $conn;
    }
    public function Close($conn){
        mysqli_close($conn);
    }
}
$db = new dbConnect();
$connection = $db->connect();
?>
