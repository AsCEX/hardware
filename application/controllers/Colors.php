<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colors extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('colors_model');
    }

    public function index() {
        $this->load->view('colors/default');
    }

    public function dialog( $clr_id = 0 ){

        $color = $this->colors_model->getColorById( $clr_id );

        $data['color'] = ($color) ? $color : array();

        $this->load->view('colors/dialog/add', $data);
    }

    public function getColorsGrid() {

        $colors = $this->colors_model->getColorsGrid();

        $resultSet['rows'] = $colors;
        $resultSet['total'] = count($colors);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($resultSet) );
    }

    public function saveColor() {

        $post = $_POST;

        $colorId = $this->colors_model->save( $post, $post['clr_id'] );

        if ( $colorId ) {
            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }

    }

    public function deleteColor() {

        $deleteColor = $this->colors_model->delete( $_POST );

        if ( $deleteColor ) {

            $this->output
                ->set_content_type('application/json')
                ->set_output( json_encode( array( 'status' => 'success' ) ) );
        }
    }

    public function getColorsComboBox( $clr_id = null) {

        $colors = $this->colors_model->getColorsGrid();

        $color_data = array();

        foreach ($colors as $color) {

            $temp = array(
                'name' => $color->clr_id,
                'value' => $color->clr_name
            );

            if ($color->clr_id == $clr_id) {
                $temp['selected'] = true;
            }

            $color_data[] = $temp;
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($color_data) );
    }
}

?>