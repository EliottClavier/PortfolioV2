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

	/* Fonction vérifiant si un identifiant existe déjà */
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

    /* Fonction de cryptage de mot de passe */
    public function cipherPassword($password) {

        $cipherPassword = $this->encryption->encrypt($password);

        return $cipherPassword;

    }

    /* Fonction qui compare le mot de passe envoyé dans le formulaire de connexion au panel admin avec celui encrypté dans la base de données */
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

    /* Fonction qui permet de compter le nombre de recommandations / projets and fonction de son statut dans la table */
    public function adminCountStatus($table, $type) {
        $query = $this->db->select('status, count(*) AS total')
            ->from($table)
            ->like('status', $type)
            ->get();
        return $query->row();

    }

    /* Fonction qui permet d'update des données dans la BDD */
    public function adminUpdate($columnName, $data, $id, $table) {

        $this->db->set($columnName, $data)
            ->where('id', $id)
            ->update($table);

    }

}
