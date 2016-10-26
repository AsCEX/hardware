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

}

?>