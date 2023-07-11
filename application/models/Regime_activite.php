<?php

class Regime_activite extends CI_Model
{
    private $id_regime_activite;
    private $id_activite;
    private $id_regime;

    public function get_id_regime_activite(){
        return $this->id_regime_activite;
    }

    public function get_id_activite(){
        return $this->id_activite;
    }

    public function get_id_regime(){
        return $this->id_regime;
    }

    public function set_id_regime_activite($id_regime_activite){
        $this->id_regime_activite = $id_regime_activite;
    }

    public function set_id_activite($id_activite){
        $this->id_activite = $id_activite;
    }

    public function set_id_regime($id_regime){
        $this->id_regime = $id_regime;
    }

    public function get_activite(){
        $this->load->model('Activite');
        return $this->Activite->select_by_id($this->get_id_activite());
    }

    public function get_regime(){
        $this->load->model('Regime');
        return $this->Regime->select_by_id($this->get_id_regime());
    }

    /**
     * @throws Exception
     */
    public function insert($data)
    {
        $data = $this->escape_post($data);
        // Effectue l'insertion dans la table "utilisateurs"
        $this->db->insert('aliment', $data);

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
        $id = $data["idregimealiment"];
        $data = array(
            'idaliment' => $data["idaliment"],
            'idregime' => $data["idregime"]
        );

        $this->db->where('idregimealiment', $id);
        $this->db->update('regime', $data);

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
        $this->db->where('idregimealiment', $id);
        $this->db->delete('regime');
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
        $this->db->where("idregimealiment", $id);
        $this->db->from("regimealiment");
        $query = $this->db->get();
        $query = $query->row_array();
        $regime_aliment = new Regime_aliment();
        $regime_aliment->set_id_regime_aliment($query["idregimealiment"]);
        $regime_aliment->set_id_aliment($query["idaliment"]);
        $regime_aliment->set_id_regime($query["idregime"]);
        return $regime_aliment;
    }

    public function select() {
        $tab_retour = [];
        $this->db->select('*');
        $this->db->from("regime");
        $query = $this->db->get();

        $results = $query->result_array();
        foreach ($results as $result) {
            $regime_aliment = new Regime_aliment();
            $regime_aliment->set_id_regime_aliment($result["idregimealiment"]);
            $regime_aliment->set_id_aliment($result["idaliment"]);
            $regime_aliment->set_id_regime($result["idregime"]);
            $tab_retour[] = $regime_aliment;
        }
        return $tab_retour;
    }

    public function select_by_id_regime($idregime){
        $tab_retour = [];
        $this->db->select('*');
        $this->db->where("idregime",$idregime);
        $this->db->from("regime");
        $query = $this->db->get();

        $results = $query->result_array();
        foreach ($results as $result) {
            $regime_aliment = new Regime_aliment();
            $regime_aliment->set_id_regime_aliment($result["idregimealiment"]);
            $regime_aliment->set_id_aliment($result["idaliment"]);
            $regime_aliment->set_id_regime($result["idregime"]);
            $tab_retour[] = $regime_aliment;
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