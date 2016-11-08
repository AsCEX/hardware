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

        if ( $post['cc_c_id'] == 0 ) {
            $post['cc_c_id'] = -abs($this->session->userdata('emp_id'));
        }

        $contractCharge = $this->contract_charges_model->save( $post );

        if ( $contractCharge ) {
            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }

    }

    public function dialog( $cc_id = 0 ) {

        $contract_charge = $this->contract_charges_model->getContractChargeById( $cc_id );

        $data['contract_charge'] = ($contract_charge) ? $contract_charge : array();
        $this->load->view('contracts/add_charges', $data);

    }
}


?>