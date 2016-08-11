<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends MY_Controller {

    public function index()
    {
        $this->load->view('customers/default');
    }
}
