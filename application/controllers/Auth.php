<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


    public function __construct(){
        parent::__construct();

        $this->load->model('auth_model');
    }

    public function index()
    {
        $this->login();
    }

    public function login(){

        if($this->session->userdata('emp_id'))
            redirect('/');

        $this->load->view('auth/login');
    }

    public function doLogin(){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $login = $this->auth_model->checkUserLogin($username, $password);

        if($login){
            $userdata = (array)reset($login);
            $this->session->set_userdata($userdata);

            echo true;
        }else{
            echo false;
        }

    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/login');
    }


}
