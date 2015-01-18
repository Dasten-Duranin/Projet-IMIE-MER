<?php

class Offres extends CI_controller {

    protected $errorOf;
    protected $eleve;
    protected $entreprise;
    protected $idAdresse;
    protected $idEleve;
    protected $idEntreprise;
    protected $idOffreModif;

    public function __construct () {
        parent::__construct();
    }

    public function Index() {

        $this->load->model('Model_Offres');

        if ($this->session->userdata('user_input')) {

            $login = $this->session->userdata('user_input');

            if ($this->Model_Offres->check_login($login)) {

                $ids = $this->Model_Offres->idEleve_idEntreprise_dy_login($login);

                if ($ids->idEntreprise != FALSE && $ids->idEleve != FALSE) {
                    echo 'bonjour '.$login.'<br>';
                    echo 'ceci est normalement impossible, veuillez contacter l\'administrateur de l\'application';
                }
                else if ($ids->idEntreprise != FALSE) {

                    $this->idEntreprise = $ids->idEntreprise;
                    $ConfirmDel = $this->input->post('ConfirmDel');
                    $SubmitOffre = $this->input->post('SubmitOffre');
                    $SubmitModifOffre = $this->input->post('SubmitModifOffre');

                    if ($ConfirmDel != FALSE) {
                        $this->Delete_Offer();
                    }
                    else if ($SubmitOffre != FALSE) {
                        $this->Offer_Creation();
                    }
                    else if ($SubmitModifOffre != FALSE){
                        $this->Offer_Modification();
                    }
                    else {
                        $this->idEntreprise = $ids->idEntreprise;
                        $this->Affichage_Mes_Offres();
                    }
                }
                else if ($ids->idEleve != FALSE) {

                    $this->Affichage_Eleve();
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
    protected function Affichage_Eleve() {

        $login = $this->session->userdata('user_input');
        $data['login'] = $login;

        $data['liste_offres'] = $this->Model_Offres->liste_offres();
        $data['liste_domaine_offres'] = $this->Model_Offres->liste_domaine_offres();
        $data['liste_villes_offres'] = $this->Model_Offres->liste_villes_offres();

        $inclusions['welcome']='<p>Bonjour, vous êtes connectés</p> <p>en tant que '.$login.'</p>';
        $inclusions['inclusions']='<link rel="stylesheet" media="all" type"text/css" href="'.base_url().'Public/css/Offres.css"/>';
        $this->load->view('view_Template_head',$inclusions);
        $this->load->view('view_Offres',$data);
        $this->load->view('view_Template_footer');

    }
    protected function Affichage_Mes_Offres() {

        $login = $this->session->userdata('user_input');

        $data['errorOf'] =$this->errorOf;
        $this->idOffreModif = $this->input->get('idOffreModif');

        if ($this->idOffreModif != FALSE) {
            $data['OffreById']=$this->Model_Offres->select_offre_by_id($this->idOffreModif, $this->idEntreprise);
            $data['domaines_dev'] = $this->Model_Offres->domaines_developpement_by_offre($this->idOffreModif);
            $data['domaines_res'] = $this->Model_Offres->domaines_reseau_by_offre($this->idOffreModif);
        }

        $data['Offres'] = $this->Model_Offres->Offres_by_idEntreprises($this->idEntreprise);
        $data['liste_domaine_developpement']=$this->Model_Offres->liste_domaine_developpement();
        $data['liste_domaine_reseau']=$this->Model_Offres->liste_domaine_reseau();

        $inclusions['welcome']='<p>Bonjour, vous êtes connectés</p> <p>en tant que '.$login.'</p>';
        $inclusions['inclusions']='<link rel="stylesheet" media="all" type"text/css" href="'.base_url().'Public/css/NosOffres.css"/>
        <script type="text/javascript" src="'.base_url().'Public/js/NosOffres.js"></script>';
        $this->load->view('view_Template_head',$inclusions);
        $this->load->view('view_NosOffres',$data);
        $this->load->view('view_Template_footer');

    }
    protected function Offer_Creation() {

        $DateOffre = date("Y-m-d");
        $TitreOffre = $this->input->post('TitreOffre');
        $DescriptifOffre = $this->input->post('DescriptifOffre');
        $StageOffre = $this->input->post('StageOffre');
        $AlternanceOffre = $this->input->post('AlternanceOffre');
        $EmploiOffre = $this->input->post('EmploiOffre');

        if ($StageOffre != FALSE) {$StageOffre=1;} else {$StageOffre=0;}
        if ($AlternanceOffre != FALSE) {$AlternanceOffre=1;} else {$AlternanceOffre=0;}
        if ($EmploiOffre != FALSE) {$EmploiOffre=1;} else {$EmploiOffre=0;}

        $idOffre =$this->Model_Offres->insert_offre($DateOffre, $TitreOffre, $DescriptifOffre, $StageOffre, $AlternanceOffre, $EmploiOffre, $this->idEntreprise);

        $DomaineDevOf = $this->input->post('DomaineDevOf');
        $DomaineResOf = $this->input->post('DomaineResOf');

        foreach( $DomaineDevOf as $DomaineDe ) {
            if ($DomaineDe != 0) {
                $this->Model_Offres->insert_domaine_offres($DomaineDe, $idOffre);
            }
        }
        foreach( $DomaineResOf as $DomaineRe ) {
            if ($DomaineRe != 0) {
                $this->Model_Offres->insert_domaine_offres($DomaineRe, $idOffre);
            }
        }
        header('location:'.base_url().'Offres/Index');
    }
    protected function Delete_Offer() {

        $Identifiant = $this->input->post('Identifiant');
        $MDP = $this->input->post('MDP');

        if ($this->Model_Offres->check_logins_for_delete($Identifiant, $MDP, $this->idEntreprise)) {

            $idOffreConfirm = $this->input->post('idOffreConfirm');
            $this->Model_Offres->delete_domain_by_idOffer($idOffreConfirm);
            $this->Model_Offres->delete_offer_by_id($idOffreConfirm);
            header('location:'.base_url().'Offres/Index');
        }
        else {
            $this->errorOf = 'Vos Identifiants ne sont pas valides.';
            $this->Affichage_Mes_Offres();
        }
    }
    protected function Offer_Modification() {

        $this->idOffreModif = $this->input->get('idOffreModif');

        $TitreOffre = $this->input->post('TitreOffre');
        $DescriptifOffre = $this->input->post('DescriptifOffre');
        $StageOffre = $this->input->post('StageOffre');
        $AlternanceOffre = $this->input->post('AlternanceOffre');
        $EmploiOffre = $this->input->post('EmploiOffre');

        if ($StageOffre != FALSE) {$StageOffre=1;} else {$StageOffre=0;}
        if ($AlternanceOffre != FALSE) {$AlternanceOffre=1;} else {$AlternanceOffre=0;}
        if ($EmploiOffre != FALSE) {$EmploiOffre=1;} else {$EmploiOffre=0;}

        $this->Model_Offres->update_offre($TitreOffre, $DescriptifOffre, $StageOffre, $AlternanceOffre, $EmploiOffre, $this->idOffreModif);

        $DomaineDevModifOf = $this->input->post('DomaineDevModifOf');
        $DomaineResModifOf = $this->input->post('DomaineResModifOf');

        $this->Model_Offres->delete_domaines_offre($this->idOffreModif);

        foreach( $DomaineDevModifOf as $DomaineDe ) {
            if ($DomaineDe != 0) {
                $this->Model_Offres->insert_domaine_offres($DomaineDe, $this->idOffreModif);
            }
        }
        foreach( $DomaineResModifOf as $DomaineRe ) {
            if ($DomaineRe != 0) {
                $this->Model_Offres->insert_domaine_offres($DomaineRe, $this->idOffreModif);
            }
        }
        header('location:'.base_url().'Offres/Index');

    }

}
?>
