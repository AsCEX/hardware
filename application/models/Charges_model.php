<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charges_model extends CI_Model
{
    public $tbl_charges = "charges";
    public $tbl_charge_types = "charge_types";

    public function __construct()
    {
        parent::__construct();
    }

    public function getChargeById( $chrg_id ) {

        $this->db->select("chrg_id, chrg_name, chrg_type, chrg_type_name");
        $this->db->from($this->tbl_charges);
        $this->db->where("chrg_id", $chrg_id);
        $this->db->join($this->tbl_charge_types, $this->tbl_charge_types.".chrg_type_id = " . $this->tbl_charges.".chrg_type");
        $charge = $this->db->get();

        return $charge->row();
    }

    public function getChargesGrid() {

        $this->db->select("chrg_id, chrg_name, chrg_type_name");
        $this->db->from($this->tbl_charges);
        $this->db->join($this->tbl_charge_types, $this->tbl_charge_types.".chrg_type_id = " . $this->tbl_charges.".chrg_type");
        $charges = $this->db->get();

        return $charges->result();
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

    public function delete( $data ) {

        $this->db->where( "chrg_id", $data['chrg_id'] );
        $this->db->delete( $this->tbl_charges );

        if ( $this->db->affected_rows() > 0 ) return TRUE;
        else return FALSE;
    }
}

?>