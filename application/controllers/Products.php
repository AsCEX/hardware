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

}
