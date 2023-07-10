<?php

class Profil extends CI_Model
{
    private $id_profil;
    private $id_utilisateur;
    private $poids;
    private $taille;
    private $date_profil;


    /**
     * @return mixed
     */
    public function get_id_profil()
    {
        return $this->id_profil;
    }

    /**
     * @param mixed $id_profil
     */
    public function set_id_profil($id_profil)
    {
        $this->id_profil = $id_profil;
    }

    /**
     * @return mixed
     */
    public function get_date_profil()
    {
        return $this->date_profil;
    }

    /**
     * @param mixed $date_profil
     */
    public function set_date_profil($date_profil)
    {
        $this->date_profil = $date_profil;
    }

    /**
     * @return mixed
     */
    public function get_poids()
    {
        return $this->poids;
    }

    /**
     * @param mixed $poids
     */
    public function set_poids($poids): void
    {
        $this->poids = $poids;
    }

    /**
     * @return mixed
     */
    public function get_taille()
    {
        return $this->taille;
    }

    /**
     * @throws Exception
     */
    public function check_taille($string) {
        $intVal = (int)$string;
        if ($intVal < 0)
            throw new Exception("La taille est invalide"); //
        return $intVal;
    }

    /**
     * @param mixed $taille
     */
    public function set_taille($taille)
    {
        $this->taille = $taille;
    }


    /**
     * @return mixed
     */
    public function get_id_utilisateur()
    {
        return $this->id_utilisateur;
    }

    /**
     * @param mixed $id_utilisateur
     */
    public function set_id_utilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;
    }

    public function get_utilisateur()
    {
        $this->load->model('Utilisateur');
        return $this->Utilisateur->select_by_id($this->get_id_utilisateur());
    }

    /**
     * @throws Exception
     */
    public function checkDateProfil($date_enregistrement)
    {
        $today = date('Y-m-d'); // Obtient la date actuelle au format 'YYYY-MM-DD'
        $date_enregistrement = date('Y-m-d', strtotime($date_enregistrement)); // Convertit la date de naissance en format 'YYYY-MM-DD'

        // Vérifie si la date de naissance est valide
        if (strtotime($date_enregistrement) === false) {
            throw new Exception("La date de profil est invalide"); //
        }

        // Vérifie si la date de naissance est antérieure à la date actuelle
        if ($date_enregistrement < $today) {
            throw new Exception("La date de profil doit être futur"); //
        }
        return $date_enregistrement;
    }

    public function insert($data) {
        $data = $this->escape_post($data);
        $data["dateprofil"] = $this->checkDateProfil($data["dateprofil"]);
        $data["taille"] = $this->check_taille($data["taille"]);

        // Effectue l'insertion dans la table "utilisateurs"
        $this->db->insert('profil', $data);

        // Vérifie s'il y a une erreur lors de l'insertion
        if ($this->db->affected_rows() > 0) {
            return true; // Insertion réussie
        } else {
            throw new Exception("Erreur dans l'insertion de profil"); // Erreur lors de l'insertion
        }
    }

    function escape_post($data) {
        foreach ($data as $key => $item) {
            $data[$key] = $this->db->escape(trim($item));
        }
        return $data;
    }

}