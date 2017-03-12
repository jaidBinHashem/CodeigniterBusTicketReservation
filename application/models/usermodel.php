<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model {


	public function getCoach($id)
	{
		$sql = "SELECT * FROM `coachnumber` JOIN route ON coachnumber.routeid=route.routeid where `id`='$id'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function getCoaches($from,$to)
	{
		$sql = "SELECT * FROM `coachnumber` JOIN route ON coachnumber.routeid=route.routeid where route.origin=? and route.destination=?";
		$result = $this->db->query($sql,array($from,$to));
		return $result->result_array();
	}

	public function getReservedSeates($coachid,$date)
	{
		$sql="SELECT seat FROM `reserve` WHERE coachid='$coachid' AND date='$date'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function reserveseat($userid,$coachid,$date,$selectedSeat)
	{
		$sql = "INSERT INTO `reserve` (`id`, `userid`, `coachid`, `date`, `seat`) VALUES (NULL, '$userid', '$coachid', '$date', '$selectedSeat')";
		$this->db->query($sql);
	}

	public function getUserReserves($userid)
	{
		$sql="SELECT reserve.id,user.username,reserve.coachid,reserve.date,reserve.seat,coachnumber.type,coachnumber.fare,coachnumber.departuretime,coachnumber.arrivaltime,route.origin,route.destination FROM reserve JOIN user ON reserve.userid=user.id JOIN coachnumber ON reserve.coachid=coachnumber.id  JOIN route ON coachnumber.routeid=route.routeid WHERE userid='$userid' order by id";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getReserveById($id)
	{
		$sql="SELECT * FROM `reserve` WHERE id='$id'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function cancelReserveById($id)
	{
		$sql = "DELETE FROM `reserve` WHERE `reserve`.`id` = '$id'";
		$this->db->query($sql);
	}

}

/* End of file usermodel.php */
/* Location: ./application/models/usermodel.php */