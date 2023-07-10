<?php

class Activite extends CI_Model {
    private $idActivite;

    /**
     * @throws Exception
     */
    public function insertActivite($data)
    {
        $data = $this->escape_post($data);
        // Effectue l'insertion dans la table "utilisateurs"
        $this->db->insert('activite', $data);

        // Vérifie s'il y a une erreur lors de l'insertion
        if ($this->db->affected_rows() > 0) {
            return true; // Insertion réussie
        } else {
            throw new Exception("Erreur de l'insertion d'activité"); // Erreur lors de l'insertion
        }
    }

    public function updateActivite($data){
        $id = $data["idActivite"];
        $data = array(
            'nom' => $data["nom"],
            'idCategorieRegime' => $data["idCategorieRegime"]
        );

        $this->db->where('idActivite', $id);
        $this->db->update('activite', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            // Aucune ligne n'a été affectée, la mise à jour a échoué ou n'a pas été nécessaire
            echo "La mise à jour a échoué ou aucune ligne n'a été affectée.";
        }
    }

    function escape_post($data) {
        foreach ($data as $key => $item) {
            $data[$key] = $this->db->escape(trim($item));
        }
        return $data;
    }

}