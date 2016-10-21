<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_Orders extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('job_orders_model');
    }

    public function index() {

        $this->load->view('job_orders/index');
    }

    public function getJO(){
        $contracts = $this->job_orders_model->getJO();

        $resultSet['rows'] = $contracts;
        $resultSet['total'] = count($contracts);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($resultSet) );
    }

    public function joDetails($jo_id = null){
        $data['jo_id'] = $jo_id;
        $jo = $this->job_orders_model->getJO($jo_id);
        $jo_line = reset($jo);
        $data['contract_details'] = $jo_line;
        $data['contract_id'] = $jo_line->c_id;
        $this->load->view('job_orders/job_order_details', $data);
    }


    public function getContractDetails($contract_id = null){
        $order_details = $this->contracts_model->getContractDetails($contract_id);
        $order_charges = $this->contracts_model->getContractCharges($contract_id);

        $resultSet['rows'] = $order_details;
        $resultSet['total'] = count($order_details);

        $mat_cost = 0;
        foreach($order_details as $od){
            $mat_cost += ($od->cd_qty * $od->cd_unit_price);
        }

        $charges = array();
        $charges[] = array(
            'footer'    => 1,
            'cd_unit_price' => 'Total Materials:',
            'line_total' => $mat_cost
        );


        $resultSet['footer'] = $charges;

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($resultSet) );
    }

    public function getContractCharges($contract_id = null){
        $order_charges = $this->contracts_model->getContractCharges($contract_id);

        $tot = 0;
        foreach($order_charges as $oc){
            if($oc->chrg_type == 1)
                $tot += $oc->cc_amount;
            else
                $tot -= $oc->cc_amount;
        }

        $resultSet['rows'] = $order_charges;
        $resultSet['total'] = count($order_charges);

        $charges = array();
        $charges[] = array(
            'footer'    => 1,
            'chrg_name' => 'Total Charges:',
            'cc_amount' => $tot
        );


        $resultSet['footer'] = $charges;


        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($resultSet) );
    }
}

?>