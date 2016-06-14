<?php
class dbConnect {
    public $DB_HOST='localhost';
    public $DB_USER='root';
    public $DB_PASSWORD='';
    public $DB_DATABASE='stork';
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
