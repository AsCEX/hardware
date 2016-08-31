<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deliveries_model extends CI_Model
{
    public $tbl_deliveries = "deliveries";
    public $tbl_delivery_details = "delivery_details";
    public $tbl_suppliers = "suppliers";
    public $tbl_user_info = "user_informations";

    public function __construct()
    {
        parent::__construct();
    }

    public function getDeliveriesGrid() {

        $this->db->select("
                dr_id,
                dr_delivery_date,
                dr_created_date,
                supp_company,
                CONCAT_WS(' ', ui_firstname, ui_middlename, ui_lastname, ui_extname) as fullname,
                ui_address,
                ui_address2,
                ui_zip,
                ui_contact_number
        ");

        $this->db->join($this->tbl_suppliers, "supp_id = dr_supp_id", "left");
        $this->db->join($this->tbl_user_info, "supp_ui_id = ui_id", "left");

        $rs = $this->db->get($this->tbl_deliveries);

        return $rs->result();
    }

    public function getDeliveryById( $dr_id ) {

        $this->db->select("*");
        $this->db->where( "dr_id", $dr_id );
//        $this->db->where( "emp_status", 1 );
//        $this->db->join($this->tbl_user_info, "emp_ui_id = ui_id", "left");

        $rs = $this->db->get($this->tbl_deliveries);

        return $rs->row();

    }

    public function save( $data, $dr_id = null) {

        $data['dr_delivery_date'] = date("Y-m-d", strtotime($data['dr_delivery_date']) );

        if ( $dr_id ) {

            $this->db->where("dr_id", $data['dr_id']);
            $this->db->update($this->tbl_deliveries, $data);

            return $dr_id;

        } else {
            $data['dr_created_date'] = date('Y-m-d H:i:s');
            $data['dr_created_by'] = $this->session->all_userdata()['ui_id'];
            $delivery = $this->db->insert($this->tbl_deliveries, $data);

            if ( $delivery ) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }
    /*
        public function saveUserInfo( $data, $emp_ui_id = null ) {

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

            if ( $emp_ui_id ) {

                $this->db->where('ui_id', $data['emp_ui_id']);
                $this->db->update($this->tbl_user_info, $userData);

                return $emp_ui_id;

            } else {

                $userInfo = $this->db->insert($this->tbl_user_info, $userData);

                if ( $userInfo ){
                    return $this->db->insert_id();
                } else {
                    return false;
                }
            }
        }
*/
        public function delete( $data ) {
            $this->db->where( "dr_id", $data['dr_id'] );
            $this->db->delete( $this->tbl_deliveries );
            if ( $this->db->affected_rows() > 0 ) return TRUE;
            else return FALSE;
        }

}