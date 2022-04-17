<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_home'),'',TRUE);	
}
	public function index()
	{
		$data['title'] = 'Jelajah Putri';
		$data['menu_active'] = 'home';
		$data['cover'] = $this->m_home->listdata(array('status'=>1,'limit'=>1));
		$data['cover_article'] = $this->m_home->getArticleCover();
		$data['category'] = $this->m_home->listCategory();
		// echo "<pre>";var_dump($data['category']);exit();
		$this->load->view('index',$data);
	}
}
