<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	// $this->load->model(array('m_customer','m_laboratorium'),'',TRUE);	
}
	public function index($slug = "")
	{
		
		$data['title'] = 'Jelajah Putri - Search';
		$data['menu_active'] = '';

		$this->load->view('search',$data);
	}
}
