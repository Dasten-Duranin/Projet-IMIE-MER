<?php
class Model_Inscription extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function check_logs($login){
        $sql = "SELECT * from utilisateur WHERE Login=?";
        return ($this->db->query($sql,array($login))->num_rows()>0);
    }

    public function check_NomEntreprise($NomEntreprise){
        $sql = "SELECT * from Entreprise WHERE NomEntreprise=?";
        return ($this->db->query($sql,array($NomEntreprise))->num_rows()>0);
    }

    public function insert_logs($login, $mdp) {
        $sql = "INSERT INTO bdd_mer.utilisateur (idUtilisateur, Login, Mdp, idEleve, idEntreprise) VALUES (NULL, ?, ?, NULL, NULL)";
        $this->db->query($sql, array($login, $mdp));
        $lastId = ($this->db->insert_id());
        return ($lastId);
    }

    public function insert_adresse($TypeVoie, $NomVoie, $NumVoie, $CP, $Ville, $Pays) {
        $sql = "INSERT INTO bdd_mer.adresse (TypeVoie, NomVoie, NumVoie, CP, Ville, Pays, idAdresse) VALUES (?, ?, ?, ?, ?, ?, NULL)";
        $this->db->query($sql, array($TypeVoie, $NomVoie, $NumVoie, $CP, $Ville, $Pays));
        $lastId = ($this->db->insert_id());
        return ($lastId);
    }

    public function insert_eleve($Nom, $Prenom, $Sexe, $DateNaiss, $LieuNaiss, $TelEleve, $EmailEleve/*, $PhotoProfil*/, $GitHub, $DoYouBuzz, $Linkedin, $Twitter, $Accroche, $Descriptif, $Alternance, $Stage, $idAdresse, $idUtilisateur, $Classe) {
        $sql = "INSERT INTO bdd_mer.eleve (idEleve, Nom, Prenom, Sexe, DateNaiss, LieuNaiss, TelEleve, EmailEleve, PhotoProfil, GitHub, DoYouBuzz, Linkedin, Twitter, Accroche, Descriptif, Alternance, Stage, idAdresse, idUtilisateur, Classe) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, array($Nom, $Prenom, $Sexe, $DateNaiss, $LieuNaiss, $TelEleve, $EmailEleve/*, $PhotoProfil*/, $GitHub, $DoYouBuzz, $Linkedin, $Twitter, $Accroche, $Descriptif, $Alternance, $Stage, $idAdresse, $idUtilisateur, $Classe));
        $lastId = ($this->db->insert_id());
        return ($lastId);
    }

    public function insert_entreprise($NomEntreprise, $TelEntreprise, $FaxEntreprise, $EmailEntreprise, $DescriptifEntreprise, $Stagiaire, $Alternant, $Employe, $idAdresse, $idUtilisateur) {
        $sql = "INSERT INTO bdd_mer.entreprise (idEntreprise, LogoEntreprise, NomEntreprise, TelEntreprise, FaxEntreprise, EmailEntreprise, DescriptifEntreprise, Stagiaire, Alternant, Employe, idAdresse, idUtilisateur) VALUES (NULL, NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, array($NomEntreprise, $TelEntreprise, $FaxEntreprise, $EmailEntreprise, $DescriptifEntreprise, $Stagiaire, $Alternant, $Employe, $idAdresse, $idUtilisateur));
        $lastId = ($this->db->insert_id());
        return ($lastId);
    }

    public function liste_classes() {
        $sql = 'SELECT * FROM classes';
        return $this->db->query($sql)->result();
    }

    public function liste_domaine_developpement() {
        $sql = 'SELECT Domaine, idDomaine FROM domaine WHERE TypeDomaine="Developpement"';
        return $this->db->query($sql)->result();
    }

    public function liste_domaine_reseau() {
        $sql = 'SELECT Domaine, idDomaine FROM domaine WHERE TypeDomaine="Reseau"';
        return $this->db->query($sql)->result();
    }

    public function insert_souhait_eleve($idDomaine, $idEleve) {
        $sql = 'INSERT INTO bdd_mer.souhaite (idDomaine, idEleve) VALUES (?, ?)';
        $this->db->query($sql, array($idDomaine, $idEleve));
    }

    public function insert_domaine_entreprises($idDomaine, $idEntreprise) {
        $sql = 'INSERT INTO bdd_mer.fait (idDomaine, idEntreprise) VALUES (?, ?)';
        $this->db->query($sql, array($idDomaine, $idEntreprise));
    }

    public function insert_idEleve_On_Utilisateur($idEleve, $idUtilisateur) {
        $sql = 'UPDATE bdd_mer.utilisateur SET idEleve = ? WHERE utilisateur.idUtilisateur = ?';
        $this->db->query($sql, array($idEleve, $idUtilisateur));
    }

    public function insert_idEntreprise_On_Utilisateur($idEntreprise, $idUtilisateur) {
        $sql = 'UPDATE bdd_mer.utilisateur SET idEntreprise = ? WHERE utilisateur.idUtilisateur = ?';
        $this->db->query($sql, array($idEntreprise, $idUtilisateur));
    }

}

/*
$this->db->insert_id();
SELECT LAST_INSERT_ID() FROM utilisateur
$data = array(
'Login' => $login ,
'Mdp' => $mdp ,
);

UPDATE bdd_mer.utilisateur SET idEleve = '6' WHERE utilisateur.idUtilisateur = 5;

$this->db->insert('utilisateur', $data);
*/

?>
