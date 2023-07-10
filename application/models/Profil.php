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
}