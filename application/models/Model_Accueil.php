<?php
class Model_Accueil extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
    ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄         ▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄
    ▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░▌       ▐░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌
    ▐░█▀▀▀▀▀▀▀█░▌▐░█▀▀▀▀▀▀▀▀▀ ▐░█▀▀▀▀▀▀▀▀▀  ▀▀▀▀█░█▀▀▀▀ ▐░█▀▀▀▀▀▀▀▀▀ ▐░▌       ▐░▌▐░█▀▀▀▀▀▀▀█░▌▐░█▀▀▀▀▀▀▀▀▀ ▐░█▀▀▀▀▀▀▀▀▀
    ▐░▌       ▐░▌▐░▌          ▐░▌               ▐░▌     ▐░▌          ▐░▌       ▐░▌▐░▌       ▐░▌▐░▌          ▐░▌
    ▐░█▄▄▄▄▄▄▄█░▌▐░█▄▄▄▄▄▄▄▄▄ ▐░█▄▄▄▄▄▄▄▄▄      ▐░▌     ▐░▌          ▐░█▄▄▄▄▄▄▄█░▌▐░█▄▄▄▄▄▄▄█░▌▐░▌ ▄▄▄▄▄▄▄▄ ▐░█▄▄▄▄▄▄▄▄▄
    ▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌     ▐░▌     ▐░▌          ▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░▌▐░░░░░░░░▌▐░░░░░░░░░░░▌
    ▐░█▀▀▀▀▀▀▀█░▌▐░█▀▀▀▀▀▀▀▀▀ ▐░█▀▀▀▀▀▀▀▀▀      ▐░▌     ▐░▌          ▐░█▀▀▀▀▀▀▀█░▌▐░█▀▀▀▀▀▀▀█░▌▐░▌ ▀▀▀▀▀▀█░▌▐░█▀▀▀▀▀▀▀▀▀
    ▐░▌       ▐░▌▐░▌          ▐░▌               ▐░▌     ▐░▌          ▐░▌       ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌▐░▌
    ▐░▌       ▐░▌▐░▌          ▐░▌           ▄▄▄▄█░█▄▄▄▄ ▐░█▄▄▄▄▄▄▄▄▄ ▐░▌       ▐░▌▐░▌       ▐░▌▐░█▄▄▄▄▄▄▄█░▌▐░█▄▄▄▄▄▄▄▄▄
    ▐░▌       ▐░▌▐░▌          ▐░▌          ▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░▌       ▐░▌▐░▌       ▐░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌
    ▀         ▀  ▀            ▀            ▀▀▀▀▀▀▀▀▀▀▀  ▀▀▀▀▀▀▀▀▀▀▀  ▀         ▀  ▀         ▀  ▀▀▀▀▀▀▀▀▀▀▀  ▀▀▀▀▀▀▀▀▀▀▀
    */

    /***********************/
    /********Général********/
    /***********************/



    public function check_login($login){
        $sql = "SELECT * from utilisateur WHERE Login=?";
        return ($this->db->query($sql,array($login))->num_rows()>0);
    }

    /**********************/
    /********Offres********/
    /**********************/

    public function Offres_by_idEntreprises($idEntreprise) {
        $sql = 'SELECT * FROM offres WHERE idEntreprise=?';
        return $this->db->query($sql, array($idEntreprise))->result();
    }

    /**********************/
    /********Eleves********/
    /**********************/

    public function eleves_random() {
        $sql = "SELECT * FROM eleve ORDER BY rand() LIMIT 0,9";
        return $this->db->query($sql)->result();
    }
    public function liste_offres() {
        $sql = "SELECT offres.*,adresse.*,entreprise.* FROM offres
        LEFT JOIN bdd_mer.entreprise ON offres.idEntreprise = entreprise.idEntreprise
        LEFT JOIN bdd_mer.adresse ON entreprise.idAdresse = adresse.idAdresse ";
        return $this->db->query($sql)->result();
    }
    public function liste_domaine_offres() {
        $sql = "SELECT offres.idOffre,demande.*,domaine.Domaine,domaine.idDomaine,domaine.TypeDomaine FROM domaine
        LEFT JOIN bdd_mer.demande ON domaine.idDomaine = demande.idDomaine
        LEFT JOIN bdd_mer.offres ON demande.idOffre = offres.idOffre";
        return $this->db->query($sql)->result();
    }
}
?>
