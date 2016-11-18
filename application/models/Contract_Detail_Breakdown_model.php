<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract_Detail_Breakdown_model extends CI_Model
{
    public $tbl_cdb = "contract_detail_breakdown";

    public function __construct()
    {
        parent::__construct();
    }

    public function save( $data ) {

        if ( isset($data['cdb_id']) ) {

            $whereArr = array("cdb_id" => $data['cdb_id'], "cdb_cd_id" => $data['cd_id']);

            $updateData = array(
                'cdb_qty'           => $data['cdb_qty'],
                'cdb_unit'          => $data['cdb_unit'],
                'cdb_length'     => $data['cdb_length']
            );

            $this->db->where($whereArr);
            $this->db->update($this->tbl_cdb, $updateData);

            return $data['cdb_id'];

        } else {

            $insertData = array(
                'cdb_qty'           => $data['cdb_qty'],
                'cdb_unit'          => $data['cdb_unit'],
                'cdb_length'     => $data['cdb_length'],
                'cdb_cd_id'         => $data['cd_id']
            );

            if ( $this->db->insert( $this->tbl_cdb, $insertData) ) return TRUE;
            else return FALSE;
        }
    }
}


?>