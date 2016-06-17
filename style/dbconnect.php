<?php
class dbConnect {
    public $DB_HOST='mysql1110.ixwebhosting.com';
    public $DB_USER='BBBmcmf_wct123';
    public $DB_PASSWORD='Wct_123';
    public $DB_DATABASE='BBBmcmf_wellocity';
    // public $DB_HOST='103.15.74.116';
    // public $DB_USER='atomicka_Etecusr';
    // public $DB_DATABASE='atomicka_Etecdb';
    // public $DB_PASSWORD='Atm^eTc!akd#';
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
