<?php
    class Model_Profil extends CI_Model {

        public function __construct() {
            parent::__construct();
        }

        public function check_login($login){
            $sql = "SELECT * from utilisateur WHERE Login=?";
            return ($this->db->query($sql,array($login))->num_rows()>0);
        }

        public function eleve_by_id($idEleve) {
            $sql = "SELECT eleve.* FROM bdd_mer.eleve WHERE idEleve =?";
            return $this->db->query($sql, array($idEleve))->row();
        }

        public function adresse_by_id($idAdresse) {
            $sql = "SELECT * FROM adresse WHERE idAdresse=?";
            return $this->db->query($sql, array($idAdresse))->row();
        }

        public function domaine_by_eleve($idEleve) {
            $sql = "SELECT souhaite.idEleve,domaine.logoDomaine,domaine.Domaine FROM souhaite
            LEFT JOIN bdd_mer.domaine ON souhaite.idDomaine = domaine.idDomaine
            WHERE idEleve = ?";
            return $this->db->query($sql, array($idEleve))->result();
        }

        public function idEleve_idEntreprise_dy_login($login) {
            $sql = "SELECT idEntreprise, idEleve FROM utilisateur WHERE Login=?";
            return $this->db->query($sql, array($login))->row();
        }




        public function entreprise_by_id($idEntreprise) {
            $sql = "SELECT entreprise.*,adresse.* FROM entreprise
            LEFT JOIN bdd_mer.adresse ON entreprise.idAdresse = adresse.idAdresse WHERE entreprise.idEntreprise = ?";
            return $this->db->query($sql, array($idEntreprise))->row();
        }
        public function domaine_by_entreprise($idEntreprise) {
            $sql = "SELECT fait.idEntreprise,domaine.logoDomaine,domaine.Domaine FROM fait
            LEFT JOIN bdd_mer.domaine ON fait.idDomaine = domaine.idDomaine
            WHERE idEntreprise = ?";
            return $this->db->query($sql, array($idEntreprise))->result();
        }
    }
?>
