<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	// $this->load->model(array('m_customer','m_laboratorium'),'',TRUE);	
}
	public function index()
	{
		$data['title'] = 'Jelajah Putri';
		$this->load->view('index',$data);
	}
}
