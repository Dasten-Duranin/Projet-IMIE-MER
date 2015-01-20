<?php
    class Model_DetailsOffre extends CI_Model {

        public function __construct() {
            parent::__construct();
        }

        public function check_login($login) {
            $sql = "SELECT * from utilisateur WHERE Login=?";
            return ($this->db->query($sql,array($login))->num_rows()>0);
        }
        public function idEleve_idEntreprise_dy_login($login) {
            $sql = 'SELECT idEntreprise, idEleve, idUtilisateur FROM utilisateur WHERE Login=?';
            return $this->db->query($sql, array($login))->row();
        }
        public function Offre_By_Entrepris($idOffre, $idEntreprise) {
            $sql = 'SELECT offres.*,entreprise.LogoEntreprise,entreprise.NomEntreprise,entreprise.EmailEntreprise,adresse.* FROM offres
            LEFT JOIN bdd_mer.entreprise ON offres.idEntreprise = entreprise.idEntreprise
            LEFT JOIN bdd_mer.adresse ON entreprise.idAdresse = adresse.idAdresse WHERE offres.idOffre =? AND entreprise.idEntreprise= ?';
            return $this->db->query($sql, array($idOffre, $idEntreprise))->row();
        }
        public function domaine_by_offre($idOffre) {
            $sql = 'SELECT demande.idOffre,domaine.logoDomaine,domaine.Domaine FROM demande
            LEFT JOIN bdd_mer.domaine ON demande.idDomaine = domaine.idDomaine
            WHERE idOffre = ?';
            return $this->db->query($sql, array($idOffre))->result();
        }
    }
?>
