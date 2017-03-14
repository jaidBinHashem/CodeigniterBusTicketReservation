<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrationmodel extends CI_Model {

	public function adduser($data)
	{
		$this->db->insert('user',$data);
	}

}

/* End of file registrationmodel.php */
/* Location: ./application/models/registrationmodel.php */