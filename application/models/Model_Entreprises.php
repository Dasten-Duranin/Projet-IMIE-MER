<?php
    class Model_Entreprises extends CI_Model {

        public function __construct() {
            parent::__construct();
        }

        public function check_login($login){
            $sql = "SELECT * from utilisateur WHERE Login=?";
            return ($this->db->query($sql,array($login))->num_rows()>0);
        }

        public function liste_entreprises() {
            $sql = "SELECT entreprise.*,adresse.*/*,adresse.*,entreprise.* */FROM entreprise
                    LEFT JOIN bdd_mer.adresse ON entreprise.idAdresse = adresse.idAdresse ";
            return $this->db->query($sql)->result();
        }

        public function liste_fait() {
            $sql = 'SELECT domaine.Domaine,domaine.TypeDomaine,fait.idDomaine,fait.idEntreprise FROM fait
            LEFT JOIN bdd_mer.domaine ON fait.idDomaine = domaine.idDomaine';
            return $this->db->query($sql)->result();
        }

        public function liste_villes_entreprises() {
            $sql = 'SELECT adresse.Ville,entreprise.idAdresse,adresse.idAdresse FROM adresse, entreprise WHERE adresse.idAdresse = entreprise.idAdresse GROUP BY Ville';
            return $this->db->query($sql)->result();
        }

        public function liste_domaine_entreprise() {
           $sql= "SELECT fait.*,domaine.TypeDomaine,domaine.Domaine,domaine.idDomaine FROM fait
            LEFT JOIN bdd_mer.domaine ON fait.idDomaine = domaine.idDomaine GROUP BY domaine.Domaine";
            return $this->db->query($sql)->result();

        }



}
?>
