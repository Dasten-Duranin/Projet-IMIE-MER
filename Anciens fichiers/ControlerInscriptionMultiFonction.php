<?php

    class Inscription extends CI_controller {

        protected $idUtilisateur;
        protected $idAdresse;
        protected $idEleve;

        protected $login;
        protected $mdp;
        protected $SubmitEleve;
        protected $SubmitEntreprise;

        protected $Nom;
        protected $Prenom;
        protected $Sexe;
        protected $DateNaiss;
        protected $LieuNaiss;
        protected $TelEleve;
        protected $EmailEleve;
        /*protected $PhotoProfil;*/
        protected $GitHub;
        protected $Accroche;
        protected $Descriptif;
        protected $Alternance;
        protected $Stage;
        protected $Classe;

        protected $TypeVoie;
        protected $NomVoie;
        protected $NumVoie;
        protected $CP;
        protected $Ville;
        protected $Pays;


        public function __construct () {
            parent::__construct();
        }

        public function Index() {

            $this->load->model('Model_Inscription');

            if (!$this->session->userdata('user_input')) {

                $this->login = $this->input->post('Identifiant');
                $this->mdp = $this->input->post('MDP');
                $this->SubmitEleve = $this->input->post('SubmitEleve');
                $this->SubmitEntreprise = $this->input->post('SubmitEntreprise');

                $this->login = $this->input->post('Identifiant');
                $this->mdp = $this->input->post('MDP');
                $this->SubmitEleve = $this->input->post('SubmitEleve');
                $this->SubmitEntreprise = $this->input->post('SubmitEntreprise');

                $this->Nom = $this->input->post('Nom');
                $this->Prenom = $this->input->post('Prenom');
                $this->Sexe = $this->input->post('Sexe');
                $this->DateNaiss = $this->input->post('DateNaiss');
                $this->LieuNaiss = $this->input->post('LieuNaiss');
                $this->TelEleve = $this->input->post('TelEleve');
                $this->EmailEleve = $this->input->post('EmailEleve');
                /*$this->PhotoProfil = $this->input->post('PhotoProfil');*/
                $this->GitHub = $this->input->post('GitHub');
                $this->Accroche = $this->input->post('Accroche');
                $this->Descriptif = $this->input->post('Descriptif');
                $this->Alternance = $this->input->post('Alternance');
                $this->Stage = $this->input->post('Stage');
                $this->Classe = $this->input->post('Classe');

                $this->TypeVoie = $this->input->post('TypeVoie');
                $this->NomVoie = $this->input->post('NomVoie');
                $this->NumVoie = $this->input->post('NumVoie');
                $this->CP = $this->input->post('CP');
                $this->Ville = $this->input->post('Ville');
                $this->Pays = $this->input->post('Pays');

                if ($this->SubmitEntreprise !=FALSE && $this->login !=FALSE && $this->mdp !=FALSE) {

                    if (!$this->Model_Inscription->check_logs($this->login)) {

                        $this->add_entreprise();

                    }

                    else {
                        echo 'ko';
                    }

                }

                else if ($this->SubmitEleve !=FALSE && $this->login !=FALSE && $this->mdp !=FALSE) {

                    if (!$this->Model_Inscription->check_logs($this->login)) {

                        $this->add_eleve();

                    }

                    else {
                        echo 'ko';
                    }

                }

                else {
                    $data['liste_classes']=$this->Model_Inscription->liste_classes();
                    $data['liste_domaine_developpement']=$this->Model_Inscription->liste_domaine_developpement();
                    $data['liste_domaine_reseau']=$this->Model_Inscription->liste_domaine_reseau();
                    $this->load->view('view_Inscription',$data);
                }
            }
            else {
                header('location:http://localhost/CodeIgniter/Eleves/Affichage');
            }
        }

        public function add_entreprise() {


            $this->idUtilisateur =$this->Model_Inscription->insert_logs($this->login, $this->mdp);
            echo 'id utilisateur :'.$this->idUtilisateur.'<br>';
            echo 'ok1';
            $this->idAdresse =$this->Model_Inscription->insert_adresse($this->TypeVoie, $this->NomVoie, $this->NumVoie, $this->CP, $this->Ville, $this->Pays);
            echo 'id idAdresse :'.$this->idAdresse.'<br>';
            echo 'ok2';

        }

        public function add_eleve() {


            $this->idUtilisateur =$this->Model_Inscription->insert_logs($this->login, $this->mdp);
            echo 'id utilisateur :'.$this->idUtilisateur.'<br>';
            echo 'ok1';
            $this->idAdresse =$this->Model_Inscription->insert_adresse($this->TypeVoie, $this->NomVoie, $this->NumVoie, $this->CP, $this->Ville, $this->Pays);
            echo 'id idAdresse :'.$this->idAdresse.'<br>';
            echo 'ok2';
            echo $this->DateNaiss;
            $this->idEleve =$this->Model_Inscription->insert_eleve($this->Nom, $this->Prenom, $this->Sexe, $this->DateNaiss, $this->LieuNaiss, $this->TelEleve, $this->EmailEleve/*, $this->PhotoProfil*/, $this->GitHub, $this->Accroche, $this->Descriptif, $this->Alternance, $this->Stage, $this->idAdresse, $this->idUtilisateur, $this->Classe);
            echo 'id idEleve :'.$this->idEleve.'<br>';
            echo 'ok3';

        }
    }

?>
