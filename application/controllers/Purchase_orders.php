<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_orders extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('purchase_orders_model');
        $this->load->model('customers_model');
        $this->load->model('sheets_model');
    }

    public function index()
    {
        $this->load->view('purchase_orders/default');
    }

    public function getPOGrid() {

        $employees = $this->purchase_orders_model->getPOGrid();

        $resultSet['rows'] = $employees;
        $resultSet['total'] = count($employees);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($resultSet) );
    }

    public function savePO() {

        $post = $_POST;

        $sheet_ids = json_decode( $post['po_sheet_ids'] );
        unset($post['po_sheet_ids']);

        $po_id = $this->purchase_orders_model->save($post, $post['po_id']);

        if ( $po_id ) {

            foreach($sheet_ids as $sheet_id){
                $sheet_data = array(
                    'sht_po_id' => $po_id
                );
                $this->sheets_model->save($sheet_data, $sheet_id);
            }

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode( array( 'status' => 'success' ) ) );
        }
    }

    public function deletePO() {

        $delPO = $this->purchase_orders_model->delete( $_POST );

        if ( $delPO ) {

            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }
    }

    public function dialog( $po_id = 0 ){
        $po = $this->purchase_orders_model->getPOById( $po_id );
        if($po) {
            $po->po_date = date("m/d/Y", strtotime($po->po_date));
        }
        $data['customers'] =  $this->customers_model->getCustomersGrid();
        $data['po'] = ($po) ? $po : array();
        $this->load->view('purchase_orders/dialog/add', $data);
    }

    public function po_print( $po_id ) {

        $customer = $this->purchase_orders_model->getCustomerCompanyByPOId( $po_id );

        $po = $this->purchase_orders_model->getPOById( $po_id );
        $po->po_date = date("F d, Y", strtotime($po->po_date));

        $sheets = $this->sheets_model->getItemsToPrintByPOId( $po_id );

        $data['cust_company'] =  $customer->cust_company;
        $data['customer'] =  $customer;
        $data['po'] = ($po) ? $po : array();
        $data['sheets'] = ($sheets) ? $sheets : array();

        $this->load->view('purchase_orders/print/index', $data);
    }
}
