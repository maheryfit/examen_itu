<?php
class Code_porte_monnaie extends CI_Model
{
    private $id_code_porte_monnaie;
    private $code;
    private $montant;
    private $etat;

    /**
     * @return mixed
     */
    public function get_etat()
    {
        return $this->etat;
    }

    /**
     * @return mixed
     */
    public function get_montant()
    {
        return $this->montant;
    }

    /**
     * @return mixed
     */
    public function get_code()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function set_code($code): void
    {
        $this->code = $code;
    }

    /**
     * @param mixed $etat
     */
    public function set_etat($etat): void
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function get_id_code_porte_monnaie()
    {
        return $this->id_code_porte_monnaie;
    }

    /**
     * @param mixed $id_code_porte_monnaie
     */
    public function set_id_code_porte_monnaie($id_code_porte_monnaie): void
    {
        $this->id_code_porte_monnaie = $id_code_porte_monnaie;
    }

    /**
     * @param mixed $montant
     */
    public function set_montant($montant): void
    {
        $this->montant = $montant;
    }

    /**
     * @throws Exception
     */
    public function insert($data)
    {
        $data = $this->escape_post($data);

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

    /**
     * @throws Exception
     */
    public function change_etat($id_code_porte_monnaie) {
        $data = [];
        $data["etat"] = 1;
        $this->db->where('idcodeportemonnaie', $id_code_porte_monnaie);
        $this->db->update('codeportemonnaie', $data);

        // Vérifie s'il y a une erreur lors de l'insertion
        if ($this->db->affected_rows() > 0) {
            return true; // Update réussie
        } else {
            throw new Exception("Erreur du changement d'état"); // Erreur lors de l'insertion
        }
    }
}