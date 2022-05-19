<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('cms/m_user','cms/m_content'),'',TRUE);
	$this->load->library(array('session'));	
	$this->load->helper(array('text_helper'),'',TRUE);		

	if(!$this->session->userdata('SESSION_ID')){
		redirect(base_url().'login');
	}
}
	public function index()
	{
		$data['title'] = 'Dashboard Jelajahputri';
		$data['alert'] = '';
		$data['active_menu'] = '1';
		$data['listsMyArticle'] = $this->m_content->listdata(array('id_user'=>$this->session->userdata('SESSION_ID'),'limit'=>10));
		$data['listsNewArticle'] = $this->m_content->listdata(array('limit'=>10));
		$data['listsHeadline'] = $this->m_content->listdata(array('headline'=>1,'limit'=>10));
		$this->load->view('cms/dashboard',$data);
	}
}
