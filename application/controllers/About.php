<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_banner'),'',TRUE);	
}
	public function index()
	{
		$data['title'] = 'Jelajah Putri - About';
		$data['menu_active'] = 'about';
		$data['banner'] = $this->m_banner->listData();
		$this->load->view('about',$data);
	}
}
