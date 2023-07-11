<?php
include("Sessioncontroller.php");

class Admincontroller extends Sessioncontroller {
    private $data;
    public function __construct() {
        parent::__construct();
        $this->data = array();
        
    }
    
    public function index() {
        $this->checksession("admin", site_url("Admincontroller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "index";
        $this->data["session"] = $this->session->admin;
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
        $this->load->model("Loginmodel");
        $email = $this->input->post("email");
        $motdepasse = $this->input->post("motdepasse");

        try {
            $rep = $this->Loginmodel->logAsAdmin($email,$motdepasse);
            if($rep == false){
                redirect(site_url("admincontroller/login?error=Vérifier votre email/mot de passe"));
            } 
                
            $this->session->set_userdata("admin",$rep);
            redirect(site_url("admincontroller/index"));
        } catch (Exception $e) {
            echo "Erreur : ".$e->getMessage();
        }
        redirect(base_url("admincontroller/index"));
    }

    public function creeregime() {
        $this->checksession("admin", site_url("Admincontroller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "creationRegime";
        $this->data["session"] = $this->session->admin;

        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function listeregime() {
        $this->checksession("admin", site_url("Admincontroller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "listeregime";
        $this->data["session"] = $this->session->admin;

        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function aliment() {
        $this->checksession("admin", site_url("admincontroller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "aliment";
        $this->load->model("Categorieregime");
        $this->data["categorie"] = $this->Categorieregime->select();
        $this->load->model("Aliment");
        $this->data["prise"] = $this->Aliment->selectbyCat(1);
        $this->data["perte"] = $this->Aliment->selectbyCat(2);
        $this->data["session"] = $this->session->admin;
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function activite() {
        $this->checksession("admin", site_url("admincontroller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "activite";
        $this->load->model("Categorieregime");
        $this->data["categorie"] = $this->Categorieregime->select();
        $this->load->model("Activite");
        $this->data["prise"] = $this->Activite->selectbyCat(1);
        $this->data["perte"] = $this->Activite->selectbyCat(2);
        $this->data["session"] = $this->session->admin;
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function modifactivite(){
        $this->checksession("admin", site_url("Admincontroller/login"));
        $this->load->model("Activite");
        $idactivite = $this->input->get("idactivite");

        $idcategorie = $this->input->post("idcategorie");
        $nom = $this->input->post("nom");

        $this->Activite->updateactivite($idactivite,$nom,$idcategorie);
        $this->data["session"] = $this->session->admin;
        redirect(site_url("admincontroller/activite"));
    }

    public function tomodifactivite(){
        $this->checksession("admin", site_url("Admincontroller/login"));
        $this->load->model("Activite");
        $this->load->model("Categorieregime");
        $idactivite = $this->input->get("idactivite");
        $idcat = $this->input->get("idcat");
        $this->data["title"] = "Modification Activite";
        $this->data["page"] = "modifactivite";
        $this->data["idactivite"] = $idactivite;
        $this->data["activite"] = $this->Activite->select_by_id($idactivite);
        $this->data["categorie"] = $this->Categorie_regime->select();
        $this->data["session"] = $this->session->admin;
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function deleteactivite(){
        $this->checksession("admin", site_url("Admincontroller/login"));
        $this->load->model("Activite");
        $idactivite = $this->input->get("idactivite");
        $this->Activite->deleteactivite($idactivite);
        $this->data["session"] = $this->session->admin;

        redirect(site_url("admincontroller/activite"));
    }

    public function deletealiment(){
        $this->checksession("admin", site_url("Admincontroller/login"));
        $this->load->model("Aliment");
        $idaliment = $this->input->get("idaliment");
        $this->Aliment->deletealiment($idaliment);
        $this->data["session"] = $this->session->admin;

        redirect(site_url("admincontroller/aliment"));
    }


    public function modifaliment(){
        $this->checksession("admin", site_url("Admincontroller/login"));
        $this->checksession("admin", site_url("Admincontroller/login"));
        $this->load->model("Aliment");
        $idaliment= $this->input->get("idaliment");

        $idcategorie = $this->input->post("idcategorie");
        $nom = $this->input->post("nom");

        $this->Aliment->updatealiment($idaliment,$nom,$idcategorie);
        $this->data["session"] = $this->session->admin;
        redirect(site_url("admincontroller/aliment"));
    }

    public function tomodifaliment(){
        $this->checksession("admin", site_url("Admincontroller/login"));
        $this->load->model("Aliment");
        $this->load->model("Categorieregime");
        $idaliment= $this->input->get("idaliment");
        $idcat = $this->input->get("idcat");
        $this->data["title"] = "Modification aliment";
        $this->data["page"] = "modifaliment";
        $this->data["idaliment"] = $idaliment;
        $this->data["aliment"] = $this->Aliment->select_by_id($idaliment);
        $this->data["categorie"] = $this->Categorie_regime->select();
        $this->data["session"] = $this->session->admin;
        $this->load->view("admin-page/template-admin", $this->data);
    }


    public function regime() {
        $this->checksession("admin", site_url("Admincontroller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "regime";
        $this->load->model("Categorieregime");
        $this->data["categorie"] = $this->Categorieregime->select();
        $this->load->model("Aliment");
        $this->data["prise"] = $this->Aliment->selectbyCat(1);
        $this->data["perte"] = $this->Aliment->selectbyCat(2);
        $this->load->model("Activite");
        $this->data["aprise"] = $this->Activite->selectbyCat(1);
        $this->data["aperte"] = $this->Activite->selectbyCat(2);
        $this->load->model("Regime");
        $this->data["be"] = $this->Regime->select_by_cat(1);
        $this->data["kely"] = $this->Regime->select_by_cat(2);
        $this->data["session"] = $this->session->admin;
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function insertaliment(){
        $this->checksession("admin", site_url("Admincontroller/login"));
        $this->load->model("Aliment");
        $nom = $this->input->post("nom");
        $id = $this->input->post("idcategorie");
        $rep = $this->Aliment->insertaliment($nom,$id);
        redirect(site_url("admincontroller/aliment"));
    }

    public function insertperte(){
        $this->checksession("admin", site_url("Admincontroller/login"));
        $this->load->model("Regime");
        $idregime= $this->input->post("kely");
        $idaliment = $this->input->post("ali");
        $idactivite = $this->input->post("act");
        $rep = $this->Regime->insertalimentregime($idaliment,$idregime);
        $req = $this->Regime->insertactiviteregime($idactivite,$idregime);
        redirect(site_url("admincontroller/regime"));
    }

    public function insertprise(){
        $this->checksession("admin", site_url("Admincontroller/login"));
        $this->load->model("Regime");
        $idregime= $this->input->post("be");
        $idaliment = $this->input->post("ali");
        $idactivite = $this->input->post("act");
        $rep = $this->Regime->insertalimentregime($idaliment,$idregime);
        $req = $this->Regime->insertactiviteregime($idactivite,$idregime);
        redirect(site_url("admincontroller/regime"));
    }

    public function insertactivite(){
        $this->checksession("admin", site_url("admincontroller/login"));
        $this->load->model("Activite");
        $nom = $this->input->post("nom");
        $id = $this->input->post("idcategorie");
        $rep = $this->Activite->insertactivite($nom,$id);
        redirect(site_url("admincontroller/activite"));
    }

    public function insertregime(){
        $this->checksession("admin", site_url("admincontroller/login"));
        $this->load->model("Regime");
        $id = $this->input->post("cat");
        $nom = $this->input->post("nom");
        $montant = $this->input->post("montant");
        $duree = $this->input->post("duree");
        $poids = $this->input->post("poids");

        $rep = $this->Regime->insertregime($id,$nom,$montant,$duree,$poids);
        redirect(site_url("admincontroller/regime"));
    }

}