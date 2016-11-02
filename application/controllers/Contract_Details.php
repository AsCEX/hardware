<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract_Details extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model( "contract_details_model" );
    }

    public function saveContractMaterial() {

        $post = $_POST;

        if ( $post['cd_c_id'] == 0 ) {
            $post['cd_c_id'] = -abs($this->session->userdata('emp_id'));
        }

        $contract_material = $this->contract_details_model->save( $post );

        if ( $contract_material ) {
            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }
    }
}


?>