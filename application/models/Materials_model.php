<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materials_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getMaterials(){

        $sql = "SELECT * FROM materials
                LEFT JOIN colors ON clr_id = mat_clr_id";
        $query = $this->db->query($sql);

        return $query->result();
    }

}

?>