<?php
    class Model_EditionProfil extends CI_Model {

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
        public function idEleve_idEntreprise_dy_login($login) {
            $sql = 'SELECT idEntreprise, idEleve, idUtilisateur FROM utilisateur WHERE Login=?';
            return $this->db->query($sql, array($login))->row();
        }

        public function adresse_by_id($idAdresse) {
            $sql = 'SELECT * FROM adresse WHERE idAdresse=?';
            return $this->db->query($sql, array($idAdresse))->row();
        }

        public function liste_domaine_developpement() {
            $sql = 'SELECT Domaine, idDomaine FROM domaine WHERE TypeDomaine="Developpement"';
            return $this->db->query($sql)->result();
        }

        public function liste_domaine_reseau() {
            $sql = 'SELECT Domaine, idDomaine FROM domaine WHERE TypeDomaine="Reseau"';
            return $this->db->query($sql)->result();
        }

                        /*****************************************************/
                        /******************Affichage d'élève******************/
                        /*****************************************************/


        public function eleve_by_id($idEleve) {
            $sql = 'SELECT eleve.* FROM bdd_mer.eleve WHERE idEleve =?';
            return $this->db->query($sql, array($idEleve))->row();
        }

        public function domaines_reseau_by_eleve($idEleve) {
            $sql = 'SELECT souhaite.idEleve,domaine.logoDomaine,domaine.Domaine,domaine.TypeDomaine FROM souhaite
            LEFT JOIN bdd_mer.domaine ON souhaite.idDomaine = domaine.idDomaine
            WHERE idEleve = ? AND TypeDomaine="Reseau"' ;
            return $this->db->query($sql, array($idEleve))->result();
        }

        public function domaines_developpement_by_eleve($idEleve) {
            $sql = 'SELECT souhaite.idEleve,domaine.logoDomaine,domaine.Domaine,domaine.TypeDomaine FROM souhaite
            LEFT JOIN bdd_mer.domaine ON souhaite.idDomaine = domaine.idDomaine
            WHERE idEleve = ? AND TypeDomaine="Developpement"' ;
            return $this->db->query($sql, array($idEleve))->result();
        }

        public function liste_classes() {
            $sql = 'SELECT * FROM classes';
            return $this->db->query($sql)->result();
        }



                    /**********************************************************/
                    /******************Affichage d'entreprise******************/
                    /**********************************************************/


        public function entreprise_by_id($idEntreprise) {
            $sql = 'SELECT entreprise.* FROM bdd_mer.entreprise WHERE idEntreprise =?';
            return $this->db->query($sql, array($idEntreprise))->row();
        }

        public function domaines_reseau_by_entreprise($idEntreprise) {
            $sql = 'SELECT fait.idEntreprise,domaine.logoDomaine,domaine.Domaine,domaine.TypeDomaine FROM fait
            LEFT JOIN bdd_mer.domaine ON fait.idDomaine = domaine.idDomaine
            WHERE idEntreprise = ? AND TypeDomaine="Reseau"' ;
            return $this->db->query($sql, array($idEntreprise))->result();
        }

        public function domaines_developpement_by_entreprise($idEntreprise) {
            $sql = 'SELECT fait.idEntreprise,domaine.logoDomaine,domaine.Domaine,domaine.TypeDomaine FROM fait
            LEFT JOIN bdd_mer.domaine ON fait.idDomaine = domaine.idDomaine
            WHERE idEntreprise = ? AND TypeDomaine="Developpement"' ;
            return $this->db->query($sql, array($idEntreprise))->result();
        }




/*       ▄         ▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄   ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄
        ▐░▌       ▐░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░▌ ▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌
        ▐░▌       ▐░▌▐░█▀▀▀▀▀▀▀█░▌▐░█▀▀▀▀▀▀▀█░▌▐░█▀▀▀▀▀▀▀█░▌ ▀▀▀▀█░█▀▀▀▀ ▐░█▀▀▀▀▀▀▀▀▀ ▐░█▀▀▀▀▀▀▀▀▀
        ▐░▌       ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌     ▐░▌     ▐░▌          ▐░▌
        ▐░▌       ▐░▌▐░█▄▄▄▄▄▄▄█░▌▐░▌       ▐░▌▐░█▄▄▄▄▄▄▄█░▌     ▐░▌     ▐░█▄▄▄▄▄▄▄▄▄ ▐░█▄▄▄▄▄▄▄▄▄
        ▐░▌       ▐░▌▐░░░░░░░░░░░▌▐░▌       ▐░▌▐░░░░░░░░░░░▌     ▐░▌     ▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌
        ▐░▌       ▐░▌▐░█▀▀▀▀▀▀▀▀▀ ▐░▌       ▐░▌▐░█▀▀▀▀▀▀▀█░▌     ▐░▌     ▐░█▀▀▀▀▀▀▀▀▀  ▀▀▀▀▀▀▀▀▀█░▌
        ▐░▌       ▐░▌▐░▌          ▐░▌       ▐░▌▐░▌       ▐░▌     ▐░▌     ▐░▌                    ▐░▌
        ▐░█▄▄▄▄▄▄▄█░▌▐░▌          ▐░█▄▄▄▄▄▄▄█░▌▐░▌       ▐░▌     ▐░▌     ▐░█▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄█░▌
        ▐░░░░░░░░░░░▌▐░▌          ▐░░░░░░░░░░▌ ▐░▌       ▐░▌     ▐░▌     ▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌
         ▀▀▀▀▀▀▀▀▀▀▀  ▀            ▀▀▀▀▀▀▀▀▀▀   ▀         ▀       ▀       ▀▀▀▀▀▀▀▀▀▀▀  ▀▀▀▀▀▀▀▀▀▀▀
*/

                            /***********************/
                            /********Général********/
                            /***********************/



        public function update_adresse($TypeVoie, $NomVoie, $NumVoie, $CP, $Ville, $Pays, $idAdresse) {
            $sql = 'UPDATE bdd_mer.adresse SET TypeVoie = ?, NomVoie = ?, NumVoie = ?, CP = ?, Ville = ?, Pays = ? WHERE adresse.idAdresse = ?';
            $this->db->query($sql, array($TypeVoie, $NomVoie, $NumVoie, $CP, $Ville, $Pays, $idAdresse));
        }

                        /****************************/
                        /***********Élèves***********/
                        /****************************/



        public function update_eleve($Nom, $Prenom, $Sexe, $DateNaiss, $LieuNaiss, $TelEleve, $EmailEleve/*, $PhotoProfil*/, $GitHub, $DoYouBuzz, $Linkedin, $Twitter, $Accroche, $Descriptif, $Alternance, $Stage, $Classe, $idEleve) {
            $sql = 'UPDATE bdd_mer.eleve SET Nom = ?, Prenom = ?, Sexe = ?, DateNaiss = ?, LieuNaiss = ?, TelEleve = ?, EmailEleve = ?, GitHub = ?, DoYouBuzz = ?, Linkedin = ?, Twitter = ?, Accroche = ?, Descriptif = ?, Alternance = ?, Stage = ?, Classe = ? WHERE eleve.idEleve = ?';
            $this->db->query($sql, array($Nom, $Prenom, $Sexe, $DateNaiss, $LieuNaiss, $TelEleve, $EmailEleve/*, $PhotoProfil*/, $GitHub, $DoYouBuzz, $Linkedin, $Twitter, $Accroche, $Descriptif, $Alternance, $Stage, $Classe, $idEleve));
        }

        public function delete_domaines_eleves($idEleve) {
            $sql = 'DELETE FROM bdd_mer.souhaite WHERE souhaite.idEleve = ?';
            $this->db->query($sql, array($idEleve));
        }

        public function insert_souhait_eleve($idDomaine, $idEleve) {
            $sql = 'INSERT INTO bdd_mer.souhaite (idDomaine, idEleve) VALUES (?, ?)';
            $this->db->query($sql, array($idDomaine, $idEleve));
        }

                        /********************************/
                        /***********Entreprise***********/
                        /********************************/



        /*public function check_nom_entreprise($NomEntreprise) {
            $sql = "SELECT * from entreprise WHERE NomEntreprise =?";
            return ($this->db->query($sql,array($NomEntreprise))->num_rows()>0);
        }*/

        public function update_entreprise($NomEntreprise, $TelEntreprise, $FaxEntreprise, $EmailEntreprise, $DescriptifEntreprise, $Stagiaire, $Alternant, $Employe, $idEntreprise) {
            $sql = 'UPDATE bdd_mer.entreprise SET NomEntreprise = ?, TelEntreprise = ?, FaxEntreprise = ?, EmailEntreprise = ?, DescriptifEntreprise = ?, Stagiaire = ?, Alternant = ?, Employe = ? WHERE entreprise.idEntreprise = ?';
            $this->db->query($sql, array($NomEntreprise, $TelEntreprise, $FaxEntreprise, $EmailEntreprise, $DescriptifEntreprise, $Stagiaire, $Alternant, $Employe, $idEntreprise));
        }

        public function delete_domaines_entreprise($idEntreprise) {
            $sql = 'DELETE FROM bdd_mer.fait WHERE fait.idEntreprise = ?';
            $this->db->query($sql, array($idEntreprise));
        }

        public function insert_fait_entreprise($idDomaine, $idEntreprise) {
            $sql = 'INSERT INTO bdd_mer.fait (idDomaine, idEntreprise) VALUES (?, ?)';
            $this->db->query($sql, array($idDomaine, $idEntreprise));
        }



                    /**********************************/
                    /***********Identifients***********/
                    /**********************************/


        public function check_logs($login, $MDP) {
            $sql = "SELECT * from utilisateur WHERE Login=? AND Mdp=?";
            return ($this->db->query($sql,array($login, $MDP))->num_rows()>0);
        }

        public function update_login($login, $OldLogin) {
            $sql = "UPDATE bdd_mer.utilisateur SET Login = ? WHERE utilisateur.Login = ?";
            $this->db->query($sql, array($login, $OldLogin));
        }

        public function update_mdp($Mdp, $login) {
            $sql = "UPDATE bdd_mer.utilisateur SET Mdp = ? WHERE utilisateur.Login = ?";
            $this->db->query($sql, array($Mdp, $login));
        }


    }

/*doxygen*/
?>
