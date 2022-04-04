<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kanal extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	// $this->load->model(array('m_customer','m_laboratorium'),'',TRUE);	
}
	public function index()
	{
		$data['title'] = 'Jelajah Putri - Kanal';
		$data['menu_active'] = '';
		$this->load->view('kanal',$data);
	}
}
