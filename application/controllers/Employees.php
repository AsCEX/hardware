<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends MY_Controller {

    public function index()
    {
        $this->load->view('employees/default');
    }
}
