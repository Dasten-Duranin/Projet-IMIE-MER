<?php
    class Model_Eleves extends CI_Model {

        public function __construct() {
            parent::__construct();
        }

        public function check_login($login){
            $sql = "SELECT * from utilisateur WHERE Login=?";
            return ($this->db->query($sql,array($login))->num_rows()>0);
        }
    }

?>