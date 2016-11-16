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

    public function dialog( $mat_id = 0 ) {

        $material = $this->materials_model->getMaterialById( $mat_id );

        $data['material'] = ($material) ? $material : array();

        $this->load->view('materials/dialog/add', $data);
    }

    public function saveMaterial() {

        $post = $_POST;

        $material = $this->materials_model->save( $post, $post['mat_id'] );

        if ( $material ) {
            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }
    }

    public function deleteMaterial() {

        $deleteMaterial = $this->materials_model->delete( $_POST );

        if ( $deleteMaterial ) {

            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }
    }

}
?>