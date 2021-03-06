<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_search','m_banner'),'',TRUE);
	$this->load->library(array('form_validation'));	
	$this->load->helper(array('text_helper'),'',TRUE);	
}
	public function index()
	{	
		$data['title'] = 'Search';

		$data['banner'] = $this->m_banner->listData();
		if(isset($_GET['q'])){
			$keyword = $_GET['q'];
			$data['lists'] = $this->m_search->listdata(array('keyword'=>$keyword));
			$data['listsSearch'] = $this->m_search->listdata(array('keyword'=>$keyword,'limit'=>10));
			// echo "<pre>";var_dump($data['listsSearch']);exit();
			$data['keyword'] = $keyword;
			$this->load->view('search',$data);
		} else {
			$this->load->view('search',$data);
		}
	}
	function getAllDataNext(){
		$data['title'] = 'Search';

		$last_id = $this->input->post('last_id');
		$keyword = $this->input->post('keyword');

		$data['listsSearch'] = $this->m_search->listContent(array('keyword'=>$keyword,'last_id'=>$last_id,'limit'=>10));
		
		$data['keyword'] = $keyword;
		$this->load->view('searchnext',$data);
	}
}
