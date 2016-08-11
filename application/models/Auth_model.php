<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Auth_model extends CI_Model
{
    /**
     * Holds an array of tables used
     *
     * @var array
     **/
    public $tbl_employees = "employees";
    public $tbl_user_info = "user_informations";

    public function __construct()
    {
        parent::__construct();
    }

    public function checkUserLogin($username = "", $password = ""){

        $this->db->where('emp_username', $username);
        $this->db->where('emp_password', $password);

        $this->db->join($this->tbl_user_info, "emp_ui_id = ui_id", "left");
        $rs = $this->db->get($this->tbl_employees);

        return $rs->result();
    }

}
