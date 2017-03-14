<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config = array(
	'coaches' => array(
		array(
			'field' => 'id',
			'label' => 'Coach Number',
			'rules' => 'required|callback_validCoachNo|is_unique[coachnumber.id]'
			),
		array(
			'field' => 'fare',
			'label' => 'Fare',
			'rules' => 'required'
			),
		array(
			'field' => 'totalseat',
			'label' => 'Total seat number',
			'rules' => 'required'
			),
		array(
			'field' => 'departuretime',
			'label' => 'Departure time',
			'rules' => 'required|callback_validDepartureTime',
			),
		array(
			'field' => 'arrivaltime',
			'label' => 'Arrival time',
			'rules' => 'required|callback_validArrivalTime'
			),
		),
	'editcoach' => array(
		array(
			'field' => 'id',
			'label' => 'Coach Number',
			'rules' => 'required|callback_validCoachNo'
			),
		array(
			'field' => 'fare',
			'label' => 'Fare',
			'rules' => 'required'
			),
		array(
			'field' => 'totalseat',
			'label' => 'Total seat number',
			'rules' => 'required'
			),
		array(
			'field' => 'departuretime',
			'label' => 'Departure time',
			'rules' => 'required|callback_validDepartureTime',
			),
		array(
			'field' => 'arrivaltime',
			'label' => 'Arrival time',
			'rules' => 'required'
			),
		),
	'routes' => array(
		array(
			'field' => 'origin',
			'label' => 'Origin',
			'rules' => 'required'
			),
		array(
			'field' => 'destination',
			'label' => 'Destination',
			'rules' => 'required',
			),
		),
	'search' => array(
		array(
			'field' => 'from',
			'label' => 'From',
			'rules' => 'required'
			),
		array(
			'field' => 'to',
			'label' => 'To',
			'rules' => 'required',
			),
		array(
			'field' => 'date',
			'label' => 'Date',
			'rules' => 'required|callback_validateDate',
			),
		),
	'register' => array(
		array(
			'field' => 'username',
			'label' => 'username',
			'rules' => 'required|is_unique[user.username]'
			),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required',
			),
		array(
			'field' => 'repassword',
			'label' => 'Repeat Password',
			'rules' => 'required|matches[password]',
			),
		array(
			'field' => 'fullname',
			'label' => 'Full Name',
			'rules' => 'required',
			),
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email',
			),
		array(
			'field' => 'mobile',
			'label' => 'Mobile No.',
			'rules' => 'required',
			),
		),
	);