<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
        $this->load->library('encryption');
        $this->encryption->initialize(
            array(
                'cipher' => 'aes-256',
                'mode' => 'ctr',
                'key' => 'P0rtf0li0Eli0ttClavier'
            )
        );

	}

    public function checkExistUser($where) {


        $query = $this->db->select('*')
            ->from('admin_logs')
            ->where($where)
            ->get();

        if ($query->num_rows() > 0) {

            return $query->row();
        } else {
            return false;
        }

    }

    public function hash_verify($p_bdd, $p_input){
        $password_input = $this->encryption->encrypt($p_input);
        $password_output = $this->encryption->decrypt($password_input);
        $bdd_output = $this->encryption->decrypt($p_bdd);

        if ($p_input == $bdd_output){
            return true;
        }else{
            return false;
        }

    }

    public function adminCountRecommend($type) {
        $query = $this->db->select('status, count(*) AS total')
            ->from('recommend')
            ->like('status', $type)
            ->get();
        return $query->row();

    }

    public function adminCountProject() {
        $query = $this->db->select('status, count(*) AS total')
            ->from('project')
            ->get();
        return $query->row();

    }

    public function adminUpdate($columnName, $data, $id, $table) {

        $this->db->set($columnName, $data)
            ->where('id', $id)
            ->update($table);

    }

}
