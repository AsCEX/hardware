<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coils extends MY_Controller {

    public function index()
    {
        $this->load->view('coils/default');
    }
}
