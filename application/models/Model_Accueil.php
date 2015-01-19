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
}
?>
