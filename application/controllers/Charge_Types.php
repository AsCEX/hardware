<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charge_Types extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('charge_types_model');
    }

    public function getChargeTypesComboBox() {

        $charge_types = $this->charge_types_model->getChargeTypes();

        $charge_types_data = array();

        foreach ( $charge_types as $ct ) {
            $temp = array(
                'id'    => $ct->chrg_type_id,
                'text'  => $ct->chrg_type_name
            );

            $charge_types_data[] = $temp;
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($charge_types_data) );
    }
}

?>