<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_user'),'',TRUE);	
}
	public function index()
	{
		$data['title'] = 'Slider Jelajahputri';
		$data['alert'] = '';
		$data['active_menu'] = '2';
		$this->load->view('cms/v_slider',$data);
	}
}
