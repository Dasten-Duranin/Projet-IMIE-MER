<?php

class Accueil extends CI_controller {

    public function __construct () {
        parent::__construct();
    }

    public function Index() {

        $this->load->model('Model_Accueil');

        if ($this->session->userdata('user_input')) {

            $login = $this->session->userdata('user_input');

            if ($this->Model_Accueil->check_login($login)) {

                $this->Affichage();

            }
            else {
                $this->Deconnexion();
            }
        }

        else {
            header('location:'.base_url().'Connexion/index');
        }
    }
    protected function Affichage() {

        $data['eleves'] = $this->Model_Accueil->eleves_random();
        $data['offres'] = $this->Model_Accueil->Offres_random();
        $data['domaines_offres'] = $this->Model_Accueil->domaines_offres();

        $inclusions['welcome']='<p>Bonjour, vous êtes connectés</p> <p>en tant que '.$this->session->userdata('user_input').'</p>';
        $inclusions['inclusions']='<link rel="stylesheet" media="all" type"text/css" href="'.base_url().'Public/css/Accueil.css"/>
        <script type="text/javascript" src="'.base_url().'Public/js/Accueil.js"></script>';

        $this->load->view('view_Template_head',$inclusions);
        $this->load->view('view_Accueil',$data);
        $this->load->view('view_Template_footer');

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
}
?>
