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

        if ($where === 'verified') {
            $this->db->where('status', $where);
        } elseif ($where === 'pending') {
            $this->db->where('status', $where);
        }
        $result = $this->db->get();
        return $result->result();

    }

    public function recommendSelectedMethod($mode = '') {

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

    public function getProjects($where = '') {

        $this->db->select('*')
            ->from('project');

        if ($where === 'progress') {
            $this->db->where('status', $where);
        } elseif ($where === 'completed') {
            $this->db->where('status', $where);
        }
        $result = $this->db->get();
        return $result->result();

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
