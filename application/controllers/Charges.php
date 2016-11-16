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
        $this->load->view('charges/default');
    }

    public function dialog( $chrg_id = 0 ) {

        $charge = $this->charges_model->getChargeById( $chrg_id );

        $data['charge'] = ($charge) ? $charge : array();

        $this->load->view('charges/dialog/add', $data);
    }

    public function getChargesGrid() {

        $charges = $this->charges_model->getChargesGrid();

        $resultSet['rows'] = $charges;
        $resultSet['total'] = count($charges);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($resultSet) );
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

    public function deleteCharge () {

        $deleteCharge = $this->charges_model->delete( $_POST );

        if ( $deleteCharge ) {

            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }
    }
}

?>