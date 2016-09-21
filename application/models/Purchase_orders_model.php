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
                po_fulfillment,
                CONCAT_WS(' ', ui_firstname, ui_middlename, ui_lastname, ui_extname) as fullname,
                cust_company,
                ui_address,
                ui_address2,
                ui_zip,
                ui_contact_number
        ");

        $this->db->join($this->tbl_customers, "cust_id = po_cust_id", "left");
        $this->db->join($this->tbl_user_info, "cust_ui_id = ui_id", "left");

        $this->db->order_by('po_fulfillment', 'ASC');

        $rs = $this->db->get($this->tbl_po);

        return $rs->result();
    }

    public function getProductions($page=1, $rows=10, $sort="", $order="") {

        $offset = ($page-1)*$rows;

        $this->db->select("
                po_id,
                po_date,
                po_created_date,
                po_terms,
                po_fulfillment,
                CONCAT_WS(' ', ui_firstname, ui_middlename, ui_lastname, ui_extname) as fullname,
                cust_company,
                ui_address,
                ui_address2,
                ui_zip,
                ui_contact_number
        ");

        $this->db->join($this->tbl_customers, "cust_id = po_cust_id", "left");
        $this->db->join($this->tbl_user_info, "cust_ui_id = ui_id", "left");

        $this->db->where('po_fulfillment', 2);

        if($sort){
            $this->db->order_by($sort, $order);
        }
        $this->db->limit($rows, $offset);

        $rs = $this->db->get($this->tbl_po);

        return $rs->result();
    }

    public function getProductionsCount() {

        $this->db->select("po_id");
        $this->db->where('po_fulfillment !=', 1);

        $rs = $this->db->get($this->tbl_po);

        return $rs->num_rows();
    }

    public function getPOById( $po_id ) {

        $this->db->select("*");
        $this->db->where( "po_id", $po_id );

        $rs = $this->db->get($this->tbl_po);

        return $rs->row();

    }

    public function updateCoilWeight($data=array(), $coil_id = null){

        if ( $coil_id ) {

            $this->db->where("coil_id", $coil_id);
            $this->db->update('coils', $data);

            return $coil_id;

        }
        return false;
    }

    public function saveCoilHistory($data=array(), $id = null){
        if ( $id ) {

            $this->db->where("cd_id", $id);
            $this->db->update('coil_history', $data);

            return $id;

        } else {
            $ch = $this->db->insert('coil_history', $data);

            if ( $ch ) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }

    public function getPOCoils($po_id){

        $this->db->select("*");
        $this->db->join('coils','sht_coil_id = coil_id', 'left');
        $this->db->group_by('sht_coil_id');
        $this->db->where( "sht_po_id", $po_id );

        $rs = $this->db->get('sheets');
        return $rs->result();
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

        $this->db->select("*");
        $this->db->where("po_id", $po_id);
        $this->db->join($this->tbl_customers, "cust_id = po_cust_id", "left");
        $this->db->join($this->tbl_user_info, "cust_ui_id = ui_id", "left");

        $res = $this->db->get($this->tbl_po);

        return $res->row();
    }

}