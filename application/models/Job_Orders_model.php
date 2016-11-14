<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_Orders_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getJO($jo_id = null){

        $sql = "SELECT
                  jo_id,
                  c_id,
                  c_date,
                  c_project,
                  c_location,
                  c_sales_rep,
                  c_reference,
                  c_terms_of_payment,
                  c_delivery_instruction,
                  c_status,
                  cust_company,
                  cust_address,
                  cust_owner,
                  mat_cost,
                  tot_charges,
                  tot_charges+mat_cost as grand_cost
                FROM job_orders
                LEFT JOIN contracts ON c_id = jo_c_id
                LEFT JOIN customers ON cust_id = c_cust_id
                LEFT JOIN (
                  SELECT cd_c_id, sum(cd_qty * cd_unit_price) as mat_cost FROM contract_details GROUP by cd_c_id
                ) as material_cost ON material_cost.cd_c_id = c_id
                LEFT JOIN (
                  SELECT cc_c_id, sum(cc_amount) as tot_charges FROM  contract_charges GROUP by cc_c_id
                ) as extra_charges ON cc_c_id = c_id WHERE 1 = 1";

        if($jo_id){
            $sql .= " AND jo_id = " . $jo_id;
        }

        $query = $this->db->query($sql);

        return $query->result();
    }


    /*
     * Get Contracts without Job Order
     * */
    public function getAvailableContract($c_id = null){

        $sql = "SELECT * FROM contracts
                LEFT JOIN job_orders ON jo_c_id = c_id
                WHERE jo_c_id IS NULL";

        if($c_id){
            $sql .= " OR c_id = $c_id";
        }

        $query = $this->db->query($sql);

        return $query->result();
    }

    public function getBreakdown($cd_id = 0){
        $sql = "SELECT * FROM contract_detail_breakdown WHERE cdb_cd_id = " . $cd_id;
        $query = $this->db->query($sql);

        return $query->result();
    }

}

?>