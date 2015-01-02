<?php

    class Inscription extends CI_controller {

        protected $errorEl;
        protected $errorEn;
        protected $idAdresse;

        public function __construct () {
            parent::__construct();
        }

        public function Index() {

            $this->load->model('Model_Inscription');
            if (!$this->session->userdata('user_input')) {

                $login = $this->input->post('Identifiant');
                $SubmitEleve = $this->input->post('SubmitEleve');
                $SubmitEntreprise = $this->input->post('SubmitEntreprise');

                if ($SubmitEntreprise !=FALSE && $login !=FALSE) {

                    $this->Insert_Entreprise();

                }
                else if ($SubmitEleve !=FALSE && $login !=FALSE) {

                    $this->Insert_Eleve();

                }
                else {
                    $this->Affichage();
                }
            }
            else {
                header('location:'.base_url().'Eleves/Index');
            }
        }
        protected function Affichage() {

            $data['errorEl'] =$this->errorEl;
            $data['errorEn'] =$this->errorEn;

            $data['liste_classes']=$this->Model_Inscription->liste_classes();
            $data['liste_domaine_developpement']=$this->Model_Inscription->liste_domaine_developpement();
            $data['liste_domaine_reseau']=$this->Model_Inscription->liste_domaine_reseau();
            $this->load->view('view_Inscription',$data);

        }
        protected function Insert_Adresse($idUtilisateur) {

            $TypeVoie = $this->input->post('TypeVoie');
            $NomVoie = $this->input->post('NomVoie');
            $NumVoie = $this->input->post('NumVoie');
            $CP = $this->input->post('CP');
            $Ville = $this->input->post('Ville');
            $Pays = $this->input->post('Pays');

            $this->idAdresse =$this->Model_Inscription->insert_adresse($TypeVoie, $NomVoie, $NumVoie, $CP, $Ville, $Pays);

        }
        protected function Insert_Entreprise() {

            $login = $this->input->post('Identifiant');

            if(!$this->Model_Inscription->check_logs($login)){

                $NomEntreprise = $this->input->post('NomEntreprise');

                if (!$this->Model_Inscription->check_NomEntreprise($NomEntreprise)) {

                    $mdp = $this->input->post('MDP');

                    $TelEntreprise = $this->input->post('TelEntreprise');
                    $FaxEntreprise = $this->input->post('FaxEntreprise');
                    $EmailEntreprise = $this->input->post('EmailEntreprise');
                    $DescriptifEntreprise = $this->input->post('DescriptifEntreprise');
                    $Stagiaire = $this->input->post('Stagiaire');
                    $Alternant = $this->input->post('Alternant');
                    $Employe = $this->input->post('Employe');


                    if ($Stagiaire != FALSE) {$Stagiaire=1;} else {$Stagiaire=0;}
                    if ($Alternant != FALSE) {$Alternant=1;} else {$Alternant=0;}
                    if ($Employe != FALSE) {$Employe=1;} else {$Employe=0;}

                    $DomaineDevEn = $this->input->post('DomaineDevEn');
                    $DomaineResEn = $this->input->post('DomaineResEn');

                    $idUtilisateur =$this->Model_Inscription->insert_logs($login, $mdp);

                    $this->Insert_Adresse($idUtilisateur);
                    $this->idEntreprise =$this->Model_Inscription->insert_entreprise($NomEntreprise, $TelEntreprise, $FaxEntreprise, $EmailEntreprise, $DescriptifEntreprise, $Stagiaire, $Alternant, $Employe, $this->idAdresse, $idUtilisateur);

                    foreach( $DomaineDevEn as $DomaineDe ) {
                        if ($DomaineDe != 0) {
                            $this->Model_Inscription->insert_domaine_entreprises($DomaineDe, $this->idEntreprise);
                        }
                    }
                    foreach( $DomaineResEn as $DomaineRe ) {
                        if ($DomaineRe != 0) {
                            $this->Model_Inscription->insert_domaine_entreprises($DomaineRe, $this->idEntreprise);
                        }
                    }
                    $this->Model_Inscription->insert_idEntreprise_On_Utilisateur($this->idEntreprise, $idUtilisateur);

                    $this->session->set_userdata('user_input', $login);
                    header('location:'.base_url().'Eleves/Index');
                }
                else {

                    $this->errorEn = 'Nom d\'entreprise déjà existant';
                    $this->Affichage();

                }
            }
            else {

                $this->errorEn = 'Identifiant déjà utilisé';
                $this->Affichage();

            }
        }
        protected function Insert_Eleve() {

            $login = $this->input->post('Identifiant');

            if(!$this->Model_Inscription->check_logs($login)){

                $mdp = $this->input->post('MDP');

                $Nom = $this->input->post('Nom');
                $Prenom = $this->input->post('Prenom');
                $Sexe = $this->input->post('Sexe');
                $DateNaiss = $this->input->post('DateNaiss');
                $LieuNaiss = $this->input->post('LieuNaiss');
                $TelEleve = $this->input->post('TelEleve');
                $EmailEleve = $this->input->post('EmailEleve');
                /*$PhotoProfil = $this->input->post('PhotoProfil');*/
                $GitHub = $this->input->post('GitHub');
                $DoYouBuzz = $this->input->post('DoYouBuzz');
                $Linkedin = $this->input->post('Linkedin');
                $Twitter = $this->input->post('Twitter');
                $Accroche = $this->input->post('Accroche');
                $Descriptif = $this->input->post('Descriptif');
                $Alternance = $this->input->post('Alternance');
                $Stage = $this->input->post('Stage');
                $Classe = $this->input->post('Classe');

                if ($Stage != FALSE) {$Stage=1;} else {$Stage=0;}
                if ($Alternance != FALSE) {$Alternance=1;} else {$Alternance=0;}

                $DomaineDevEl = $this->input->post('DomaineDevEl');
                $DomaineResEl = $this->input->post('DomaineResEl');

                $idUtilisateur =$this->Model_Inscription->insert_logs($login, $mdp);
                $this->Insert_Adresse($idUtilisateur);

                $idEleve =$this->Model_Inscription->insert_eleve($Nom, $Prenom, $Sexe, $DateNaiss, $LieuNaiss, $TelEleve, $EmailEleve/*, $PhotoProfil*/, $GitHub, $DoYouBuzz, $Linkedin, $Twitter, $Accroche, $Descriptif, $Alternance, $Stage, $this->idAdresse, $idUtilisateur, $Classe);

                foreach( $DomaineDevEl as $DomaineDe ) {
                    if ($DomaineDe != 0) {
                        $this->Model_Inscription->insert_souhait_eleve($DomaineDe, $idEleve);
                        echo 'idDomainDe :'.$DomaineDe.'<br>';
                    }
                }
                foreach( $DomaineResEl as $DomaineRe ) {
                    if ($DomaineRe != 0) {
                        $this->Model_Inscription->insert_souhait_eleve($DomaineRe, $idEleve);
                        echo 'idDomainRe :'.$DomaineRe.'<br>';
                    }
                }
                $this->Model_Inscription->insert_idEleve_On_Utilisateur($idEleve, $idUtilisateur);

                $this->session->set_userdata('user_input', $login);
                header('location:'.base_url().'Eleves/Index');
            }
            else {

                $this->errorEl = 'Identifiant déjà utilisé';
                $this->Affichage();

            }
        }
    }

?>
