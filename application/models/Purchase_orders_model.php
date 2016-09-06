<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase_orders_model extends CI_Model
{
    public $tbl_po = "purchase_orders";
    public $tbl_sheets = "sheets";
    public $tbl_customers = "customers";
    public $tbl_user_info = "user_informations";

    public function __construct()
    {
        parent::__construct();
    }

    public function getPOGrid() {

        $this->db->select("
                po_id,
                po_date,
                po_created_date,
                po_terms,
                CONCAT_WS(' ', ui_firstname, ui_middlename, ui_lastname, ui_extname) as fullname,
                cust_company,
                ui_address,
                ui_address2,
                ui_zip,
                ui_contact_number
        ");

        $this->db->join($this->tbl_customers, "cust_id = po_cust_id", "left");
        $this->db->join($this->tbl_user_info, "cust_ui_id = ui_id", "left");

        $rs = $this->db->get($this->tbl_po);

        return $rs->result();
    }

    public function getPOById( $po_id ) {

        $this->db->select("*");
        $this->db->where( "po_id", $po_id );

        $rs = $this->db->get($this->tbl_po);

        return $rs->row();

    }

    public function save( $data, $po_id = null) {

        $data['po_date'] = date("Y-m-d", strtotime($data['po_date']) );

        if ( $po_id ) {

            $this->db->where("po_id", $data['po_id']);
            $this->db->update($this->tbl_po, $data);

            return $po_id;

        } else {
            $data['po_created_date'] = date('Y-m-d H:i:s');
            $po = $this->db->insert($this->tbl_po, $data);

            if ( $po ) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }

    public function delete( $data ) {
        $this->db->where( "po_id", $data['po_id'] );
        $po = array(
            'po_deleted' => 1
        );
        $this->db->update( $this->tbl_po, $po );
        if ( $this->db->affected_rows() > 0 ) return TRUE;
        else return FALSE;
    }

    public function getCustomerCompanyByPOId( $po_id ) {

        $this->db->select("cust_company");
        $this->db->where("po_id", $po_id);
        $this->db->join($this->tbl_customers, "cust_id = po_cust_id", "left");

        $res = $this->db->get($this->tbl_po);

        return $res->row();
    }

}