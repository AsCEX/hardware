<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract_Detail_Breakdown extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("contract_detail_breakdown_model");
    }

    public function saveContractDetailBreakdown() {

        $post = $_POST;

        $cdb = $this->contract_detail_breakdown_model->save( $post['data'] );

        if ( $cdb ) {
            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }
    }
}
?>