<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	// $this->load->model(array('m_customer','m_laboratorium'),'',TRUE);	
}
	public function index()
	{
		$data['title'] = 'Jelajah Putri - Hubungi Kami';
		$data['menu_active'] = 'kontak';
		$this->load->view('kontak',$data);
	}
}
