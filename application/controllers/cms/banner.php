<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_cover extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_user','m_cover'),'',TRUE);
	$this->load->library(array('session'));	
}
	public function index()
	{
		$data['title'] = 'Header Cover Jelajahputri';
		$data['active_menu'] = '2';
		$data['cover'] = $this->m_cover->get_data();
		$this->load->view('cms/header_cover',$data);
	}
}
