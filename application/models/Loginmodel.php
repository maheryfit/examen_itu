<?php

class Loginmodel extends  CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Pdoconnector");
        $this->load->model("Daomodel");
    }

    public  function  logasadmin($email,$password){
        //create connection
        $connector = new Pdoconnector();
        $connection = $connector->connect();


        $user = Daomodel::selectall($connection,"Utilisateur"," email='$email' and motdepasse = '$password' and isadmin = 1 ");

        if (count($user) != 0) return $user[0];

        $connection = null;
        return false;
    }
    public  function log($email,$password){
        //create connection
        $connector = new Pdoconnector();
        $connection = $connector->connect();

        if($email==null || $password==null){
            return false;
        }

        $user = Daomodel::selectall($connection,"Utilisateur"," email='$email' and motdepasse = '$password' ");

        if (count($user) != 0) return $user[0];

        $connection = null;
        return false;
    }

    public function insertuser($nom,$prenom,$datenaissance,$idgenre,$email,$password)
    {
        $connector = new Pdoconnector();
        $connection = $connector->connect();

        Daomodel::insert($connection,"Utilisateur (idutilisateur,nom,prenom,datenaissance,dateenregistrement,idgenre,email,motdepasse,isAdmin)","default,'$nom','$prenom','$datenaissance',NOW(),$idgenre,'$email','$password',0");

        $connection = null;
    }
}