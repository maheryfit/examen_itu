<?php
class Utilisateur extends CI_Model {
    /**
     * @param mixed $date_enregistrement
     * @throws Exception
     */
    public function checkDateEnregistrement($date_enregistrement)
    {
        $today = date('Y-m-d'); // Obtient la date actuelle au format 'YYYY-MM-DD'
        $date_enregistrement = date('Y-m-d', strtotime($date_enregistrement)); // Convertit la date de naissance en format 'YYYY-MM-DD'

        // Vérifie si la date de naissance est valide
        if (strtotime($date_enregistrement) === false) {
            throw new Exception("La date d'enregistrement est invalide"); //
        }

        // Vérifie si la date de naissance est antérieure à la date actuelle
        if ($date_enregistrement < $today) {
            throw new Exception("La date d'enregistrement doit être futur"); //
        }
        return $date_enregistrement;
    }

    /**
     * @throws Exception
     */
    public function checkDateNaissance($dateNaissance){
        $today = date('Y-m-d'); // Obtient la date actuelle au format 'YYYY-MM-DD'
        $dateNaissance = date('Y-m-d', strtotime($dateNaissance)); // Convertit la date de naissance en format 'YYYY-MM-DD'

        // Vérifie si la date de naissance est valide
        if (strtotime($dateNaissance) === false) {
            throw new Exception("La date de naissance est invalide"); //
        }

        // Vérifie si la date de naissance est antérieure à la date actuelle
        if ($dateNaissance > $today) {
            throw new Exception("La date de naissance est future (non valide)"); //
        }
        return $dateNaissance;
    }


    /**
     * @param mixed $mot_de_passe
     * @throws Exception
     */
    public function checkMotDePasse($mot_de_passe)
    {
        if (strlen($mot_de_passe) < 5) {
            throw new Exception("Votre mot de passe est trop court, le mot de passe doit être supérieur à 5 caractères");
        }
        return $mot_de_passe;
    }

    /**
     * @throws Exception
     */
    public function insertUtilisateur($data){
        $data = $this->escape_post($data);
        $data["datenaissance"] = $this->checkDateNaissance($data["datenaissance"]);
        $data["dateenregistrement"] = $this->checkDateEnregistrement($data["dateenregistrement"]);
        $data["motdepasse"] = $this->checkMotDePasse($data["motdepasse"]);

        // Effectue l'insertion dans la table "utilisateurs"
        $this->db->insert('Utilisateur', $data);

        // Récupère l'ID de l'utilisateur inséré
        $lastInsertedId = $this->db->insert_id();

        // Vérifie s'il y a une erreur lors de l'insertion
        if ($lastInsertedId) {
            return $lastInsertedId;
        } else {
            throw new Exception("Erreur de l'insertion d'utilisateur"); // Erreur lors de l'insertion
        }
    }

    function escape_post($data) {
        foreach ($data as $key => $item) {
            $data[$key] = $this->db->escape(trim($item));
        }
        return $data;
    }

    /**
     * @throws Exception
     */
    public function checkLogin($data) {
        $data = $this->escape_post($data);
        $data["motdepasse"] = $this->checkMotDePasse($data["motdepasse"]);
        $this->db->select('*');
        $this->db->where('motdepasse',$data["motdepasse"]);
        $this->db->where('email',  $data["email"]);
        $this->db->from('Utilisateur');

        $query = $this->db->get();

        // Vérifie si l'utilisateur existe et si le mot de passe correspond
        if ($query != null) {
            return $query->row();
        }
        throw new Exception("Revérifier votre adresse email et votre mot de passe"); // L'utilisateur n'existe pas
    }

    public  function  log($email,$password){
        //create connection
        $connector = new Pdoconnector();
        $connection = $connector->connect();

        $user = Daomodel::selectAll($connection,"regime"," email='$email' and motdepasse = '$password' ");

        if (count($user) != 0) return $user[0];

        $connection = null;
        return false;
    }

    public function select() {
        $this->db->select('*');
        $this->db->from('Utilisateur');
        return $this->db->get();
    }

    public function select_by_id($id)
    {
        $this->db->select('*');
        $this->db->where('idutilisateur', $id);
        $this->db->from('Utilisateur');
        $user = $this->db->get();
        return $user->row();
    }

}