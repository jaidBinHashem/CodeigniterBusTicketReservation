<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmodel extends CI_Model {

		public function getCoaches()
		{
			$sql = "SELECT * FROM `coachnumber` JOIN route ON coachnumber.routeid=route.routeid";
			$result = $this->db->query($sql);
			return $result->result_array();
		}

		public function getCoach($id)
		{
			$sql = "SELECT * FROM `coachnumber` JOIN route ON coachnumber.routeid=route.routeid where `id`='$id'";
			$result = $this->db->query($sql);
			return $result->result_array();
		}

		public function getRoads()
		{
			$sql = "SELECT * FROM `route`";
			$result = $this->db->query($sql);
			return $result->result_array();
		}

		public function addCoach($id,$type,$fare,$totalseat,$departuretime,$arrivaltime,$routeid)
		{
			$sql = "INSERT INTO `coachnumber` (`id`, `type`, `fare`, `totalseat`, `departuretime`, `arrivaltime`, `routeid`) VALUES ('$id', '$type', '$fare', '$totalseat', '$departuretime', '$arrivaltime', '$routeid');";
			$this->db->query($sql);
		}

		public function editCoach($pid,$id,$type,$fare,$totalseat,$departuretime,$arrivaltime,$routeid)
		{
			$sql = "UPDATE `coachnumber` SET `id` = '$id', `type` = '$type' , `fare` = '$fare' , `totalseat` = '$totalseat' , `departuretime` = '$departuretime' , `arrivaltime` = '$arrivaltime' , `routeid` = '$routeid' WHERE `coachnumber`.`id` = '$pid'";
			$this->db->query($sql);
		}

		public function deleteCoach($id)
		{
			$sql = "DELETE FROM `coachnumber` WHERE `coachnumber`.`id` = '$id'";
			$this->db->query($sql);
		}
}

/* End of file adminmodel.php */
/* Location: ./application/models/adminmodel.php */