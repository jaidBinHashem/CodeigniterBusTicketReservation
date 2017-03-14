<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('loggedin'))
		{
			redirect('http://localhost:8082/ci226Bus/', 'refresh');
		}
		$this->load->model("registrationmodel");
	}

	public function index()
	{
		if($this->input->post("register"))
		{
			if($this->form_validation->run('register') == false)
			{
				$data['message'] = validation_errors();
				$this->load->view("view_registration",$data);
				return;
			}

			$data = array(
				'username' => $username = $this->input->post("username"),
				'password' => $password = $this->input->post("password"),
				'name' => $fullname = $this->input->post("fullname"),
				'email' => $email = $this->input->post("email"),
				'mobile' => $mobile = $this->input->post("mobile")
				);
			

			$this->registrationmodel->adduser($data);


		}
		else
		{
			$data['message'] = validation_errors();
			$this->load->view("view_registration",$data);
		}
	}

}

/* End of file registration.php */
/* Location: ./application/controllers/registration.php */