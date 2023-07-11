<?php
class PDO_Connector extends CI_Controller
{
    private $host = "localhost";
    private $dbname = 'regime';
    private $user = "root";
    private $pass = "root";
    private $dsn = "";
    //

    public function __construct()
    {
        $this->dsn = "mysql:host=$this->host;dbname=$this->dbname";
    }

     public function connect()
    {
        try {
            //code...
            $connexion = new PDO($this->dsn,$this->user,$this->pass);
            return $connexion;


        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}