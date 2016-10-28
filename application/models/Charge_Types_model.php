<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charge_Types_model extends CI_Model
{
    public $tbl_charge_types = "charge_types";

    public function __construct()
    {
        parent::__construct();
    }

    public function getChargeTypes() {

        $this->db->select("chrg_type_id, chrg_type_name");

        $charge_types = $this->db->get($this->tbl_charge_types);

        return $charge_types->result();
    }

}


?>