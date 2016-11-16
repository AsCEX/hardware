<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materials_model extends CI_Model {

    public $tbl_materials = "materials";

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

    public function getMaterialById( $mat_id ) {

        $this->db->where( "mat_id", $mat_id );

        $res = $this->db->get($this->tbl_materials);

        return $res->row();
    }

    public function save( $data, $mat_id ) {

        if ( $mat_id ) {

            $this->db->where( "mat_id", $mat_id );
            $this->db->update($this->tbl_materials, $data);

            return $mat_id;
        } else {

            if ( $this->db->insert($this->tbl_materials, $data) ) return TRUE;
            else return FALSE;
        }
    }

    public function delete( $data ) {

        $this->db->where( "mat_id", $data['mat_id'] );
        $this->db->delete( $this->tbl_materials );

        if ( $this->db->affected_rows() > 0 ) return TRUE;
        else return FALSE;
    }

}

?>