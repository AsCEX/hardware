<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('products_model');
    }

    public function index() {

        //$this->load->view('contracts/index');
    }

    public function roofing_bended_panels() {
        $this->load->view('products/roofing_bended_panels');
    }

    public function hardware_accessories() {
        $this->load->view('products/hardware_accessories');
    }

    public function getProductsByCategoryComboBox( $cat_id = null) {

        $products = $this->products_model->getProductByCategory($cat_id);

        $products_data = array();

        foreach ($products as $p) {

            $temp = array(
                'id' => $p->p_id,
                'text' => $p->p_name
            );

            $products_data[] = $temp;
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($products_data) );
    }

    public function getProductThicknessComboBox( $cat_id = null) {}
    public function getProductWidthComboBox( $cat_id = null) {}
    public function getProductsLengthComboBox( $cat_id = null) {}

    public function getRoofingBendedPanels() {

        $roofingBendedPanels = $this->products_model->getRoofingBendedPanels();

        $resultSet['rows'] = $roofingBendedPanels;
        $resultSet['total'] = count($roofingBendedPanels);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($resultSet));
    }

    public function getRoofingBendedPanelsCategory() {

        $roofingBendedPanelsCategory = $this->products_model->getRoofingBendedPanelsCategory();

        $roofingBendedPanelsCategory_data = array();

        foreach ($roofingBendedPanelsCategory as $p) {

            $temp = array(
                'id' => $p->cat_id,
                'text' => $p->cat_name
            );

            $roofingBendedPanelsCategory_data[] = $temp;
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($roofingBendedPanelsCategory_data) );
    }

    public function saveProduct() {

        $post = $_POST;

        $rbp = $this->products_model->save( $post['data'] );

        if ( $rbp ) {
            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }
    }

    public function deleteByProductId() {

        $post = $_POST;

        $deleteRoofingBendedPanel = $this->products_model->deleteByProductId( $post );

        if( $deleteRoofingBendedPanel ) {
            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }

    }

    public function getHardwareAccessories() {

        $hardwareAccessories = $this->products_model->getHardwareAccessories();

        $resultSet['rows'] = $hardwareAccessories;
        $resultSet['total'] = count($hardwareAccessories);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($resultSet));
    }

}
