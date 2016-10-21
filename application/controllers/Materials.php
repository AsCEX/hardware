<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materials extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('materials_model');
    }

    public function index()
    {

        $this->load->view('materials/index');
    }

    public function getMaterials()
    {
        $materials = $this->materials_model->getMaterials();

        $resultSet['rows'] = $materials;
        $resultSet['total'] = count($materials);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($resultSet));
    }

    public function orderDetails()
    {
        $this->load->view('contracts/order_details');
    }

}
?>