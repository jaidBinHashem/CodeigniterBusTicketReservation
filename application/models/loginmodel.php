<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginmodel extends CI_Model {

	public function verifyUser($username, $password)
	{
		$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

		//$result = mysqli_query($sql);
		$result = $this->db->query($sql);

		//$row = mysqli_fetch_array($result);
		$row = $result->row_array();
		return $row;
	}
}