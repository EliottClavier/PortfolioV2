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

    public function getRecommendations($where = '') {

	    $this->db->select('*')
            ->from('recommend');

        if ($where == 'verfied') {
            $this->db->where('status', 'verified');
        } elseif ($where == 'pending') {
            $this->db->where('status', 'pending');
        }
        $result = $this->db->get();
        return $result->result();

    }

    public function adminUpdate($columnName, $data, $id, $table) {

        $this->db->set($columnName, $data)
        ->where('id', $id)
        ->update($table);

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

    public function adminCountRecommend($type) {
        $query = $this->db->select('status, count(*) AS total')
            ->from('recommend')
            ->like('status', $type)
            ->get();
        return $query->row();

    }


    public function recommendSelectedMethod ($mode) {

	    if ($mode === '1') {
            $result = $this->getRecommendations();
            shuffle($result);
            return $result;
        } elseif ($mode === '2') {
            return $this->getRecommendations('pending');
        } elseif ($mode === '3') {
            return $this->getRecommendations('verified');
        } else {
            return $this->getRecommendations();
        }
    }

}
