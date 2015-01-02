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

            $idUtilisateur =0;
            $idAdresse =0;
            $idEleve =0;

            $login = $this->input->post('Identifiant');
            $mdp = $this->input->post('MDP');
            $SubmitEleve = $this->input->post('SubmitEleve');
            $SubmitEntreprise = $this->input->post('SubmitEntreprise');

            $Nom = $this->input->post('Nom');
            $Prenom = $this->input->post('Prenom');
            $Sexe = $this->input->post('Sexe');
            $DateNaiss = $this->input->post('DateNaiss');
            $LieuNaiss = $this->input->post('LieuNaiss');
            $TelEleve = $this->input->post('TelEleve');
            $EmailEleve = $this->input->post('EmailEleve');
            /*$PhotoProfil = $this->input->post('PhotoProfil');*/
            $GitHub = $this->input->post('GitHub');
            $Accroche = $this->input->post('Accroche');
            $Descriptif = $this->input->post('Descriptif');
            $Alternance = $this->input->post('Alternance');
            $Stage = $this->input->post('Stage');
            $Classe = $this->input->post('Classe');

            $TypeVoie = $this->input->post('TypeVoie');
            $NomVoie = $this->input->post('NomVoie');
            $NumVoie = $this->input->post('NumVoie');
            $CP = $this->input->post('CP');
            $Ville = $this->input->post('Ville');
            $Pays = $this->input->post('Pays');

            if ($SubmitEntreprise !=FALSE && $login !=FALSE) {

                if(!$this->Model_Inscription->check_logs($login)){
                    $idUtilisateur =$this->Model_Inscription->insert_logs($login, $mdp);
                    echo 'id utilisateur :'.$idUtilisateur.'<br>';
                    echo 'ok1';
                    $idAdresse =$this->Model_Inscription->insert_adresse($TypeVoie, $NomVoie, $NumVoie, $CP, $Ville, $Pays);
                    echo 'id idAdresse :'.$idAdresse.'<br>';
                    echo 'ok2';
                }

                else {
                    echo 'ko';
                }
            }

            else if ($SubmitEleve !=FALSE) {

                if(!$this->Model_Inscription->check_logs($login)){
                    $idUtilisateur =$this->Model_Inscription->insert_logs($login, $mdp);
                    echo 'id utilisateur :'.$idUtilisateur.'<br>';
                    echo 'ok1';
                    $idAdresse =$this->Model_Inscription->insert_adresse($TypeVoie, $NomVoie, $NumVoie, $CP, $Ville, $Pays);
                    echo 'id idAdresse :'.$idAdresse.'<br>';
                    echo 'ok2';
                    echo $DateNaiss;
                    $idEleve =$this->Model_Inscription->insert_eleve($Nom, $Prenom, $Sexe, $DateNaiss, $LieuNaiss, $TelEleve, $EmailEleve/*, $PhotoProfil*/, $GitHub, $Accroche, $Descriptif, $Alternance, $Stage, $idAdresse, $idUtilisateur, $Classe);
                    echo 'id idEleve :'.$idEleve.'<br>';
                    echo 'ok3';

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
}

?>
