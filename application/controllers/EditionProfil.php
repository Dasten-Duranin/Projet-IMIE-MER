<?php

    class EditionProfil extends CI_controller {

        protected $errorEl;
        protected $errorEn;
        protected $eleve;
        protected $entreprise;
        protected $idAdresse;
        protected $idEleve;
        protected $idEntreprise;

        public function __construct () {
            parent::__construct();
        }

        public function Index() {

            $this->load->model('Model_EditionProfil');

            if ($this->session->userdata('user_input')) {

                $login = $this->session->userdata('user_input');

                if ($this->Model_EditionProfil->check_login($login)) {

                    $ids = $this->Model_EditionProfil->idEleve_idEntreprise_dy_login($login);

                    if ($ids->idEntreprise != FALSE && $ids->idEleve != FALSE) {
                        echo 'bonjour '.$login.'<br>';
                        echo 'ceci est normalement impossible, veuillez contacter l\'administrateur de l\'application';
                    }
                    else if ($ids->idEntreprise != FALSE) {

                        $this->idEntreprise = $ids->idEntreprise;
                        $this->entreprise = $this->Model_EditionProfil->entreprise_by_id($this->idEntreprise);
                        $this->idAdresse = $this->entreprise->idAdresse;
                        $SubmitEntreprise = $this->input->post('SubmitEntreprise');
                        $validLogin = $this->input->post('validLogin_y');
                        $validMDP = $this->input->post('validMDP_y');

                        if ($validLogin !=FALSE) {

                            $this->Edition_Login($login);
                            $this->Affichage_Entreprise();
                        }
                        else if ($validMDP !=FALSE) {

                            $this->Edition_MDP($login);
                            $this->Affichage_Entreprise();
                        }
                        else if ($SubmitEntreprise !=FALSE) {

                            $this->Edition_Entreprise();
                        }
                        else {

                            $this->Affichage_Entreprise();
                        }

                    }
                    else if ($ids->idEleve != FALSE) {

                        $this->idEleve = $ids->idEleve;
                        $this->eleve = $this->Model_EditionProfil->eleve_by_id($this->idEleve);
                        $this->idAdresse = $this->eleve->idAdresse;
                        $SubmitEleve = $this->input->post('SubmitEleve');
                        $validLogin = $this->input->post('validLogin_y');
                        $validMDP = $this->input->post('validMDP_y');

                        if ($validLogin !=FALSE) {

                            $this->Edition_Login($login);
                            $this->Affichage_Eleve();
                        }
                        else if ($validMDP !=FALSE) {

                            $this->Edition_MDP($login);
                            $this->Affichage_Eleve();
                        }
                        else if ($SubmitEleve !=FALSE) {

                            $this->Edition_Eleve();
                        }
                        else {

                            $this->Affichage_Eleve();
                        }
                    }
                    else {
                        echo 'Bonjour Administrateur, cette section n\'est pas encore construite';
                    }
                }
                else {
                    $this->deconnexion();
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
        protected function Affichage_Eleve() {

            $data['errorEl'] =$this->errorEl;
            $login = $this->session->userdata('user_input');
            $data['login'] = $login;
            $data['eleve'] = $this->eleve;
            $data['adresse'] = $this->Model_EditionProfil->adresse_by_id($this->idAdresse);
            $data['domaines_dev'] = $this->Model_EditionProfil->domaines_developpement_by_eleve($this->idEleve);
            $data['domaines_res'] = $this->Model_EditionProfil->domaines_reseau_by_eleve($this->idEleve);

            $data['liste_classes']=$this->Model_EditionProfil->liste_classes();
            $data['liste_domaine_developpement']=$this->Model_EditionProfil->liste_domaine_developpement();
            $data['liste_domaine_reseau']=$this->Model_EditionProfil->liste_domaine_reseau();

            $inclusions['welcome']='<p>Bonjour, vous êtes connectés</p> <p>en tant que '.$login.'</p>';
            $inclusions['inclusions']='<link rel="stylesheet" media="all" type"text/css" href="'.base_url().'Public/css/EditionProfil.css"/>
            <script type="text/javascript" src="'.base_url().'Public/js/EditionProfil.js"></script>';

            $this->load->view('view_Template_head',$inclusions);
            $this->load->view('view_EditionProfilEleve',$data);
            $this->load->view('view_Template_footer');

        }
        protected function Affichage_Entreprise() {

            $data['errorEn'] =$this->errorEn;
            $login = $this->session->userdata('user_input');
            $data['login'] = $login;
            $data['entreprise'] = $this->entreprise;
            $data['adresse'] = $this->Model_EditionProfil->adresse_by_id($this->idAdresse);
            $data['domaines_dev'] = $this->Model_EditionProfil->domaines_developpement_by_entreprise($this->idEntreprise);
            $data['domaines_res'] = $this->Model_EditionProfil->domaines_reseau_by_entreprise($this->idEntreprise);

            $data['liste_domaine_developpement']=$this->Model_EditionProfil->liste_domaine_developpement();
            $data['liste_domaine_reseau']=$this->Model_EditionProfil->liste_domaine_reseau();

            $inclusions['welcome']='<p>Bonjour, vous êtes connectés</p> <p>en tant que '.$login.'</p>';
            $inclusions['inclusions']='<link rel="stylesheet" media="all" type"text/css" href="'.base_url().'Public/css/EditionProfil.css"/>
            <script type="text/javascript" src="'.base_url().'Public/js/EditionProfil.js"></script>';

            $this->load->view('view_Template_head',$inclusions);
            $this->load->view('view_EditionProfilEntreprise',$data);
            $this->load->view('view_Template_footer');

        }
        protected function Edition_Eleve() {

            $this->Edition_Adresse();

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

            $this->Model_EditionProfil->update_eleve($Nom, $Prenom, $Sexe, $DateNaiss, $LieuNaiss, $TelEleve, $EmailEleve/*, $PhotoProfil*/, $GitHub, $DoYouBuzz, $Linkedin, $Twitter, $Accroche, $Descriptif, $Alternance, $Stage, $Classe, $this->idEleve);
            $this->Model_EditionProfil->delete_domaines_eleves($this->idEleve);

            foreach( $DomaineDevEl as $DomaineDe ) {
                if ($DomaineDe != 0) {
                    $this->Model_EditionProfil->insert_souhait_eleve($DomaineDe, $this->idEleve);
                    echo 'idDomainDe :'.$DomaineDe.'<br>';
                }
            }
            foreach( $DomaineResEl as $DomaineRe ) {
                if ($DomaineRe != 0) {
                    $this->Model_EditionProfil->insert_souhait_eleve($DomaineRe, $this->idEleve);
                    echo 'idDomainRe :'.$DomaineRe.'<br>';
                }
            }
            header('location:http://localhost/CodeIgniter/EditionProfil/Index');
        }
        protected function Edition_Entreprise() {

            $this->Edition_Adresse();

            $NomEntreprise = $this->input->post('NomEntreprise');
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

            $this->Model_EditionProfil->update_entreprise($NomEntreprise, $TelEntreprise, $FaxEntreprise, $EmailEntreprise, $DescriptifEntreprise, $Stagiaire, $Alternant, $Employe, $this->idEntreprise);
            $this->Model_EditionProfil->delete_domaines_entreprise($this->idEntreprise);

            foreach( $DomaineDevEn as $DomaineDe ) {
                if ($DomaineDe != 0) {
                    $this->Model_EditionProfil->insert_fait_entreprise($DomaineDe, $this->idEntreprise);
                    echo 'idDomainDe :'.$DomaineDe.'<br>';
                }
            }
            foreach( $DomaineResEn as $DomaineRe ) {
                if ($DomaineRe != 0) {
                    $this->Model_EditionProfil->insert_fait_entreprise($DomaineRe, $this->idEntreprise);
                    echo 'idDomainRe :'.$DomaineRe.'<br>';
                }
            }
            header('location:http://localhost/CodeIgniter/EditionProfil/Index');
        }
        protected function Edition_Adresse() {

            $TypeVoie = $this->input->post('TypeVoie');
            $NomVoie = $this->input->post('NomVoie');
            $NumVoie = $this->input->post('NumVoie');
            $CP = $this->input->post('CP');
            $Ville = $this->input->post('Ville');
            $Pays = $this->input->post('Pays');

            $this->Model_EditionProfil->update_adresse($TypeVoie, $NomVoie, $NumVoie, $CP, $Ville, $Pays, $this->idAdresse);

        }
        protected function Edition_Login($login) {

            $Identifiant = $this->input->post('Identifiant');
            $MDPLogin = $this->input->post('MDPLogin');

            if ($login != FALSE) {

                if ($MDPLogin != FALSE) {

                    if($this->Model_EditionProfil->check_logs($login, $MDPLogin)){

                        $this->Model_EditionProfil->update_login($Identifiant, $login);
                        $this->session->set_userdata('user_input', $Identifiant);
                        
                        $this->errorEl = 'Identifient changé avec succès.';
                        $this->errorEn = 'Identifient changé avec succès.';

                    }
                    else {
                        $this->errorEl = 'Mauvais mot de passe';
                        $this->errorEn = 'Mauvais mot de passe';
                    }
                }
                else {
                    $this->errorEl = 'Veuillez renseigner votre Mot de Passe';
                    $this->errorEn = 'Veuillez renseigner votre Mot de Passe';
                }
            }
            else {
                $this->errorEl = 'Veuillez renseigner le nouvel Identifient';
                $this->errorEn = 'Veuillez renseigner le nouvel Identifient';
            }

        }
        protected function Edition_MDP($login) {

            $MDP = $this->input->post('MDP');
            $newMDP = $this->input->post('newMDP');
            $newMDPconf = $this->input->post('newMDPconf');

            if($this->Model_EditionProfil->check_logs($login, $MDP)){

                if ($newMDP == $newMDPconf) {

                    $this->Model_EditionProfil->update_mdp($newMDP, $login);
                    $this->errorEl = 'Le mot de passe à été changé avec succès.';
                    $this->errorEn = 'Le mot de passe à été changé avec succès.';

                }
                else {
                    $this->errorEl = 'Les nouveaux mot de passe ne sont pas identiques.';
                    $this->errorEn = 'Les nouveaux mot de passe ne sont pas identiques.';
                }
            }
            else {
                $this->errorEl = 'Le Mot de passe est incorrect';
                $this->errorEn = 'Le Mot de passe est incorrect';
            }

        }

    }
?>
