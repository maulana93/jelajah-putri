<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_search'),'',TRUE);
	$this->load->library(array('form_validation'));	
}
	public function index()
	{	
		if(isset($_GET['q']))	{
			$keyword = $_GET['q'];
			$data['listsSearch'] = $this->m_search->listdata(array('keyword'=>$keyword));
			// echo "<pre>";var_dump($data['listsSearch']);exit();
			$data['keyword'] = $keyword;
			$this->load->view('search',$data);
		} else {
			$this->load->view('search');
		}
	}
}
