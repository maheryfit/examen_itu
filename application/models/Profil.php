<?php

class Profil extends CI_Model
{
    private $id_profil;
    private $id_utilisateur;
    private $poids;
    private $taille;
    private $poidsobjectif;
    private $date_profil;


    /**
     * @return mixed
     */
    public function get_poids_objectif()
    {
        return $this->poidsobjectif;
    }

    /**
     * @param mixed $poidsobjectif
     */
    public function set_poids_objectif($poidsobjectif)
    {
        $this->poidsobjectif = $poidsobjectif;
    }
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
        echo $date_enregistrement;
        $today = date('Y-m-d'); // Obtient la date actuelle au format 'YYYY-MM-DD'
        $date_enregistrement = date('Y-m-d', strtotime(trim(str_replace($date_enregistrement, "'", " ")))); // Convertit la date de naissance en format 'YYYY-MM-DD'
        if (strtotime($date_enregistrement) === false) {
            throw new Exception("La date de profil est invalide"); //
        }
        if ($date_enregistrement < $today) {
            throw new Exception("La date de profil doit être futur"); //
        }
        return $date_enregistrement;
    }

    /**
     * @throws Exception
     */
    public function insert($data) {
        // Effectue l'insertion dans la table "utilisateurs"
        $this->db->insert('Profil', $data);

        // Récupère l'ID de l'utilisateur inséré
        $lastInsertedId = $this->db->insert_id();
        // Vérifie s'il y a une erreur lors de l'insertion
        if ($lastInsertedId) {
            return $lastInsertedId; // Insertion réussie
        } else {
            throw new Exception("Erreur dans l'insertion de profil"); // Erreur lors de l'insertion
        }
    }

    public function get_suggestion($data){
        $dataForProfil = array();
        foreach ($data as $key => $item) {
            if ($key != "idcategorieregime") {
                $dataForProfil[$key] = $item;
            }
        }
        $this->load->model("Regime");
        $this->load->model("Suggestion");
        $id_profil = $this->insert($dataForProfil);

        $categorieregime = $data["idcategorieregime"];
        $poidsobjectif = $data["poidsobjectif"];
        if ($categorieregime == 1) {
            $regime = $this->Regime->select_by_categorie_grand($categorieregime, $poidsobjectif);
        } else {
            $regime = $this->Regime->select_by_categorie_petit($categorieregime, $poidsobjectif);
        }
        $dt = array();
        $dt["idregime"] = $regime->get_id_regime();
        $dt["idprofil"] = $id_profil;
        $dt["estpaye"] = 0;
        $dt["datesuggestion"] = $data["dateprofil"];
        $id_suggestion = $this->Suggestion->insert($dt);
        $sugs = new Suggestion();
        $sugs->set_date_suggestion($dt["datesuggestion"]);
        $sugs->set_id_suggestion($id_suggestion);
        $sugs->set_est_paye($dt["estpaye"]);
        $sugs->set_id_profil($id_profil);
        $sugs->set_id_regime( $dt["idregime"]);
        return $sugs;
    }

    function escape_post($data) {
        foreach ($data as $key => $item) {
            $data[$key] = $this->db->escape(trim($item));
        }
        return $data;
    }

}