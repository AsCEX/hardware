<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colors_model extends CI_Model {

    public $tbl_colors = "colors";

    public function __construct()
    {
        parent::__construct();
    }

    public function getColorsGrid() {

        $this->db->select("*");
        $colors = $this->db->get($this->tbl_colors);

        return $colors->result();
    }

    public function getColorById( $clr_id ) {

        $this->db->select("clr_id,clr_name,clr_hex");
        $this->db->where("clr_id", $clr_id);
        $color = $this->db->get($this->tbl_colors);

        return $color->row();
    }

    public function save( $data, $clrId = null ) {

        if ( $clrId ) {

            $this->db->where("clr_id", $clrId);
            $this->db->update($this->tbl_colors, $data);

            return $clrId;
        } else {

            if ( $this->db->insert($this->tbl_colors, $data) ) return TRUE;
            else return FALSE;
        }
    }

    public function delete( $data ) {

        $this->db->where( "clr_id", $data['clr_id'] );
        $this->db->delete( $this->tbl_colors );

        if ( $this->db->affected_rows() > 0 ) return TRUE;
        else return FALSE;
    }
}

?>