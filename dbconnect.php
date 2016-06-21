<?php
require_once("settings.php");
class dbConnect {
    public $DB_HOST= HOSTNAME;
    public $DB_USER= DBUSER;
    public $DB_PASSWORD=DBPASSWORD;
    public $DB_DATABASE=DATABASE;
	function __construct() {
        $conn = mysql_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASSWORD);
        mysql_select_db($this->DB_DATABASE, $conn);
        if(!$conn){
            die ("Cannot connect to the database");
        }
        return $conn;
    }
    public function Close(){
        mysql_close();
    }
}
$db = new dbConnect();
?>
