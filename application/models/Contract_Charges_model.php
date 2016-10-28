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

        $insertData = array(
            'cc_c_id'       => $data['cc_c_id'],
            'cc_chrg_id'    => $data['chrg_name'],
            'cc_amount'     => $data['cc_amount'],
        );

        if ( $this->db->insert($this->tbl_contract_charges, $insertData) ) return TRUE;
        else return FALSE;
    }
}


?>