<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_user','m_content'),'',TRUE);
	$this->load->library(array('session'));	
}
	public function index()
	{
		$data['title'] = 'Konten - Jelajahputri';
		$data['active_menu'] = '4';
		$data['content'] = $this->m_content->get_data();
		$this->load->view('cms/content',$data);
	}
}
