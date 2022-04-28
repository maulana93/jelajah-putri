<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('cms/m_user'),'',TRUE);
	$this->load->library(array('session'));	

	if(!$this->session->userdata('SESSION_ID')){
		redirect(base_url().'login');
	}
}
	public function index()
	{
		$data['title'] = 'Dashboard Jelajahputri';
		$data['alert'] = '';
		$data['active_menu'] = '1';
		$this->load->view('cms/dashboard',$data);
	}
}
