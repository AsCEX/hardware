<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract_Charges extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model( "contract_charges_model" );
    }

    public function saveContractCharges() {

        $post = $_POST;

        $contractCharge = $this->contract_charges_model->save( $post );

        if ( $contractCharge ) {
            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }

    }
}


?>