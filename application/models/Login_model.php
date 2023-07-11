<?php

class Login_model extends  CI_Model{

    public function __construct()
    {
        $this->load->model("PDO_Connector");
        $this->load->model("DAO_model");
    }

    public  function  logAsAdmin($email,$password){
        //create connection
        $connector = new PDO_Connector();
        $connection = $connector->connect();


        $user = DAO_model::selectAll($connection,"utilisateur"," email='$email' and motdepasse = '$password' and isAdmin = 1 ");

        if (count($user) != 0) return $user[0];

        $connection = null;
        return false;
    }
    public  function  log($email,$password){
        //create connection
        $connector = new PDO_Connector();
        $connection = $connector->connect();

        if($email==null || $password==null){
            return false;
        }

        $user = DAO_model::selectAll($connection,"utilisateur"," email='$email' and motdepasse = '$password' ");

        if (count($user) != 0) return $user[0];

        $connection = null;
        return false;
    }

    public function insertuser($nom,$prenom,$datenaissance,$idgenre,$email,$password)
    {
        $connector = new PDO_Connector();
        $connection = $connector->connect();

        DAO_model::insert($connection,"utilisateur (idUtilisateur,nom,prenom,datenaissance,dateenregistrement,idgenre,email,motdepasse,isAdmin)","default,'$nom','$prenom','$datenaissance',NOW(),$idgenre,'$email','$password',0");

        $connection = null;
    }
}