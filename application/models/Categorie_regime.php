<?php

class Categorie_regime extends CI_Model
{
    private $id_categorie_regime;
    private $nom;

    /**
     * @return mixed
     */
    public function get_nom()
    {
        return $this->nom;
    }

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
    public function get_id_categorie_regime()
    {
        return $this->id_categorie_regime;
    }

    /**
     * @param mixed $id_categorie_regime
     */
    public function set_id_categorie_regime($id_categorie_regime)
    {
        $this->id_categorie_regime = $id_categorie_regime;
    }

    public function select()
    {
        $tab_retour = [];
        $this->db->select('*');
        $this->db->from("categorieregime");
        $query = $this->db->get();

        $results = $query->result_array();
        foreach ($results as $result) {
            $categorie = new Categorie_regime();
            $categorie->set_nom($result["nom"]);
            $categorie->set_id_categorie_regime($result["idcategorieregime"]);
            $tab_retour[] = $categorie;
        }
        return $tab_retour;
    }

    public function select_by_id($id) {
        $this->db->select('*');
        $this->db->where("idcategorieregime", $id);
        $this->db->from("categorieregime");
        $query = $this->db->get();
        $query =$query->row_array();
        $categorie = new Categorie_regime();
        $categorie->set_nom($query["nom"]);
        $categorie->set_id_categorie_regime($query["idcategorieregime"]);
        return $categorie;
    }
}