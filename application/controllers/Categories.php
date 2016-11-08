<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('categories_model');
    }

    public function index() {

        //$this->load->view('contracts/index');
    }

    public function getCategoryComboBox( $cat_id = null ) {

        $cat = $this->categories_model->getCategories( $cat_id );

        $cat_data = array();

        foreach ($cat as $c) {

            $temp = array(
                'id' => $c->cat_id,
                'text' => $c->cat_name
            );

            $cat_data[] = $temp;
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($cat_data) );
    }

}
