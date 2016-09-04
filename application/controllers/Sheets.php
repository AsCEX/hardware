<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sheets extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('sheets_model');
    }

    public function index() {
        $po_id = isset($_GET['po_id']) ? $_GET['po_id'] : -1;
        $data['po_id'] = $po_id;
        $this->load->view('sheets/default', $data);
    }

    public function dialog( $sht_id = 0 ){

        $sheet = $this->sheets_model->getSheetById( $sht_id );

        $data['sheet'] = ($sheet) ? $sheet : array();
        $data['po_id'] = isset($_GET['po_id']) ? $_GET['po_id'] : 0;

        $this->load->view('sheets/dialog/add', $data);
    }

    public function getSheetsGrid($po_id = null) {

        $sheets = $this->sheets_model->getSheetsGrid($po_id);

        $resultSet['rows'] = $sheets;
        $resultSet['total'] = count($sheets);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($resultSet) );
    }

    public function saveSheet() {

        $post = $_POST;

        $sheet = $this->sheets_model->save($post, $post['sht_id']);

        if ( $sheet ) {
            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }
    }

    public function deleteSheet() {

        $delSheet = $this->sheets_model->delete( $_POST );

        if ( $delSheet ) {
            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success') ) );
        }
    }
}
?>