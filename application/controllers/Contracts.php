<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contracts extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('contracts_model');
    }

    public function index() {

        $this->load->view('contracts/index');
    }

    public function contractDetails($contract_id = null){
        $data['contract_id'] = $contract_id;
        $contracts = $this->contracts_model->getContractsById($contract_id);
        $data['contract_details'] = reset($contracts);
        $this->load->view('contracts/contract_details', $data);
    }

    public function addMaterialView(){
        $this->load->view('contracts/add_material');
    }

    public function addChargesView(){
        $this->load->view('contracts/add_charges');
    }

    public function getContracts(){
        $contracts = $this->contracts_model->getContracts();

        $resultSet['rows'] = $contracts;
        $resultSet['total'] = count($contracts);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($resultSet) );
    }

    public function getContractDetails($contract_id = null){

        if($contract_id == 0){
            $contract_id = -abs($this->session->userdata('emp_id'));
        }

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

    public function save(){
        $data = $_POST;

        $c_id = $data['c_id'];
        unset($data['c_id']);
        unset($data['jo_id']);

        $this->contracts_model->save($data, $c_id);
    }
}

?>