<?php

class Suggestion extends CI_Model
{
    private $id_suggestion;
    private $id_regime;
    private $id_profil;
    private $est_paye;

    public function get_id_suggestion(){
        return $this->id_suggestion;
    }


    public function get_id_regime(){
        return $this->id_regime;
    }

    public function get_id_profil(){
        return $this->id_profil;
    }
    public function get_est_paye(){
        return $this->est_paye;
    }

    public function set_id_suggestion($id_suggestion){
        $this->id_suggestion = $id_suggestion;
    }

    public function set_id_regime($id_regime){
        $this->id_regime = $id_regime;
    }

    public function set_id_profil($id_profil){
        $this->id_regime = $id_profil;
    }

    public function set_est_paye($est_paye){
        $this->est_paye = $est_paye;
    }

    public function get_regime(){
        $this->load->model('Regime');
        return $this->Regime->select_by_id($this->get_id_regime());
    }

    public function get_profil(){
        $this->load->model('Profil');
        return $this->Profil->select_by_id($this->get_id_profil());
    }

    /**
     * @throws Exception
     */
    public function insert($data)
    {
        $data = $this->escape_post($data);
        // Effectue l'insertion dans la table "utilisateurs"
        $this->db->insert('suggestion', $data);

        // Vérifie s'il y a une erreur lors de l'insertion
        if ($this->db->affected_rows() > 0) {
            return true; // Insertion réussie
        } else {
            throw new Exception("Erreur de l'insertion d'aliment"); // Erreur lors de l'insertion
        }
    }

    /**
     * @throws Exception
     */
    public function update($data){
        $data = $this->escape_post($data);
        $id = $data["idsuggestion"];
        $data = array(
            'idregime' => $data["idregime"],
            'idprofil' => $data["idprofil"],
            'estpaye' => $data["estpaye"]
        );

        $this->db->where('idsuggestion', $id);
        $this->db->update('suggestion', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            // Aucune ligne n'a été affectée, la mise à jour a échoué ou n'a pas été nécessaire
            throw new Exception("Erreur dans la modification d'aliment"); // Erreur lors de
        }
    }

    /**
     * @throws Exception
     */
    public function delete($id) {
        $this->db->where('idsuggestion', $id);
        $this->db->delete('suggestion');
        if ($this->db->affected_rows() > 0) {
            // La suppression a réussi
            return true;
        } else {
            // Aucune ligne n'a été affectée, la suppression a échoué ou n'a pas été nécessaire
            throw new Exception("Erreur dans la suppression d'activité"); // Erreur lors de
        }
    }

    public function select_by_id($id) {
        $this->db->select('*');
        $this->db->where("idsuggestion", $id);
        $this->db->from("suggestion");
        $query = $this->db->get();
        $query = $query->row();
        $suggestion = new Suggestion();
        $suggestion->set_id_suggestion($query["idsuggestion"]);
        $suggestion->set_id_regime($query["idregime"]);
        $suggestion->set_id_profil($query["idprofil"]);
        $suggestion->set_est_paye($query["estpaye"]);
        return $suggestion;
    }

    public function select() {
        $tab_retour = [];
        $this->db->select('*');
        $this->db->from("regime");
        $query = $this->db->get();

        $results = $query->result_array();
        foreach ($results as $result) {
            $suggestion = new Suggestion();
            $suggestion->set_id_suggestion($result["idsuggestion"]);
            $suggestion->set_id_regime($result["idregime"]);
            $suggestion->set_id_profil($result["idprofil"]);
            $suggestion->set_est_paye($result["estpaye"]);
            $tab_retour[] = $suggestion;
        }
        return $tab_retour;
    }

    function escape_post($data) {
        foreach ($data as $key => $item) {
            $data[$key] = $this->db->escape(trim($item));
        }
        return $data;
    }


}