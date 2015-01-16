<?php

class Profil extends CI_controller {

    protected $idEntreprise;
    protected $idEleve;

    public function __construct () {
        parent::__construct();
    }

    public function Index() {

        $this->load->model('Model_Profil');

        if ($this->session->userdata('user_input')) {

            $login = $this->session->userdata('user_input');

            if ($this->Model_Profil->check_login($login)) {
                $this->idEleve = $this->input->get('idEleve');
                $this->idEntreprise = $this->input->get('idEntreprise');

                if ($this->idEleve != FALSE) {
                    $this->Affichage_Eleve();
                }
                else if ($this->idEntreprise != FALSE) {
                    $this->Affichage_Entreprise();
                }
            }
            else {
                header('location:'.base_url().'ProfilEleve/Deconnexion');
            }
        }

        else {
            header('location:'.base_url().'Connexion/index');
        }
    }
    public function Deconnexion() {

        if ($this->session->userdata('user_input')) {

            $this->session->unset_userdata('user_input');
            header('location:'.base_url().'Connexion/index');

        }

        else {

            header('location:'.base_url().'Connexion/index');

        }
    }
    public function MonProfil() {

        $this->load->model('Model_Profil');

        if ($this->session->userdata('user_input')) {

            $login = $this->session->userdata('user_input');

            if ($this->Model_Profil->check_login($login)) {

                $ids = $this->Model_Profil->idEleve_idEntreprise_dy_login($login);
                if ($ids->idEntreprise != FALSE && $ids->idEleve != FALSE) {
                    echo 'bonjour '.$login.'<br>';
                    echo 'ceci est normalement impossible, veuillez contacter l\'administrateur de l\'application';
                }
                else if ($ids->idEntreprise != FALSE) {
                    $this->idEntreprise= $ids->idEntreprise;
                    $this->Affichage_Entreprise();
                }
                else if ($ids->idEleve != FALSE) {
                    $this->idEleve = $ids->idEleve;
                    $this->Affichage_Entreprise();
                }
                else {
                    echo 'Bonjour Administrateur, cette section n\'est pas encore construite';
                }
            }
            else {
                header('location:'.base_url().'ProfilEleve/Deconnexion');
            }
        }
        else {
            header('location:'.base_url().'Connexion/index');
        }
    }
    protected function Affichage_Entreprise() {

        $data['entreprise'] = $this->Model_Profil->entreprise_by_id($this->idEntreprise);
        $data['domaines_entreprise'] = $this->Model_Profil->domaine_by_entreprise($this->idEntreprise);

        $inclusions['welcome']='<p>Bonjour, vous êtes connectés</p> <p>en tant que '.$this->session->userdata('user_input').'</p>';
        $inclusions['inclusions']='<link rel="stylesheet" media="all" type"text/css" href="'.base_url().'Public/css/ProfilEntreprise.css"/>
        <script type="text/javascript" src="'.base_url().'Public/js/Eleves.js"></script>';

        $this->load->view('view_Template_head',$inclusions);
        $this->load->view('view_ProfilEntreprise',$data);
        $this->load->view('view_Template_footer');

    }
    protected function Affichage_Eleve() {

        $eleve = $this->Model_Profil->eleve_by_id($this->idEleve);
        $idAdresse = $eleve->idAdresse;
        $data['eleve'] = $eleve;
        $data['adresse'] = $this->Model_Profil->adresse_by_id($idAdresse);
        $data['domaines'] = $this->Model_Profil->domaine_by_eleve($this->idEleve);

        $inclusions['welcome']='<p>Bonjour, vous êtes connectés</p> <p>en tant que '.$this->session->userdata('user_input').'</p>';
        $inclusions['inclusions']='<link rel="stylesheet" media="all" type"text/css" href="'.base_url().'Public/css/ProfilEleve.css"/>
        <script type="text/javascript" src="'.base_url().'Public/js/Eleves.js"></script>';

        $this->load->view('view_Template_head',$inclusions);
        $this->load->view('view_ProfilEleve',$data);
        $this->load->view('view_Template_footer');

    }
}
?>
