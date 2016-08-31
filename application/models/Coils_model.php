<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coils_model extends CI_Model {
  
    private $tbl_coils = "coils";
    private $tbl_user_info = "user_informations";
    private $tbl_color = "colors";
    private $tbl_suppliers = "suppliers";
    private $tbl_deliveries = "deliveries";

    public function __construct()
    {
      parent::__construct();
    }

    public function getCoilsGrid($dr_id = null)
    {
        $this->db->select("*");
        $this->db->join($this->tbl_color, "coil_clr_id = clr_id", "left");
        $this->db->join($this->tbl_user_info, "coil_created_by = ui_id", "left");
        $this->db->join($this->tbl_deliveries, "coil_dr_id = dr_id", "left");
        $this->db->join($this->tbl_suppliers, "dr_supp_id = supp_id", "left");
        if($dr_id == -1){
            $this->db->where('coil_dr_id !=', 0);
        }else{
            $this->db->where('coil_dr_id', $dr_id);
        }
        $this->db->order_by("coil_dr_id", "desc");
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

    public function save( $data, $coil_id = null, $temp = false )
    {
       if($temp){

           $deliveries = $this->session->userdata('deliveries');

           $deliveries[] = $data;

           $this->session->set_userdata('deliveries', $deliveries);

       }else{
           if ( $coil_id ) {
               $this->db->where("coil_id", $coil_id);
               $this->db->update($this->tbl_coils, $data);
               return $coil_id;
           } else {
               $coils = $this->db->insert($this->tbl_coils, $data);
               if ( $coils ) {
                   return $this->db->insert_id();
               } else {
                   return false;
               }
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