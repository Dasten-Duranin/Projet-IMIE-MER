<?php

    class Entreprises extends CI_controller {

        public function __construct () {
            parent::__construct();
        }

        public function Index() {

            $this->load->model('Model_Entreprises');

            if ($this->session->userdata('user_input')) {  // check de l'existence d'une session ou non


                $login = $this->session->userdata('user_input'); // information sur le login

                if ($this->Model_Entreprises->check_login($login)) { // check de la véracité des log

                    $this->Affichage(); //affichage de la page

                }
                else {
                    $this->Deconnexion();
                }
            }

            else {
                header('location:'.base_url().'Connexion/index'); // si pas de sessions load page de connexion
            }
        }
        protected function Affichage() {

            $data['Entreprises'] = $this->Model_Entreprises->liste_entreprises();
            $data['ListeDomaineEntreprise'] = $this->Model_Entreprises->liste_domaine_entreprise();
            $data['liste_fait'] = $this->Model_Entreprises->liste_fait();
            $data['liste_villes_entreprises'] = $this->Model_Entreprises->liste_villes_entreprises();

            $inclusions['welcome']='<p>Bonjour, vous êtes connectés</p> <p>en tant que '.$this->session->userdata('user_input').'</p>';
            $inclusions['inclusions']='<link rel="stylesheet" media="all" type"text/css" href="'.base_url().'Public/css/Entreprises.css"/>
            <script type="text/javascript" src="'.base_url().'Public/js/Entreprises.js"></script>';

            $this->load->view('view_Template_head',$inclusions);
            $this->load->view('view_Entreprises',$data);
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
