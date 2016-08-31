<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coils extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('coils_model');
    $this->load->model('colors_model');
  }

  public function index()
  {
    $dr_id = isset($_GET['dr_id']) ? $_GET['dr_id'] : -1;
    $data['dr_id'] = $dr_id;
    $this->load->view('coils/default', $data);
  }

  public function getCoilsGrid($dr_id = null)
  {
    $coils = $this->coils_model->getCoilsGrid($dr_id);
    $resultSet['rows'] = $coils;
    $resultSet['total'] = count($coils);
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($resultSet));
  }

  public function saveCoil($temp = false)
  {
    $post = $_POST;
    $coil_id = $this->coils_model->save($post, $post['coil_id'], $temp);

    if ( $coil_id ) {
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode( array( 'status' => 'success' ) ) );
    }
  }

  public function deleteCoil() 
  {
    $delCoil = $this->coils_model->delete( $_POST );
    if ( $delCoil ) {
      $this->output
        ->set_content_type('application/json')
        ->set_output( json_encode( array( 'status' => 'success' ) ) );
    }
  }

  public function dialog($coil_id = 0)
  {
    $data['userInfo'] = $this->session->userdata();
    $coil = $this->coils_model->getCoilById( $coil_id );
    $data['coils'] = ($coil) ? $coil : array();
    $data['colors'] = $this->colors_model->getColorsGrid();
    $data['drd_id'] = isset($_GET['drd_id']) ? $_GET['drd_id'] : 0;
    $this->load->view('coils/dialog/add', $data);
  }
}
