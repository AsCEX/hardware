<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers_model extends CI_Model
{
    public $tbl_customers = "customers";
    public $tbl_user_info = "user_informations";

    public function __construct()
    {
        parent::__construct();
    }

    public function getCustomersGrid() {

        $this->db->select("*");
        $this->db->where( "cust_status", 1 );
        $this->db->order_by("cust_company", "asc");

        $rs = $this->db->get($this->tbl_customers);

        return $rs->result();
    }

    public function getCustomerById( $cust_id ) {

        $this->db->select("*");
        $this->db->where( "cust_id", $cust_id );
        $this->db->where( "cust_status", 1 );
        $this->db->join($this->tbl_user_info, "cust_ui_id = ui_id", "left");

        $rs = $this->db->get($this->tbl_customers);

        return $rs->row();

    }

    public function save( $data, $cust_id = null, $cust_ui_id = null ) {

        $ui_id = $this->saveUserInfo( $data, $cust_ui_id );

        $data = array(
            'cust_ui_id'     => $ui_id,
            'cust_company'  => $data['cust_company'],
            'cust_status'    => 1,
        );

        if ( $cust_id ) {

            $data['cust_modified_date']  = date("Y-m-d h:i:s");
            $data['cust_modified_by']    = $this->session->userdata('emp_id');

            $this->db->where("cust_id", $cust_id);
            $this->db->update($this->tbl_customers, $data);

            return $cust_id;

        } else {

            $data['cust_created_date']  = date("Y-m-d h:i:s");
            $data['cust_created_by']    = $this->session->userdata('emp_id');

            $cusomter = $this->db->insert($this->tbl_customers, $data);

            if ( $cusomter ) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }

    public function saveUserInfo( $data, $cust_ui_id = null ) {

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

        if ( $cust_ui_id ) {

            $this->db->where('ui_id', $data['cust_ui_id']);
            $this->db->update($this->tbl_user_info, $userData);

            return $cust_ui_id;

        } else {

            $userInfo = $this->db->insert($this->tbl_user_info, $userData);

            if ( $userInfo ){
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }

    public function delete( $data ) {

        $this->db->set( "cust_status", 0 );
        $this->db->where( "cust_id", $data['cust_id'] );
        $this->db->update( $this->tbl_customers );

        if ( $this->db->affected_rows() > 0 ) return TRUE;
        else return FALSE;
    }

}