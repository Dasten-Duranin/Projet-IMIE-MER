<?php

class Connexion extends CI_controller {

    public function __construct () {
        parent::__construct();
    }

    public function Index() {

        if (!$this->session->userdata('user_input')) { // check de l'existence d'une session ou non

            $login = $this->input->post('login'); // information sur le login
            $mdp = $this->input->post('mdp');
            $connexion = $this->input->post('connexion'); // click sur connexion
            $inscription = $this->input->post('inscription'); // click sur inscription

            if($login !=FALSE && $mdp!=FALSE && $connexion!=FALSE) { //check des informations de connexion
                $this->load->model('Model_Connexion'); //chargement du modele connexion

                if($this->Model_Connexion->check_connect($login, $mdp)){ // check de la véracité des log

                    $this->session->set_userdata('user_input', $login); // création de session
                    header('location:'.base_url().'Accueil/Index'); // redirection vers l'accueil du site

                }
                else {

                    $data['error']='Le mot de passe ou l\'identifiant est mauvais'; // si log faux on le signal
                    $this->load->view('view_Connexion',$data); // affichage de la page de connexion

                }

            }
            else if ($inscription !=FALSE) { // si click sur inscription */
                header('location:'.base_url().'Inscription/Index'); // envoi vers la page d'inscription
            }
            else {
                $this->load->view('view_Connexion'); // sinon affichage page de connexion
            }
        }
        else {
            header('location:'.base_url().'Accueil/Index'); // si la session existe déjà on affiche le site directement
        }
    }
}

//$this->sesion->unset_userdata('user_input');
?>
