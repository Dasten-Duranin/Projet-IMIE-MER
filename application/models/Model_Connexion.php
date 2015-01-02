<?php
class Model_Connexion extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function check_connect($login, $mdp){
        $sql = "SELECT * from utilisateur WHERE Login=? AND Mdp=?";
        return ($this->db->query($sql,array($login, $mdp))->num_rows()>0);
    }

}
