<?php

    class ProfilEleve extends CI_controller {

        public function __construct () {
            parent::__construct();
        }

        public function Affichage() {

            $this->load->model('Model_ProfilEleve');

            if ($this->session->userdata('user_input')) {

                $login = $this->session->userdata('user_input');

                if ($this->Model_ProfilEleve->check_login($login)) {

                    $idEleve = $this->input->get('idEleve');
                    $eleve = $this->Model_ProfilEleve->eleve_by_id($idEleve);
                    $idAdresse = $eleve->idAdresse;
                    $data['eleve'] = $eleve;
                    $data['adresse'] = $this->Model_ProfilEleve->adresse_by_id($idAdresse);
                    $data['domaines'] = $this->Model_ProfilEleve->domaine_by_eleve($idEleve);

                    $inclusions['welcome']='<p>Bonjour, vous êtes connectés</p> <p>en tant que '.$this->session->userdata('user_input').'</p>';
                    $inclusions['inclusions']='<link rel="stylesheet" media="all" type"text/css" href="'.base_url().'Public/css/ProfilEleve.css"/>
                    <script type="text/javascript" src="'.base_url().'Public/js/Eleves.js"></script>';


                    $this->load->view('view_Template_head',$inclusions);
                    $this->load->view('view_ProfilEleve',$data);
                    $this->load->view('view_Template_footer');
                }
                else {
                    header('location:http://localhost/CodeIgniter/ProfilEleve/Deconnexion');
                }
            }

            else {
                header('location:http://localhost/CodeIgniter/Connexion/index');
            }
        }
        public function Deconnexion() {

            if ($this->session->userdata('user_input')) {

                $this->session->unset_userdata('user_input');
                header('location:http://localhost/CodeIgniter/Connexion/index');

            }

            else {

                header('location:http://localhost/CodeIgniter/Connexion/index');

            }
        }
        public function MonProfil() {

            $this->load->model('Model_ProfilEleve');

            if ($this->session->userdata('user_input')) {

                $login = $this->session->userdata('user_input');

                if ($this->Model_ProfilEleve->check_login($login)) {

                    $ids = $this->Model_ProfilEleve->idEleve_idEntreprise_dy_login($login);
                    if ($ids->idEntreprise != FALSE && $ids->idEleve != FALSE) {
                        echo 'bonjour '.$login.'<br>';
                        echo 'ceci est normalement impossible, veuillez contacter l\'administrateur de l\'application';
                    }
                    else if ($ids->idEntreprise != FALSE) {
                        echo $ids->idEntreprise.'<br>';
                    }
                    else if ($ids->idEleve != FALSE) {
                        header('location:http://localhost/CodeIgniter/ProfilEleve/Affichage?idEleve='.$ids->idEleve);
                    }
                    else {
                        echo 'Bonjour Administrateur, cette section n\'est pas encore construite';
                    }
                }
                else {
                    header('location:http://localhost/CodeIgniter/ProfilEleve/Deconnexion');
                }
            }
            else {
                header('location:http://localhost/CodeIgniter/Connexion/index');
            }
        }
    }
?>
