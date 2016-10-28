<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charges extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('charges_model');
    }

    public function index()
    {
        $this->load->view('charges/index');
    }

    public function getChargesComboBox() {

        $charges = $this->charges_model->getChargesComboBox();

        $charges_data = array();

        foreach ( $charges as $c ) {

            $temp = array(
                'id' => $c->chrg_id,
                'text' => $c->chrg_name
            );

            $charges_data[] = $temp;
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($charges_data) );
    }

    public function getChargesByChargeTypeComboBox( $chrg_type_id = null ) {

        $charges = $this->charges_model->getChargesByChargeTypeId( $chrg_type_id );

        $charges_data = array();

        foreach ( $charges as $c ) {

            $temp = array(
                'id'    => $c->chrg_id,
                'text'  => $c->chrg_name
            );

            $charges_data[] = $temp;
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($charges_data) );
    }

    public function saveCharge() {

        $post = $_POST;

        $charge = $this->charges_model->save($post, $post['chrg_id'] );

        if ( $charge ) {
            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }
    }
}

?>