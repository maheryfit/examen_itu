<?php


class Regime extends CI_Model
{
    private $id_regime;
    private $id_categorie_regime;
    private $nom_regime;
    private $montant;
    private $duree;
    private $poids;

    public function get_nom_regime() {
        return $this->nom_regime;
    }

    public function set_nom_regime($nom_regime) {
        $this->nom_regime = $nom_regime;
    }
    public function get_id_regime(){
        return $this->id_regime;
    }

    public function get_id_categorie_regime(){
        return $this->id_categorie_regime;
    }

    public function get_montant(){
        return $this->montant;
    }

    public function get_duree(){
        return $this->duree;
    }

    public function get_poids(){
        return $this->poids;
    }

    public function set_id_regime($id_regime){
        $this->id_regime = $id_regime;
    }

    public function set_id_categorie_regime($id_categorie_regime){
        $this->id_categorie_regime = $id_categorie_regime;
    }

    public function set_montant($montant){
        $this->montant = $montant;
    }

    public function set_duree($duree){
        $this->duree = $duree;
    }

    public function set_poids($poids){
        $this->poids = $poids;
    }

    public function get_categorie_regime(){
        $this->load->model('Categorie_regime');
        return $this->Categorie_regime->select_by_id($this->get_id_categorie_regime());
    }

    public function get_utilisateur(){
        $this->load->model('Utilisateur');
        return $this->Utilisateur->select_by_id($this->get_id_categorie_regime());
    }


    /**
     * @throws Exception
     */
    public function insert($data)
    {
        $data = $this->escape_post($data);
        // Effectue l'insertion dans la table "utilisateurs"
        $this->db->insert('regime', $data);

        // Récupère l'ID de l'utilisateur inséré
        $lastInsertedId = $this->db->insert_id();

        // Vérifie s'il y a une erreur lors de l'insertion
        if ($lastInsertedId) {
            return $lastInsertedId; // Insertion réussie
        } else {
            throw new Exception("Erreur de l'insertion de régime"); // Erreur lors de l'insertion
        }
    }

    /**
     * @throws Exception
     */
    public function update($data){
        $data = $this->escape_post($data);
        $id = $data["idregime"];
        $data = array(
            'idcategorieregime' => $data["idcategorieregime"],
            'montant' => $data["montant"],
            'duree' => $data["duree"],
            'poids' => $data["poids"]
        );

        $this->db->where('idregime', $id);
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
        $this->db->where('idregime', $id);
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
        $this->db->where("idregime", $id);
        $this->db->from("regime");
        $query = $this->db->get();
        $query =$query->row_array();
        $regime = new Regime();
        $regime->set_id_regime($query["idregime"]);
        $regime->set_id_categorie_regime($query["idcategorieregime"]);
        $regime->set_montant($query["montant"]);
        $regime->set_duree($query["duree"]);
        $regime->set_nom_regime($query["nomregime"]);
        $regime->set_poids($query["poids"]);
        return $regime;
    }

    public function select() {
        $tab_retour = [];
        $this->db->select('*');
        $this->db->from("regime");
        $query = $this->db->get();

        $results = $query->result_array();
        foreach ($results as $result) {
            $regime = new Regime();
            $regime->set_id_regime($result["idregime"]);
            $regime->set_id_categorie_regime($result["idcategorieregime"]);
            $regime->set_montant($result["montant"]);
            $regime->set_nom_regime($result["nomregime"]);
            $regime->set_duree($result["duree"]);
            $regime->set_poids($result["poids"]);
            $tab_retour[] = $regime;
        }
        return $tab_retour;
    }

    public function select_by_categorie_petit($id_categorie, $poids) {
        $tab_retour = [];
        $this->db->select('*');
        $this->db->from("regime");
        $this->db->where("idcategorieregime", $id_categorie);
        $this->db->where("idcategorieregime >=", $id_categorie);
        $this->db->order_by('poids', 'desc');
        $query = $this->db->get();

        $results = $query->result_array();
        foreach ($results as $result) {
            $regime = new Regime();
            $regime->set_id_regime($result["idregime"]);
            $regime->set_id_categorie_regime($result["idcategorieregime"]);
            $regime->set_montant($result["montant"]);
            $regime->set_nom_regime($result["nomregime"]);
            $regime->set_duree($result["duree"]);
            $regime->set_poids($result["poids"]);
            $tab_retour[] = $regime;
        }
        return $tab_retour[0];
    }

    public function select_by_categorie_grand($id_categorie, $poids) {
        $tab_retour = [];
        $this->db->select('*');
        $this->db->from("regime");
        $this->db->where("idcategorieregime", $id_categorie);
        $this->db->where("idcategorieregime <=", $id_categorie);
        $this->db->order_by('poids', 'asc');
        $query = $this->db->get();

        $results = $query->result_array();
        foreach ($results as $result) {
            $regime = new Regime();
            $regime->set_id_regime($result["idregime"]);
            $regime->set_id_categorie_regime($result["idcategorieregime"]);
            $regime->set_montant($result["montant"]);
            $regime->set_nom_regime($result["nomregime"]);
            $regime->set_duree($result["duree"]);
            $regime->set_poids($result["poids"]);
            $tab_retour[] = $regime;
        }
        return $tab_retour[0];
    }

    function escape_post($data) {
        foreach ($data as $key => $item) {
            $data[$key] = $this->db->escape(trim($item));
        }
        return $data;
    }

   // public function historique_validation_code_porte_monnaie()

}