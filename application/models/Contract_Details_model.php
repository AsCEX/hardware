<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract_Details_model extends CI_Model
{
    public $tbl_contract_details = "contract_details";

    public function __construct()
    {
        parent::__construct();
    }

    public function save( $data ) {

        if ( $data['cd_id'] ) {

            $updateData = array(
                'cd_p_id'       => $data['cd_p_id'],
                'cd_thickness'  => $data['cd_thickness'],
                'cd_width'      => $data['cd_width'],
                'cd_length'     => $data['cd_length'],
                'cd_qty'        => $data['cd_qty'],
                'cd_unit'       => $data['cd_unit'],
                'cd_unit_price' => $data['cd_unit_price'],
            );

            $this->db->where( "cd_id", $data['cd_id'] );
            $this->db->update($this->tbl_contract_details, $updateData);

            return $data['cd_id'];
        } else {

            $insertData = array(
                'cd_c_id'       => $data['cd_c_id'],
                'cd_p_id'       => $data['cd_p_id'],
                'cd_thickness'  => $data['cd_thickness'],
                'cd_width'      => $data['cd_width'],
                'cd_length'     => $data['cd_length'],
                'cd_qty'        => $data['cd_qty'],
                'cd_unit'       => $data['cd_unit'],
                'cd_unit_price' => $data['cd_unit_price'],
            );

            if ( $this->db->insert( $this->tbl_contract_details, $insertData ) ) return TRUE;
            else return FALSE;
        }
    }

    public function getContractDetailsById( $cd_id ) {

        $this->db->join("products", "p_id = cd_p_id", "left");
        $this->db->join("categories", "cat_id = p_cat_id", "left");
        $this->db->where( "cd_id", $cd_id );
        $contract_detail = $this->db->get($this->tbl_contract_details);

        return $contract_detail->row();
    }
}

?>