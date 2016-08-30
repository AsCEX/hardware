<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deliveries extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('deliveries_model');
    }

    public function index()
    {
        $this->load->view('deliveries/default');
    }

    public function getDeliveriesGrid() {

        $employees = $this->deliveries_model->getDeliveriesGrid();

        $resultSet['rows'] = $employees;
        $resultSet['total'] = count($employees);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($resultSet) );
    }

    public function saveDeliveries() {

        $post = $_POST;
        $emp_id = $this->employees_model->save($post, $post['emp_id'], $post['emp_ui_id']);

        if ( $emp_id ) {

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode( array( 'status' => 'success' ) ) );
        }
    }

    public function deleteDeliveries() {

        $delEmp = $this->employees_model->delete( $_POST );

        if ( $delEmp ) {

            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }
    }

    public function dialog( $dr_id = 0 ){

        $dr = $this->deliveries_model->getDeliveryById( $dr_id );

        $data['employee'] = ($dr) ? $dr : array();

        $this->load->view('deliveries/dialog/add', $data);
    }
}
