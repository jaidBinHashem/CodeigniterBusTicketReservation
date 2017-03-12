<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('usertype')=='admin')
		{
			redirect('http://localhost:8082/ci226Bus/adminhome', 'refresh');
		}
		else
		{
			redirect('http://localhost:8082/ci226Bus/userhome', 'refresh');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('loggedin');
		$this->session->unset_userdata('usertype');
		redirect('http://localhost:8082/ci226Bus/', 'refresh');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */