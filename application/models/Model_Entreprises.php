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

        public function liste_souhaits() {
            $sql = 'SELECT domaine.Domaine,domaine.TypeDomaine,souhaite.idDomaine,souhaite.idEleve FROM souhaite
            LEFT JOIN bdd_mer.domaine ON souhaite.idDomaine = domaine.idDomaine';
            return $this->db->query($sql)->result();
        }

        public function liste_domaine_eleves() {
            $sql = 'SELECT domaine.Domaine,domaine.TypeDomaine FROM domaine';
            return $this->db->query($sql)->result();
        }

        public function liste_villes_entreprises() {
            $sql = 'SELECT adresse.Ville,entreprise.idAdresse,adresse.idAdresse FROM adresse, entreprise WHERE adresse.idAdresse = entreprise.idAdresse GROUP BY Ville';
            return $this->db->query($sql)->result();
        }

        public function liste_classes_eleves() {
            $sql = 'SELECT DISTINCT eleve.Classe FROM eleve';
            return $this->db->query($sql)->result();
        }

        public function liste_domaine_entreprise() {
           $sql= "SELECT fait.*,domaine.TypeDomaine,domaine.Domaine,domaine.idDomaine FROM fait
            LEFT JOIN bdd_mer.domaine ON fait.idDomaine = domaine.idDomaine";
            return $this->db->query($sql)->result();

        }

       /* public function adresse_entreprise () {
            $sql= 

        }*/


    /*
    public function liste_livres() {
        $sql = 'select * FROM Livre';
        return $this->db->query($sql)->result();
    }
    public function ajouter_livres($titre, $auteur) {
        $sql = 'INSERT INTO Livre (titre, auteur) VALUES (?, ?)';
        return $this->db->query($sql, array($titre, $auteur));
    }
    public function Modifier_livres($titre, $auteur, $id) {
        $sql = 'UPDATE Livre SET titre=? , auteur=? WHERE id=?';
        return $this->db->query($sql, array($titre, $auteur, $id));
    }
    public function Supprimer_livres($id) {
        $sql = 'DELETE FROM bibliotheque.Livre WHERE id =?';
        return $this->db->query($sql, array($id));

    public function check_connect ($login,$mdp){
        $sql='SELECT.......'
    }
    }*/
}
?>
