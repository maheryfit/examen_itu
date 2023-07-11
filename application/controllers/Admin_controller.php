<?php
include("Session_controller.php");

class Admin_controller extends Session_controller {
    private $data;
    public function __construct() {
        parent::__construct();
        $this->data = array();
        
    }
    
    public function index() {
        $this->checkSession("admin", site_url("Admin_controller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "index";
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function login() {
        if ($this->input->get("error") != null) {
            $this->data["error"] = $this->input->get("error");
        }
        else {
            $this->data["error"] = null;
        }
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "login";
        $this->load->view("admin-page/template-front", $this->data);
    }


    

    public function log(){
        $this->load->model("Login_model");
        $email = $this->input->post("email");
        $motdepasse = $this->input->post("motdepasse");

        try {
            $rep = $this->Login_model->logAsAdmin($email,$motdepasse);
            if($rep == false){
                redirect(site_url("admin_controller/login?error=Vérifier votre email/mot de passe"));            
            } 
                
            $this->session->set_userdata("admin",$rep);
            redirect(site_url("admin_controller/index"));
        } catch (Exception $e) {
            echo "Erreur : ".$e->getMessage();
        }
        redirect(base_url("Admin_controller/index"));
    }

    public function creeregime() {
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "creationRegime";
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function listeregime() {
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "listeRegime";
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function aliment() {
        $this->checkSession("admin", site_url("Admin_controller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "aliment";
        $this->load->model("Categorie_regime");
        $this->data["categorie"] = $this->Categorie_regime->select();
        $this->load->model("Aliment");
        $this->data["prise"] = $this->Aliment->selectbyCat(1);
        $this->data["perte"] = $this->Aliment->selectbyCat(2);
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function activite() {
        $this->checkSession("admin", site_url("Admin_controller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "activite";
        $this->load->model("Categorie_regime");
        $this->data["categorie"] = $this->Categorie_regime->select();
        $this->load->model("Activite");
        $this->data["prise"] = $this->Activite->selectbyCat(1);
        $this->data["perte"] = $this->Activite->selectbyCat(2);
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function modif_activite(){
        $this->checkSession("admin", site_url("Admin_controller/login"));
        $this->load->model("Activite");
        $idactivite = $this->input->get("idactivite");

        $idcategorie = $this->input->post("idcategorie");
        $nom = $this->input->post("nom");

        $this->Activite->updateactivite($idactivite,$nom,$idcategorie);

        redirect(site_url("Admin_controller/activite"));
    }

    public function to_modif(){
        $this->load->model("Activite");
        $this->load->model("Categorie_regime");
        $idactivite = $this->input->get("idactivite");
        $idcat = $this->input->get("idcat");
        $this->data["title"] = "Modification Activite";
        $this->data["page"] = "modif_activite";
        $this->data["idactivite"] = $idactivite;
        $this->data["activite"] = $this->Activite->select_by_id($idactivite);
        $this->data["categorie"] = $this->Categorie_regime->select();
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function regime() {
        $this->checkSession("admin", site_url("Admin_controller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "regime";
        $this->load->model("Categorie_regime");
        $this->data["categorie"] = $this->Categorie_regime->select();
        $this->load->model("Aliment");
        $this->data["prise"] = $this->Aliment->selectbyCat(1);
        $this->data["perte"] = $this->Aliment->selectbyCat(2);
        $this->load->model("Activite");
        $this->data["aprise"] = $this->Activite->selectbyCat(1);
        $this->data["aperte"] = $this->Activite->selectbyCat(2);
        $this->load->model("Regime");
        $this->data["be"] = $this->Regime->select_by_cat(1);
        $this->data["kely"] = $this->Regime->select_by_cat(2);
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function insertaliment(){
        $this->load->model("Aliment");
        $nom = $this->input->post("nom");
        $id = $this->input->post("idcategorie");
        $rep = $this->Aliment->insertaliment($nom,$id);
        redirect(site_url("admin_controller/aliment"));              
    }

    public function insertperte(){
        $this->load->model("Regime");
        $idregime= $this->input->post("kely");
        $idaliment = $this->input->post("ali");
        $idactivite = $this->input->post("act");
        $rep = $this->Regime->insertalimentregime($idaliment,$idregime);
        $req = $this->Regime->insertactiviteregime($idactivite,$idregime);
        redirect(site_url("admin_controller/Regime"));              
    }

    public function insertprise(){
        $this->load->model("Regime");
        $idregime= $this->input->post("be");
        $idaliment = $this->input->post("ali");
        $idactivite = $this->input->post("act");
        $rep = $this->Regime->insertalimentregime($idaliment,$idregime);
        $req = $this->Regime->insertactiviteregime($idactivite,$idregime);
        redirect(site_url("admin_controller/Regime"));              
    }

    public function insertactivite(){
        $this->load->model("Activite");
        $nom = $this->input->post("nom");
        $id = $this->input->post("idcategorie");
        $rep = $this->Activite->insertactivite($nom,$id);
        redirect(site_url("admin_controller/activite"));              
    }

    public function insertregime(){
        $this->load->model("Regime");
        $id = $this->input->post("cat");
        $nom = $this->input->post("nom");
        $montant = $this->input->post("montant");
        $duree = $this->input->post("duree");
        $poids = $this->input->post("poids");

        $rep = $this->Regime->insertregime($id,$nom,$montant,$duree,$poids);
        redirect(site_url("admin_controller/Regime"));              
    }

}