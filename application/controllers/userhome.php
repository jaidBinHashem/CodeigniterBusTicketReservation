<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userhome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('loggedin'))
		{
			if($this->session->userdata('usertype') == 'admin')
			{
				redirect('http://localhost:8082/ci226Bus/adminhome', 'refresh');
			}
		}
		else
		{
			redirect('http://localhost:8082/ci226Bus/', 'refresh');
		}
		$this->load->model("usermodel");
	}



	public function index()
	{
		if($this->input->post("search"))
		{

			if($this->form_validation->run('search') == false)
			{
				$data['message'] = validation_errors();
				$this->load->view("view_userhome",$data);
				return;
			}

			$from = $this->input->post('from');
			$to = $this->input->post('to');
			$date = $this->input->post('date');
			$this->session->set_userdata('date', $date);

			$data['coaches'] = $this->usermodel->getCoaches($from,$to);


			$this->parser->parse("view_availablecoaches",$data);

		}
		else
		{
			$data['message'] = '';
			$this->load->view("view_userhome",$data);
		}
	}

	public function my_remove_array_item( $array, $item ) {
		$index = array_search($item, $array);
		if ( $index !== false ) {
			unset( $array[$index] );
		}
		return $array;
	}

	public function myreserves()
	{
		$userid = $this->session->userdata('userid');
		$reserves= $this->usermodel->getUserReserves($userid);
		$data['reserves'] = $reserves;
		$this->parser->parse("view_myreserves",$data);
	}

	public function cancel($id=0)
	{
		if($this->input->post('cancel'))
		{
			$reserve = $this->usermodel->getReserveById($id);
			if($reserve[0]['userid'] == $this->session->userdata('userid'))
			{
				$this->usermodel->cancelReserveById($id);
				redirect("http://localhost:8082/ci226Bus/userhome/myreserves", 'refresh');
			}
			else
			{
				redirect("http://localhost:8082/ci226Bus/userhome/myreserves", 'refresh');
			}
		}
		else
		{
			$reserve = $this->usermodel->getReserveById($id);
			if($reserve[0]['userid'] == $this->session->userdata('userid'))
			{
				$data['reserve'] = $reserve;
				$this->parser->parse("view_cancelreserve",$data);
			}
			else
			{
				redirect("http://localhost:8082/ci226Bus/userhome/myreserves", 'refresh');
			}
		}
	}

	public function reserveseat($id)
	{
		if($this->input->post("reserve"))
		{
			$selectedSeats = $this->input->post("selectedseates");
			$date=$this->session->userdata('date');
			$coach = $this->usermodel->getCoach($id);
			$coachid = $coach[0]['id'];
			$userid = $this->session->userdata('userid');

			for($i = 0; $i<count($selectedSeats); $i++)
			{
				$this->usermodel->reserveseat($userid,$coachid,$date,$selectedSeats[$i]);
			}
			redirect("http://localhost:8082/ci226Bus/userhome/myreserves", 'refresh');
		}
		else
		{
			$date=$this->session->userdata('date');
			$reservedSeats = $this->usermodel->getReservedSeates($id,$date);
			$reserve = array();
			foreach ($reservedSeats as $reserved) 
			{
				array_push($reserve, $reserved['seat']);
			}

			$data['coach'] = $this->usermodel->getCoach($id);
			$totalseat = $data['coach'][0]['totalseat'];
			$availableSeats = array();

			if($totalseat==28)
			{
				$seatsAc = array('A1','A2','A3','B1','B2','B3','C1','C2','C3','D1','D2','D3','E1','E2','E3','F1','F2','F3','G1','G2','G3','H1','H2','H3','I1','I2','I3','I4');
				if(count($reserve)>0)
				{
					for($i=0; $i<count($reserve); $i++)
					{
						$seatsAc = $this->my_remove_array_item( $seatsAc, $reserve[$i] );
					}
					array_shift($seatsAc);
				}
				$data['coach'] = $this->usermodel->getCoach($id);
				$data['seats'] = $seatsAc;
				$this->load->view("view_reserveseat",$data);

			}
			elseif ($totalseat==36) 
			{
				$seatsNonAc = array('A1','A2','A3','A4','B1','B2','B3','B4','C1','C2','C3','C4','D1','D2','D3','D4','E1','E2','E3','E4','F1','F2','F3','F4','G1','G2','G3','G4','H1','H2','H3','H4','I1','I2','I3','I4');
				if(!count($reserve)<1)
				{
					for($i=0; $i<count($reserve); $i++)
					{
						$seatsNonAc = $this->my_remove_array_item( $seatsNonAc, $reserve[$i] );
					}
					array_shift($seatsNonAc);
				}
				$data['coach'] = $this->usermodel->getCoach($id);
				$data['seats'] = $seatsNonAc;
				$this->load->view("view_reserveseat",$data);
			}
		}
	}


	public function getOrigin()
	{
		$keyword = $this->input->get('term');
		$this->load->model('searchmodel');
		$result = $this->searchmodel->getOrigin($keyword);
		echo json_encode($result);
	}

	public function getDestination()
	{
		$keyword = $this->input->get('term');
		$this->load->model('searchmodel');
		$result = $this->searchmodel->getDestination($keyword);
		echo json_encode($result);
	}

	public function validateDate($date)
	{
		$pattern = '/^\d\d\d\d-\d\d-\d\d$/';
		if(preg_match($pattern, $date))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('date', 'Invalid date');
			return false;
		}
	}

}

/* End of file userhome.php */
/* Location: ./application/controllers/userhome.php */