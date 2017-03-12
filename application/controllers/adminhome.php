<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminhome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('loggedin'))
		{
			if($this->session->userdata('usertype') == 'user')
			{
				redirect('http://localhost:8082/ci226Bus/userhome', 'refresh');
			}
		}
		else
		{
			redirect('http://localhost:8082/ci226Bus/', 'refresh');
		}
		$this->load->model("adminmodel");
	}

	public function index()
	{
		$data['coachNumber'] =  $this->adminmodel->getCoaches();
		$this->parser->parse("view_adminhome",$data);		
	}

	public function coaches()
	{
		if($this->input->post('addcoach'))
		{
			$id = $this->input->post("id");
			$type = $this->input->post("type");
			$fare = $this->input->post("fare");
			$totalseat = $this->input->post("totalseat");
			$departuretime = $this->input->post("departuretime");
			$arrivaltime = $this->input->post("arrivaltime");
			$routeid = $this->input->post("route");

			$this->adminmodel->addCoach($id,$type,$fare,$totalseat,$departuretime,$arrivaltime,$routeid);

			$data['coachNumber'] =  $this->adminmodel->getCoaches();
			$data['roads'] =  $this->adminmodel->getRoads();
			$this->parser->parse("view_coaches",$data);

		}
		else
		{
			$data['coachNumber'] =  $this->adminmodel->getCoaches();
			$data['roads'] =  $this->adminmodel->getRoads();
			$this->parser->parse("view_coaches",$data);
		}
	}

	public function coachdetails($id=0)
	{
		$data['coach'] = $this->adminmodel->getCoach($id);
		$this->parser->parse("view_coachdetails",$data);
	}

	public function editcoach($id=0)
	{
		if($this->input->post('editcoach'))
		{
			$pid = $id;
			$id = $this->input->post("id");
			$type = $this->input->post("type");
			$fare = $this->input->post("fare");
			$totalseat = $this->input->post("totalseat");
			$departuretime = $this->input->post("departuretime");
			$arrivaltime = $this->input->post("arrivaltime");
			$routeid = $this->input->post("route");

			$this->adminmodel->editCoach($pid,$id,$type,$fare,$totalseat,$departuretime,$arrivaltime,$routeid);

			redirect("http://localhost:8082/ci226Bus/adminhome/coachdetails/$id", 'refresh');
		}
		else
		{
			$data['roads'] =  $this->adminmodel->getRoads();
			$data['coach'] = $this->adminmodel->getCoach($id);
			$this->parser->parse("view_editcoach",$data);
		}
	}

	public function deletecoach($id=0)
	{
		if($this->input->post('deletecoach'))
		{
			$this->adminmodel->deleteCoach($id);

			redirect("http://localhost:8082/ci226Bus/adminhome/coaches", 'refresh');
		}
		else
		{
			$data['coach'] = $this->adminmodel->getCoach($id);
			$this->parser->parse("view_deletecoach",$data);
		}
	}

}

/* End of file adminhome.php */
/* Location: ./application/controllers/adminhome.php */