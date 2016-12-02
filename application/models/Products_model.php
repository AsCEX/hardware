<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

    public $tbl_products = "products";
    public $tbl_categories = "categories";

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

    public function getRoofingBendedPanels() {

        $this->db->where('p_cat_id !=', 3);
        $this->db->or_where('p_color_id =', 'NULL');
        $this->db->join('categories', 'categories.cat_id = ' . $this->tbl_products .'.p_cat_id');
        $this->db->join('colors', 'colors.clr_id = '. $this->tbl_products .'.p_color_id');
        $res = $this->db->get($this->tbl_products);

        return $res->result();
    }

    public function getRoofingBendedPanelsCategory() {

        $this->db->where("cat_id !=", 3);
        $res = $this->db->get($this->tbl_categories);

        return $res->result();
    }

    public function save( $data ) {

        if ( isset($data['p_id']) ) {

            $whereArr = array("p_id" => $data['p_id']);

            $updateData = array(
                'p_name'        => $data['p_name'],
                'p_cat_id'      => $data['cat_name'],
                'p_unit_price'  => $data['p_unit_price'],
                'p_color_id'    => $data['clr_name'],
                'p_in_stock'    => $data['p_in_stock'],
            );

            $this->db->where($whereArr);
            $this->db->update($this->tbl_products, $updateData);

            return $data['p_id'];

        } else {

            $insertData = array(
                'p_name'        => $data['p_name'],
                'p_cat_id'      => $data['cat_name'],
                'p_unit_price'  => $data['p_unit_price'],
                'p_color_id'    => $data['clr_name'],
                'p_in_stock'    => $data['p_in_stock'],
            );

            if ( $this->db->insert( $this->tbl_products, $insertData) ) return TRUE;
            else return FALSE;
        }
    }

    public function deleteByProductId( $data ) {

        $this->db->where( "p_id", $data['p_id'] );
        $this->db->delete( $this->tbl_products );

        if ( $this->db->affected_rows() > 0 ) return TRUE;
        else return FALSE;
    }

    public function getHardwareAccessories() {

        $this->db->where('p_cat_id =', 3);
        $this->db->or_where('p_color_id =', 'NULL');
        $this->db->join('categories', 'categories.cat_id = ' . $this->tbl_products .'.p_cat_id');
        $this->db->join('colors', 'colors.clr_id = '. $this->tbl_products .'.p_color_id');
        $res = $this->db->get($this->tbl_products);

        return $res->result();
    }

}
