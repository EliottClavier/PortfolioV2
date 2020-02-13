<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

	}

	public function insertDB($table, $data) {

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

    public function adminLogsUpdate($columnName, $data, $id) {

        $this->db->set($columnName, $data)
        ->where('id', $id)
        ->update('admin_logs');

    }

    public function checkExistUser($where) {

        // die(var_dump($field));

        $query = $this->db->select('*')
            ->from('admin_logs')
            ->where('admin_name', $where)
            ->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }

    }

    public function cipherPassword($password) {

        $cipherPassword = $this->encryption->encrypt($password);

        return $cipherPassword;

    }

}
