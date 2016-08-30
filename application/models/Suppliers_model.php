<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suppliers_model extends CI_Model {
  
    private $tbl_suppliers = "suppliers";
    private $tbl_user_info = "user_informations";

    public function __construct()
    {
      parent::__construct();
    }

    public function getSuppliersGrid() 
    {
      $this->db->select("*");
      $this->db->where( "supp_status", 1 );
      $this->db->join($this->tbl_user_info, "supp_ui_id = ui_id", "left");
      $this->db->order_by("ui_lastname", "asc");
      $rs = $this->db->get($this->tbl_suppliers);
      return $rs->result();
    }

    public function getSupplierById( $supp_id ) 
    {
      $this->db->select("*");
      $this->db->where( "supp_id", $supp_id );
      $this->db->where( "supp_status", 1 );
      $this->db->join($this->tbl_user_info, "supp_ui_id = ui_id", "left");

      $rs = $this->db->get($this->tbl_suppliers);

      return $rs->row();
    }

    public function save( $data, $supp_id = null, $supp_ui_id = null ) 
    {
      $ui_id = $this->saveUserInfo( $data, $supp_ui_id );
      $data = array(
        'supp_ui_id'    => $ui_id,
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

    public function saveUserInfo( $data, $supp_ui_id = null ) 
    {
      $userData = array(
        'ui_firstname'      => $data['ui_firstname'],
        'ui_middlename'     => $data['ui_middlename'],
        'ui_lastname'       => $data['ui_lastname'],
        'ui_extname'        => $data['ui_extname'],
        'ui_address'        => $data['ui_address'],
        'ui_address2'       => $data['ui_address2'],
        'ui_zip'            => $data['ui_zip'],
        'ui_contact_number' => $data['ui_contact_number'],
      );

      if ( $supp_ui_id ) {
        $this->db->where('ui_id', $data['supp_ui_id']);
        $this->db->update($this->tbl_user_info, $userData);
        return $supp_ui_id;
      } else {
        $userInfo = $this->db->insert($this->tbl_user_info, $userData);
        if ( $userInfo ) {
          return $this->db->insert_id();
        } else {
          return false;
        }
      }
    }

    public function delete( $data ) 
    {
      $this->db->set( "supp_status", 0 );
      $this->db->where( "supp_id", $data['supp_id'] );
      $this->db->update( $this->tbl_suppliers );
      if ( $this->db->affected_rows() > 0 ) return TRUE;
      else return FALSE;
    }

}