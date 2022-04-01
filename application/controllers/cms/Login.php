<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_user'),'',TRUE);	
}
	public function index()
	{
		$data['title'] = 'CMS Jelajahputri';
		$data['alert'] = '';
		$this->load->view('cms/login',$data);
	}
}
