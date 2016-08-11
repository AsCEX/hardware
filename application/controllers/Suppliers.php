<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers extends MY_Controller {

    public function index()
    {
        $this->load->view('suppliers/default');
    }
}
