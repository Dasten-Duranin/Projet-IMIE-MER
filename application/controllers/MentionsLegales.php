<?php

    class MentionsLegales extends CI_controller {

        public function __construct () {
            parent::__construct();
        }

        public function Index() {

            $this->load->model('Model_Eleves');

            if ($this->session->userdata('user_input')) {

                $login = $this->session->userdata('user_input');

                if ($this->Model_Eleves->check_login($login)) {

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

            $inclusions['welcome']='<p>Bonjour, vous êtes connectés</p> <p>en tant que '.$this->session->userdata('user_input').'</p>';


            $inclusions['inclusions']='<link rel="stylesheet" media="all" type"text/css" href="'.base_url().'Public/css/MentionsLegales.css"/>
            <script type="text/javascript" src="'.base_url().'Public/js/Eleves.js"></script>';
            $this->load->view('view_Template_head',$inclusions);

            $this->load->view('view_MentionsLegales');
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