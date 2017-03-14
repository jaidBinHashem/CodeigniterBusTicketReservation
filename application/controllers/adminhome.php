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

			if($this->form_validation->run('coaches') == false)
			{
				$data['message'] = validation_errors();
				$data['coachNumber'] =  $this->adminmodel->getCoaches();
				$data['roads'] =  $this->adminmodel->getRoads();
				$this->parser->parse("view_coaches",$data);
				return;
			}

			$id = $this->input->post("id");
			$type = $this->input->post("type");
			$fare = $this->input->post("fare");
			$totalseat = $this->input->post("totalseat");
			$departuretime = $this->input->post("departuretime");
			$arrivaltime = $this->input->post("arrivaltime");
			$routeid = $this->input->post("route");

			$this->adminmodel->addCoach($id,$type,$fare,$totalseat,$departuretime,$arrivaltime,$routeid);

			$data['coachNumber'] =  $this->adminmodel->getCoaches();
			$data['message'] = '';
			$data['roads'] =  $this->adminmodel->getRoads();
			$this->parser->parse("view_coaches",$data);

		}
		else
		{
			$data['message'] = '';
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

			if($this->form_validation->run('editcoach') == false)
			{
				$data['message'] = validation_errors();
				$data['roads'] =  $this->adminmodel->getRoads();
				$data['coach'] = $this->adminmodel->getCoach($id);
				$this->parser->parse("view_editcoach",$data);
				return;
			}


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
			$data['message'] = '';
			$data['roads'] =  $this->adminmodel->getRoads();
			$data['coach'] = $this->adminmodel->getCoach($id);
			$this->parser->parse("view_editcoach",$data);
		}
	}

	public function routes()
	{
		if($this->input->post('addroute'))
		{
			if($this->form_validation->run('routes') == false)
			{
				$data['message'] = validation_errors();
				$data['routes']=  $this->adminmodel->getRoads();
				$this->parser->parse("view_routes",$data);
				return;
			}
			$origin = $this->input->post("origin");
			$destination = $this->input->post("destination");
			$this->adminmodel->addRoute($origin,$destination);
			$data['message'] = '';
			$data['routes'] =  $this->adminmodel->getRoads();
			$this->parser->parse("view_routes",$data);
		}
		else
		{
			$data['message'] = '';
			$data['routes']=  $this->adminmodel->getRoads();
			$this->parser->parse("view_routes",$data);
		}
	}

	public function reservations()
	{
		$reserves= $this->adminmodel->getReserves();
		$data['reserves'] = $reserves;
		$this->parser->parse("view_reservetions",$data);
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

	public function coachreports()
	{
		$data['report'] = $this->adminmodel->getCoachReport();
		$this->parser->parse("view_coachreport",$data);
	}

	public function reservetypereports()
	{
		$data['report'] = $this->adminmodel->getreservetypereports();
		$this->parser->parse("view_reservetypereport",$data);
	}
	
	public function validDepartureTime($departureTime)
	{
		$pattern = '/^\d\d:\d\d:\d\d$/';
		if(preg_match($pattern, $departureTime))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('departuretime', 'Invalid Departure Time');
			return false;
		}
	}
	
	public function validArrivalTime($arrivaltime)
	{
		$pattern = '/^\d\d:\d\d:\d\d$/';
		if(preg_match($pattern, $arrivaltime))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('arrivaltime', 'Invalid arrival time');
			return false;
		}
	}

}

/* End of file adminhome.php */
/* Location: ./application/controllers/adminhome.php */