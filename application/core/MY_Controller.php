<?php

class MY_Controller extends CI_Controller {

    public $sidebar;

    function __construct()
    {
        parent::__construct();


       if(!$this->session->userdata('emp_id'))
            redirect('auth/login');

    }


}