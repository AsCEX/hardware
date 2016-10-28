<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('customers_model');
    }

    public function index()
    {
        $this->load->view('customers/default');
    }

    public function getCustomersGrid() {

        $customers = $this->customers_model->getCustomersGrid();

        $resultSet['rows'] = $customers;
        $resultSet['total'] = count($customers);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($resultSet) );
    }

    public function saveCustomer() {

        $post = $_POST;
        $cust_id = $this->customers_model->save($post, $post['cust_id'], $post['cust_ui_id']);

        if ( $cust_id ) {

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode( array( 'status' => 'success' ) ) );
        }
    }

    public function deleteCustomer() {

        $delCust = $this->customers_model->delete( $_POST );

        if ( $delCust ) {

            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }
    }

    public function dialog( $cust_id = 0 ){

        $customer = $this->customers_model->getCustomerById( $cust_id );

        $data['customer'] = ($customer) ? $customer : array();

        $this->load->view('customers/dialog/add', $data);
    }

    public function getCustomersCombobox() {

        $customers = $this->customers_model->getCustomersGrid();

        $customers_data = array();

        foreach ($customers as $c) {

            $temp = array(
                'id' => $c->cust_id,
                'text' => $c->cust_company
            );
            $customers_data[] = $temp;
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($customers_data) );
    }
}
