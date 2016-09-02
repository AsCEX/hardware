<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sheets_model extends CI_Model
{

    public $tbl_sheets = "sheets";
    public $tbl_colors = "colors";
    public $tbl_coils = "coils";

    public function __construct()
    {
        parent::__construct();
    }

    public function getSheetById( $sht_id ) {

        $this->db->select("
            coil_id,
            coil_code,
            sht_id,
            sht_coil_id,
            sht_code,
            sht_length,
            sht_height,
            sht_width,
            sht_clr_id
        ");

        $this->db->where("sht_id", $sht_id);
        $this->db->join($this->tbl_coils, "sht_coil_id = coil_id", "left");
        $this->db->join($this->tbl_colors, "sht_clr_id = clr_id", "left");

        $res = $this->db->get($this->tbl_sheets);

        return $res->row();

    }

    public function getSheetsGrid() {

        $this->db->select("
            coil_id,
            coil_code,
            sht_id,
            sht_coil_id,
            sht_code,
            sht_length,
            sht_height,
            sht_width,
            sht_clr_id,
            sht_qty,
            sht_price,
            clr_name
        ");

        $this->db->join($this->tbl_coils, "sht_coil_id = coil_id", "left");
        $this->db->join($this->tbl_colors, "sht_clr_id = clr_id", "left");

        if($po_id == -1){
            $this->db->where('sht_po_id !=', 0);
        }else{
            $this->db->where('sht_po_id', $po_id);
        }
        $this->db->order_by("sht_po_id", "desc");

        $res = $this->db->get($this->tbl_sheets);

        return $res->result();
    }

    public function save( $data, $sht_id = null) {

        if ( $sht_id ) {

            $this->db->where("sht_id", $sht_id);
            $this->db->update($this->tbl_sheets, $data);

            return $sht_id;
        } else {

            $shtId = $this->db->insert($this->tbl_sheets, $data);

            if ( $shtId ) {
                return $this->db->insert_id();
            }
        }
    }

    public function delete( $data ) {

        $this->db->where( "sht_id", $data['sht_id'] );
        $this->db->delete( $this->tbl_sheets );

        if ( $this->db->affected_rows() > 0 ) return TRUE;
        else return FALSE;
    }

}

?>