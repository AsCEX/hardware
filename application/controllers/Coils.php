<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coils extends MY_Controller {

  public function __construct()
  {
	parent::__construct();
	$this->load->model('coils_model');
	$this->load->model('colors_model');
	$this->load->model('purchase_orders_model');
  }

  public function index()
  {
	$dr_id = isset($_GET['dr_id']) ? $_GET['dr_id'] : -1;
	$data['dr_id'] = $dr_id;
    $data['po_id'] = isset($_GET['po_id']) ? $_GET['po_id'] : 0;
	$this->load->view('coils/default', $data);
  }


  public function getCoilsGrid($dr_id = null, $po_id = null)
  {
   if($po_id){
        $coils_po = $this->purchase_orders_model->getPOCoils( $po_id );
        $coils_ids = array();

       foreach($coils_po as $c){
            $coils_ids[] = $c->sht_coil_id;
        }

       $coils = $this->coils_model->getCoilsGrid($coils_ids);
    }else{
       $coils = $this->coils_model->getCoilsGrid($dr_id);
   }
	$resultSet['rows'] = $coils;
	$resultSet['total'] = count($coils);
	$this->output
	  ->set_content_type('application/json')
	  ->set_output(json_encode($resultSet));
  }

  public function saveCoil()
  {
	$post = $_POST;
	$coil_id = $this->coils_model->save($post, $post['coil_id']);

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

  public function dialog($coil_id = 0, $state = false)
  {
    $data['userInfo'] = $this->session->userdata();
    $coil = $this->coils_model->getCoilById( $coil_id );
    $data['coils'] = ($coil) ? $coil : array();
    $data['colors'] = $this->colors_model->getColorsGrid();
    $data['dr_id'] = isset($_GET['dr_id']) ? $_GET['dr_id'] : 0;
    if($state) {
      $this->load->view('coils/dialog/view', $data);
    } else {
      $this->load->view('coils/dialog/add', $data);
    }
  }

  public function getCoilsComboBox( $coil_id = null) {

      $coils = $this->coils_model->getCoilsGrid(-1);

      $coil_data = array();

      foreach ($coils as $coil) {

          $temp = array(
              'name' => $coil->coil_id,
              'value' => $coil->coil_code,
              'color' => $coil->clr_hex
          );

          if ($coil->coil_id == $coil_id) {
              $temp['selected'] = true;
          }

          $coil_data[] = $temp;
      }

      $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($coil_data) );
  }
}
