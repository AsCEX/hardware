<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deliveries extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('deliveries_model');
        $this->load->model('suppliers_model');
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

    public function saveDelivery() {

        $post = $_POST;
        $emp_id = $this->deliveries_model->save($post, $post['dr_id']);

        if ( $emp_id ) {

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode( array( 'status' => 'success' ) ) );
        }
    }

    public function deleteDelivery() {

        $delDelivery = $this->deliveries_model->delete( $_POST );

        if ( $delDelivery ) {

            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }
    }

    public function dialog( $dr_id = 0 ){
        $dr = $this->deliveries_model->getDeliveryById( $dr_id );
        if($dr) {
            $dr->dr_delivery_date = date("m/d/Y", strtotime($dr->dr_delivery_date));
        }
        $data['suppliers'] =  $this->suppliers_model->getSuppliersGrid();
        $data['delivery'] = ($dr) ? $dr : array();
        $this->load->view('deliveries/dialog/add', $data);
    }
}
