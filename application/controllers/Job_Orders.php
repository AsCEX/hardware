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

    public function order_breakdown($cd_id = 0) {
        $data['cd_id'] = $cd_id;
        $this->load->view('job_orders/orderline_breakdown', $data);
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

    public function getAvailableContractCombobox(){
        $sc = $this->job_orders_model->getAvailableContract();

        $sc_data = array();

        foreach ($sc as $s) {

            $temp = array(
                'id' => $s->c_id,
                'text' => $s->c_id
            );

            $sc_data[] = $temp;
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($sc_data) );
    }

    public function getBreakdown($cd_id = 0) {
        $brkdwn = $this->job_orders_model->getBreakdown($cd_id);

        $resultSet['rows'] = $brkdwn;
        $resultSet['total'] = count($brkdwn);

        $b_tot = 0;
        foreach($brkdwn as $b){
            $b_tot += $b->cdb_qty * $b->cdb_length;
        }


        $footer = array();
        $footer[] = array(
            'footer'    => 1,
            'cdb_length' => 'Total:',
            'cdb_total' => $b_tot
        );

        $resultSet['footer'] = $footer;

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($resultSet) );
    }
}

?>