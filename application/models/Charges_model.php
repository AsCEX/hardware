<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charges_model extends CI_Model
{
    public $tbl_charges = "charges";

    public function __construct()
    {
        parent::__construct();
    }

    public function getChargesComboBox() {

    }

    public function getChargesByChargeTypeId ( $chrg_type_id ) {

        $this->db->select( "chrg_id, chrg_name" );
        $this->db->where( 'chrg_type', $chrg_type_id );
        $charge = $this->db->get( $this->tbl_charges );

        return $charge->result();
    }

    public function save( $data, $chrg_id ) {

        if ( $chrg_id ) {

            $this->db->where( 'chrg_id', $chrg_id );
            $this->db->update( $this->tbl_charges, $data );

            return $chrg_id;
        } else {

            if ( $this->db->insert( $this->tbl_charges, $data ) ) return TRUE;
            else return FALSE;
        }
    }
}

?>