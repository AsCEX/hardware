<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coils_model extends CI_Model {
  
    private $tbl_coils = "coils";
    private $tbl_user_info = "user_informations";
    private $tbl_color = "colors";

    public function __construct()
    {
      parent::__construct();
    }

    public function getCoilsGrid() 
    {
      $this->db->select("*");
      $this->db->join($this->tbl_color, "coil_clr_id = clr_id", "left");
      $this->db->join($this->tbl_user_info, "coil_created_by = ui_id", "left");
      $this->db->order_by("coil_created_date", "asc");
      $rs = $this->db->get($this->tbl_coils);
      return $rs->result();
    }

    public function getCoilById( $coil_id ) 
    {
      $this->db->select("*");
      $this->db->where( "coil_id", $coil_id );
      $this->db->join($this->tbl_color, "coil_clr_id = clr_id", "left");
      $this->db->join($this->tbl_user_info, "coil_created_by = ui_id", "left");
      $rs = $this->db->get($this->tbl_coils);
      return $rs->row();
    }

    public function save( $data, $coil_id = null, $coil_created_by = null ) 
    {

      $created_by = $this->saveUserInfo( $data, $coil_id );
      $data = array(
        'supp_ui_id'    => $created_by,
        'supp_status'   => 1,
        'supp_company'  => $data['supp_company'],
      );
    

      if ( $supp_id ) {
        $this->db->where("supp_id", $supp_id);
        $this->db->update($this->tbl_suppliers, $data);
        return $supp_id;
      } else {
        $supplier = $this->db->insert($this->tbl_suppliers, $data);
        if ( $supplier ) {
          return $this->db->insert_id();
        } else {
          return false;
        }
      }
    }

    public function saveUserInfo( $data, $coil_id = null ) 
    {
      $coilData = array(
        'coil_code'           => $data['coil_code'],
        'coil_length'         => $data['coil_length'],
        'coil_height'         => $data['coil_height'],
        'coil_width'          => $data['coil_width'],
        'coil_clr_id'         => $data['coil_clr_id'],
        'coil_created_by'     => $data['coil_created_by'],
      );

      if ( $coil_id ) {
        $this->db->where('coil_id', $data['coil_id']);
        $this->db->update($this->tbl_coils, $coilData);
        return $coil_id;
      } else {
        $coilData['coil_created_date'] = date('Y-m-d H:i:s');
        $coilInfo = $this->db->insert($this->tbl_coils, $coilData);
        if ( $coilInfo ) {
          return $this->db->insert_id();
        } else {
          return false;
        }
      }
    }

    public function delete( $data ) 
    {
      $this->db->where( "coil_id", $data['coil_id'] );
      $this->db->delete( $this->tbl_coils);
      if ( $this->db->affected_rows() > 0 ) return TRUE;
      else return FALSE;
    }
}