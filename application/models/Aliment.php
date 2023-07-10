<?php

class Aliment extends CI_Model
{
    private $id_aliment;
    private $nom;
    private $id_categorie_regime;

    /**
     * @param mixed $nom
     */
    public function set_nom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function get_nom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function get_id_aliment()
    {
        return $this->id_aliment;
    }

    /**
     * @param $id_aliment
     */
    public function set_id_aliment($id_aliment)
    {
        $this->id_aliment = $id_aliment;
    }

    /**
     * @return mixed
     */
    public function get_id_categorie_regime()
    {
        return $this->id_categorie_regime;
    }

    public function get_categorie_regime()
    {
        $this->load->model('Categorie_regime');
        return $this->Categorie_regime->select_by_id($this->get_id_categorie_regime());
    }

    /**
     * @param mixed $id_categorie_regime
     */
    public function set_id_categorie_regime($id_categorie_regime): void
    {
        $this->id_categorie_regime = $id_categorie_regime;
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
        $id = $data["idaliment"];
        $data = array(
            'nom' => $data["nom"],
            'idcategorieregime' => $data["idcategorieregime"]
        );

        $this->db->where('idaliment', $id);
        $this->db->update('aliment', $data);

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
        $this->db->where('idaliment', $id);
        $this->db->delete('aliment');
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
        $this->db->where("idaliment", $id);
        $this->db->from("aliment");
        $query = $this->db->get();
        $query = $query->row();
        $aliment = new Aliment();
        $aliment->set_nom($query["nom"]);
        $aliment->set_id_aliment($query["idaliment"]);
        $aliment->set_id_categorie_regime($query["idcategorieregime"]);
        return $aliment;
    }

    public function select() {
        $tab_retour = [];
        $this->db->select('*');
        $this->db->from("aliment");
        $query = $this->db->get();

        $results = $query->result_array();
        foreach ($results as $result) {
            $aliment = new Aliment();
            $aliment->set_id_aliment($result["idaliment"]);
            $aliment->set_nom($result["nom"]);
            $aliment->set_id_categorie_regime($result["idcategorieregime"]);
            $tab_retour[] = $aliment;
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