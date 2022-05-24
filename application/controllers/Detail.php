<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->library(array('encryption'),'',TRUE);		
	$this->load->model(array('m_content','m_kanal','m_banner'),'',TRUE);	
	$this->load->helper(array('text_helper'),'',TRUE);		
}
	public function index($id,$slug)
	{
		$data['title'] = 'Jelajah Putri - '.$slug;
		$data['menu_active'] = '';
		
		$data['detail'] = $this->m_content->listdata(array('id'=>$id));
		$id_category = $data['detail'][0]['id_category'];
		$data['listsContent'] = $this->m_kanal->listContent(array('id_exclude'=>$id, 'id_category'=>$id_category, 'limit'=>5));
		$data['banner'] = $this->m_banner->listData();
		$data['meta_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$this->load->view('detail',$data);
	}
}
