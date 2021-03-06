<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contracts_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getContracts($contract_id = null){

        $sql = "SELECT
                  c_id,
                  c_date,
                  c_cust_id,
                  c_project,
                  c_location,
                  c_sales_rep,
                  c_reference,
                  c_terms_of_payment,
                  c_delivery_instruction,
                  c_status,
                  c_clr_id,
                  jo_id,
                  cust_company,
                  cust_address,
                  cust_owner,
                  mat_cost,
                  tot_charges,
                  tot_charges+mat_cost as grand_cost
                FROM contracts
                LEFT JOIN job_orders ON jo_c_id = c_id
                LEFT JOIN customers ON cust_id = c_cust_id
                LEFT JOIN (
                  SELECT cd_c_id, sum(cd_qty * cd_unit_price) as mat_cost FROM contract_details GROUP by cd_c_id
                ) as material_cost ON material_cost.cd_c_id = c_id
                LEFT JOIN (
                  SELECT cc_c_id, sum(cc_amount) as tot_charges FROM  contract_charges GROUP by cc_c_id
                ) as extra_charges ON cc_c_id = c_id WHERE c_status = 1";

        if($contract_id){
            $sql .= " AND c_id = " . $contract_id;
        }

        $query = $this->db->query($sql);

//        pre_print($query->result()); die;

        return $query->result();
    }

    public function getContractsById($contract_id = 0){

        $sql = "SELECT
                  c_id,
                  c_date,
                  c_cust_id,
                  c_project,
                  c_location,
                  c_sales_rep,
                  c_reference,
                  c_terms_of_payment,
                  c_delivery_instruction,
                  c_status,
                  c_clr_id,
                  jo_id,
                  cust_company,
                  cust_address,
                  cust_owner,
                  mat_cost,
                  tot_charges,
                  tot_charges+mat_cost as grand_cost
                FROM contracts
                LEFT JOIN job_orders ON jo_c_id = c_id
                LEFT JOIN customers ON cust_id = c_cust_id
                LEFT JOIN (
                  SELECT cd_c_id, sum(cd_qty * cd_unit_price) as mat_cost FROM contract_details GROUP by cd_c_id
                ) as material_cost ON material_cost.cd_c_id = c_id
                LEFT JOIN (
                  SELECT cc_c_id, sum(cc_amount) as tot_charges FROM  contract_charges GROUP by cc_c_id
                ) as extra_charges ON cc_c_id = c_id WHERE c_status = 1 AND c_id = " . $contract_id;


        $query = $this->db->query($sql);

//        pre_print($query->result()); die;

        return $query->result();
    }

    public function getContractDetails($contract_id = null){

        $sql = "SELECT
                  cat_id,
                  cat_name,
                  cd_id,
                  cd_thickness,
                  cd_width,
                  cd_length,
                  cd_qty,
                  cd_unit,
                  p_name,
                  cd_unit_price
                FROM contract_details
                LEFT JOIN products ON p_id = cd_p_id
                LEFT JOIN categories ON cat_id = p_cat_id
                WHERE cd_c_id = ?";

        $query = $this->db->query($sql, array($contract_id));
        return $query->result();

    }

    public function getContractCharges($contract_id = null){
        $sql = "SELECT
                  cc_id,
                  cc_amount,
                  chrg_name,
                  chrg_type,
                  chrg_type_name
                FROM contract_charges
                LEFT JOIN charges ON chrg_id = cc_chrg_id
                LEFT JOIN charge_types ON chrg_type_id = chrg_type
                WHERE cc_c_id = ?";

        $query = $this->db->query($sql, array($contract_id));

        return $query->result();
    }

    public function save($data, $id = null){
        if ( $id ) {
            $this->db->where("c_id", $id);
            $this->db->update('contracts', $data);
            return $id;
        } else {
            return $this->db->insert('contracts', $data) ? TRUE : FALSE;
        }
    }

}

?>