<?php
class Model_Accueil extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    /************************/
    /********sécurité********/
    /************************/

    public function check_login($login){
        $sql = "SELECT * from utilisateur WHERE Login=?";
        return ($this->db->query($sql,array($login))->num_rows()>0);
    }

    /**********************/
    /********Offres********/
    /**********************/

    public function Offres_random() {
        $sql = "SELECT offres.*,entreprise.LogoEntreprise,entreprise.NomEntreprise,entreprise.EmailEntreprise,adresse.* FROM offres
        LEFT JOIN bdd_mer.entreprise ON offres.idEntreprise = entreprise.idEntreprise
        LEFT JOIN bdd_mer.adresse ON entreprise.idAdresse = adresse.idAdresse
        ORDER BY rand() LIMIT 0,5";
        return $this->db->query($sql)->result();
    }
    public function domaines_offres() {
        $sql = "SELECT domaine.idDomaine,domaine.Domaine,domaine.logoDomaine,demande.* FROM domaine
        LEFT JOIN bdd_mer.demande ON domaine.idDomaine = demande.idDomaine";
        return $this->db->query($sql)->result();
    }


    /**********************/
    /********Eleves********/
    /**********************/

    public function eleves_random() {
        $sql = "SELECT * FROM eleve ORDER BY rand() LIMIT 0,9";
        return $this->db->query($sql)->result();
    }
}
?>
