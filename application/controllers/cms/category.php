<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_user','m_category'),'',TRUE);
	$this->load->library(array('session'));	
}
	public function index()
	{
		$data['title'] = 'Kategori - Jelajahputri';
		$data['active_menu'] = '3';
		$data['category'] = $this->m_category->get_data();
		$this->load->view('cms/category',$data);
	}
}
