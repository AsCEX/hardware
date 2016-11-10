<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract_Charges_model extends CI_Model
{
    public $tbl_contract_charges = "contract_charges";

    public function __construct()
    {
        parent::__construct();
    }

    public function save( $data ) {

        if ( $data['cc_id'] ) {

            $updateData = array(
                'cc_c_id'       => $data['cc_c_id'],
                'cc_chrg_id'    => $data['chrg_name'],
                'cc_amount'     => $data['cc_amount'],
            );

            $this->db->where( "cc_id", $data['cc_id'] );
            $this->db->update($this->tbl_contract_charges, $updateData);

            return $data['cc_id'];

        } else {
            $insertData = array(
                'cc_c_id'       => $data['cc_c_id'],
                'cc_chrg_id'    => $data['chrg_name'],
                'cc_amount'     => $data['cc_amount'],
            );

            if ( $this->db->insert($this->tbl_contract_charges, $insertData) ) return TRUE;
            else return FALSE;
        }
    }

    public function getContractChargeById( $cc_id ) {

        $this->db->join("charges", "chrg_id = cc_chrg_id", "left");
        $this->db->join("charge_types", "chrg_type_id = chrg_type", "left");
        $this->db->where( "cc_id", $cc_id );
        $contract_charge = $this->db->get($this->tbl_contract_charges);
        return $contract_charge->row();
    }
}


?>