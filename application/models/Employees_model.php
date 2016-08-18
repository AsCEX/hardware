<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees_model extends CI_Model
{
    public $tbl_employees = "employees";
    public $tbl_user_info = "user_informations";

    public function __construct()
    {
        parent::__construct();
    }

    public function getEmployeesGrid() {

        $this->db->select("*");
        $this->db->where( "emp_status", 1 );
        $this->db->join($this->tbl_user_info, "emp_ui_id = ui_id", "left");
        $this->db->order_by("ui_lastname", "asc");

        $rs = $this->db->get($this->tbl_employees);

        return $rs->result();
    }

    public function getEmployeeById( $emp_id ) {

        $this->db->select("*");
        $this->db->where( "emp_id", $emp_id );
        $this->db->where( "emp_status", 1 );
        $this->db->join($this->tbl_user_info, "emp_ui_id = ui_id", "left");

        $rs = $this->db->get($this->tbl_employees);

        return $rs->row();

    }

    public function save( $data, $emp_id = null, $emp_ui_id = null ) {

        $ui_id = $this->saveUserInfo( $data, $emp_ui_id );

        $data = array(
            'emp_ui_id'     => $ui_id,
            'emp_username'  => $data['emp_username'],
            'emp_password'  => $data['emp_password'],
            'emp_status'    => 1,
            'emp_rate'      => $data['emp_rate']
        );

        if ( $emp_id ) {

            $this->db->where("emp_id", $data['emp_id']);
            $this->db->update($this->tbl_employees, $data);

            return $emp_id;

        } else {

            $employee = $this->db->insert($this->tbl_employees, $data);

            if ( $employee ) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }

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

    public function delete( $data ) {

        $this->db->set( "emp_status", 0 );
        $this->db->where( "emp_id", $data['emp_id'] );
        $this->db->update( $this->tbl_employees );

        if ( $this->db->affected_rows() > 0 ) return TRUE;
        else return FALSE;
    }

}