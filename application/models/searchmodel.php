<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searchmodel extends CI_Model {

	public function searchOrigin($keyword)
	{
		$this->db->like('origin', $keyword);
		$result = $this->db->get('route');
		return $result->result_array();
	}

	public function getDestination($keyword)
	{
		$this->db->like('destination', $keyword);
		$result = $this->db->get('route');
		$destinations = $result->result_array();
		$destination = array();
		foreach ($destinations as $dest) 
		{
			if (!in_array($dest['destination'], $destination))
			{
				array_push($destination, $dest['destination']);
			}
		}
		return $destination;
	}

	public function getOrigin($keyword)
	{
		$this->db->like('origin', $keyword);
		$result = $this->db->get('route');
		$origins = $result->result_array();
		$origin = array();
		foreach ($origins as $org)
		{
			if (!in_array($org['origin'], $origin))
			{
				array_push($origin, $org['origin']);
			}
		}
		return $origin;
	}

}

/* End of file searchmodel.php */
/* Location: ./application/models/searchmodel.php */