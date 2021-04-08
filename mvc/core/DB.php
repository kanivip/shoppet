<?php

class DB{

    public $con;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "shoppet";
    protected $port = "3306";

    function __construct(){
        $this->con = mysqli_connect($this->servername, $this->username, $this->password,$this->dbname,$this->port);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }

}

?>