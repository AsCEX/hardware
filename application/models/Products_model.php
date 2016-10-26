<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

    public $tbl_colors = "colors";

    public function __construct()
    {
        parent::__construct();
    }


    public function getProducts( $clr_id ) {

        $sql = "SELECT * FROM products";

        $query = $this->db->query($sql);

        return $query->result();
    }


    public function getProductByCategory( $cat_id = null ) {

        $sql = "SELECT * FROM products WHERE p_cat_id = ?";

        $query = $this->db->query($sql, array($cat_id));

        return $query->result();
    }

}
