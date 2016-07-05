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
            // Code to insert default data on Paper Print Type Table
            $print_type_query = mysqli_query($conn, 'select * from stork_paper_print_type where paper_print_type="Color with Black & White"');
            if(mysqli_num_rows($print_type_query) == 0){
                mysqli_query($conn,"INSERT INTO stork_paper_print_type (paper_print_type, 
                    paper_print_type_status) VALUES ('Color with Black & White',1)");
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
