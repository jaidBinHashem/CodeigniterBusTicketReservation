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

		public function getReserves()
		{
			$sql = "SELECT reserve.coachid, reserve.date, reserve.seat,coachnumber.type,coachnumber.fare, coachnumber.departuretime,coachnumber.arrivaltime,route.origin,route.destination, user.name FROM reserve JOIN coachnumber ON reserve.coachid=coachnumber.id JOIN route ON coachnumber.routeid=route.routeid JOIN user on reserve.userid=user.id ORDER BY reserve.id";
			$result = $this->db->query($sql);
			return $result->result_array();
		}

		public function addRoute($origin,$destination)
		{
			$sql = "INSERT into route (origin,destination) VALUES (?, ?)";
			$this->db->query($sql, array($origin,$destination));
		}

		public function getCoachReport()
		{
			$sql = "SELECT coachid,COUNT(*) as count FROM reserve GROUP BY coachid ORDER BY count DESC";
			$result = $this->db->query($sql);
			return $result->result_array();
		}

		public function getreservetypereports()
		{
			$sql = "SELECT coachnumber.type,COUNT(*) as counts FROM reserve JOIN coachnumber ON reserve.coachid=coachnumber.id GROUP BY coachnumber.type ORDER BY counts DESC";
			$result = $this->db->query($sql);
			return $result->result_array();
		}
}

/* End of file adminmodel.php */
/* Location: ./application/models/adminmodel.php */