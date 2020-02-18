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

    public function getTable($table, $where = false, $value = false, $order = false, $format = 'array') {

	    $this->db->select('*')
            ->from($table);

	    if ($where != false) {
            $this->db->where($where, $value);
        }

        /* Ordre croissant ou décroissant */
        if ($order === 'asc') {
            $this->db->order_by('id', 'ASC');
        } elseif ($order === 'desc') {
            $this->db->order_by('id', 'DESC');
        }

        $result = $this->db->get();
        if ($format === 'row') {
            return $result->row();
        } else {
            return $result->result();
        }

    }

    public function selectedMethod($table, $mode = false) {

	    /* Ordre croissant / décroissant */
	    if (($mode === 'asc') || ($mode === 'desc')){
            return $this->getTable($table, false, false,$mode);
        }
        /* Ordre aléatoire */
        elseif ($mode === 'random') {
            $result = $this->getTable($table);
            shuffle($result);
            return $result;
        }
        /* Seulement en attente / en cours / vérifiés / achevés / hors ligne*/
        elseif (($mode === 'pending') || ($mode === 'progress') || ($mode === 'verified') || ($mode === 'completed') || ($mode === 'offline')) {
            return $this->getTable($table, 'status', $mode);
        }
        /* Autres */
        else {
            return $this->getTable($table);
        }
    }

    public function checkExistUser($where) {

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
