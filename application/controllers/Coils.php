<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coils extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('coils_model');
  }

  public function index()
  {
    $this->load->view('coils/default');
  }

  public function getCoilsGrid() 
  {
    $coils = $this->coils_model->getCoilsGrid();
    $resultSet['rows'] = $coils;
    $resultSet['total'] = count($coils);
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($resultSet));
  }

  public function saveCoil() 
  {
    $post = $_POST;
    $coil_id = $this->coils_model->save($post, $post['coil_id'], $post['coil_created_by']);
    if ( $coil_id ) {
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode( array( 'status' => 'success' ) ) );
    }
  }

  public function dialog($coil_id = 0)
  {
    $coil = $this->coils_model->getCoilById( $coil_id );
    $data['coils'] = ($coil) ? $coil : array();
    $this->load->view('coils/dialog/add', $data);
  }
}
