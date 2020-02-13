<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

	}

	public function formComplete($table, $data) {

	    $this->db->insert($table, $data);

    }

    public function getRecommendations($where = false) {

	    $this->db->select('*')
            ->from('recommend');

        if ($where == true) {
            $this->db->where('status', 'verified');
        }

        $result = $this->db->get();
        return $result->result();

    }

}
