<?php

class Offres extends CI_controller {

    protected $errorEl;
    protected $errorEn;
    protected $eleve;
    protected $entreprise;
    protected $idAdresse;
    protected $idEleve;
    protected $idEntreprise;

    public function __construct () {
        parent::__construct();
    }

    public function Index() {

        $this->load->model('Model_Offres');

        if ($this->session->userdata('user_input')) {

            $login = $this->session->userdata('user_input');

            if ($this->Model_Offres->check_login($login)) {

                $ids = $this->Model_Offres->idEleve_idEntreprise_dy_login($login);

                if ($ids->idEntreprise != FALSE && $ids->idEleve != FALSE) {
                    echo 'bonjour '.$login.'<br>';
                    echo 'ceci est normalement impossible, veuillez contacter l\'administrateur de l\'application';
                }
                else if ($ids->idEntreprise != FALSE) {

                    $this->idEntreprise = $ids->idEntreprise;
                    $this->Affichage_Entreprise();
                }
                else if ($ids->idEleve != FALSE) {

                    $this->Affichage_Eleve();
                }
                else {
                    echo 'Bonjour Administrateur, cette section n\'est pas encore construite';
                }
            }
            else {
                $this->deconnexion();
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
    protected function Affichage_Eleve() {

        $login = $this->session->userdata('user_input');
        $data['login'] = $login;

        $inclusions['inclusions']='<link rel="stylesheet" media="all" type"text/css" href="'.base_url().'Public/css/Eleves.css"/>
        <script type="text/javascript" src="'.base_url().'Public/js/Eleves.js"></script>';
        $this->load->view('view_Template_head',$inclusions);
        $this->load->view('view_OffresEntreprise',$data);
        $this->load->view('view_Template_footer');

    }
    protected function Affichage_Entreprise() {

        $login = $this->session->userdata('user_input');

        $data['Offres'] = $this->Model_Offres->Offres_by_idEntreprises($this->idEntreprise);

        $inclusions['welcome']='<p>Bonjour, vous êtes connectés</p> <p>en tant que '.$login.'</p>';
        $inclusions['inclusions']='<link rel="stylesheet" media="all" type"text/css" href="'.base_url().'Public/css/OffresEntreprise.css"/>
        <script type="text/javascript" src="'.base_url().'Public/js/Eleves.js"></script>';
        $this->load->view('view_Template_head',$inclusions);
        $this->load->view('view_OffresEntreprise',$data);
        $this->load->view('view_Template_footer');

    }

}
?>
