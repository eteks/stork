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
        return $conn;
    }
    public function Close($conn){
        mysqli_close($conn);
    }
}
$db = new dbConnect();
$connection = $db->connect();
?>
