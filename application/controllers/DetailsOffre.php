<?php
    class DetailsOffre extends CI_controller {

        protected $idEntreprise;

        public function __construct () {
            parent::__construct();
        }

        public function Index() {

            $this->load->model('Model_DetailsOffre');

            if ($this->session->userdata('user_input')) {

                $login = $this->session->userdata('user_input');

                if ($this->Model_DetailsOffre->check_login($login)) {
                    //check les ids utilisateurs et on les rentre dans la variable ids
                    $ids = $this->Model_DetailsOffre->idEleve_idEntreprise_dy_login($login);

                    if ($ids->idEntreprise != FALSE && $ids->idEleve != FALSE) { //check l'existance des deux id
                        echo 'bonjour '.$login.'<br>';
                        echo 'ceci est normalement impossible, veuillez contacter l\'administrateur de l\'application';
                    }
                    else if ($ids->idEntreprise != FALSE) { // si idEntreprise existe alors c'est une entreprise
                        $this->idEntreprise =$ids->idEntreprise; // on rempli l'idEntreprise du controller
                        $this->Affichage_Offre_By_Entreprise(); // redirection vers la vue entreprise
                    }
                    else if ($ids->idEleve != FALSE) { // si idEleve existe alors c'est un élève
                        $this->Affichage_Details_Offre(); // affichage de l'offre
                    }
                    else {
                        echo 'Bonjour Administrateur, cette section n\'est pas encore construite';
                    }
                }
                else {
                    header('location:'.base_url().'DetailsOffre/Deconnexion');
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
        protected function Affichage_Details_Offre() {

            $idOffre = $this->input->get('idOffre');
            $Offre = $this->Model_DetailsOffre->Offre_By_id($idOffre);

            $login = $this->session->userdata('user_input');
            $inclusions['welcome']='<p>Bonjour, vous êtes connectés</p> <p>en tant que '.$login.'</p>';
            $inclusions['inclusions']='<link rel="stylesheet" media="all" type"text/css" href="'.base_url().'Public/css/DetailsOffre.css"/>
            <script type="text/javascript" src="'.base_url().'Public/js/Eleves.js"></script>';

            if ($Offre != FALSE) {

                $data['Offre']=$Offre;
                $data['domaines_offre'] = $this->Model_DetailsOffre->domaine_by_offre($idOffre);
            }
            else {
                $data['error']='<section>Il n\'existe pas d\'offre avec une telle ID</section>';
            }

            $this->load->view('view_Template_head',$inclusions);
            $this->load->view('view_DetailsOffre',$data);
            $this->load->view('view_Template_footer');

        }
        protected function Affichage_Offre_By_Entreprise() {

            $idOffre = $this->input->get('idOffre');
            $Offre = $this->Model_DetailsOffre->Offre_By_Entrepris($idOffre, $this->idEntreprise);

            $login = $this->session->userdata('user_input');
            $inclusions['welcome']='<p>Bonjour, vous êtes connectés</p> <p>en tant que '.$login.'</p>';
            $inclusions['inclusions']='<link rel="stylesheet" media="all" type"text/css" href="'.base_url().'Public/css/DetailsOffre.css"/>
            <script type="text/javascript" src="'.base_url().'Public/js/Eleves.js"></script>';

            if ($Offre != FALSE) {

                $data['Offre']=$Offre;
                $data['domaines_offre'] = $this->Model_DetailsOffre->domaine_by_offre($idOffre);
            }
            else {
                $data['error']='<section>Désolé Vous n\'avez pas créer d\'offre avec une telle ID</section>';
            }

            $this->load->view('view_Template_head',$inclusions);
            $this->load->view('view_DetailsOffre',$data);
            $this->load->view('view_Template_footer');

        }
    }
?>
