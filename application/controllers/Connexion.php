<?php

class Connexion extends CI_controller {

    public function __construct () {
        parent::__construct();
    }

    public function Index() {

        if (!$this->session->userdata('user_input')) {

            $login = $this->input->post('login');
            $mdp = $this->input->post('mdp');
            $connexion = $this->input->post('connexion');
            $inscription = $this->input->post('inscription');

            if($login !=FALSE && $mdp!=FALSE && $connexion!=FALSE) {

                $this->load->model('Model_Connexion');

                if($this->Model_Connexion->check_connect($login, $mdp)){

                    $this->session->set_userdata('user_input', $login);
                    header('location:http://localhost/CodeIgniter/Eleves/Index');

                }
                else {

                    $data['error']='Le mot de passe ou l\'identifiant est mauvais';
                    $this->load->view('view_Connexion',$data);

                }

            }
            else if ($inscription !=FALSE) {
                header('location:http://localhost/CodeIgniter/Inscription/Index');
            }
            else {
                $this->load->view('view_Connexion');
            }
        }
        else {
            header('location:http://localhost/CodeIgniter/Eleves/Index');
        }
    }
}

//$this->sesion->unset_userdata('user_input');
?>
