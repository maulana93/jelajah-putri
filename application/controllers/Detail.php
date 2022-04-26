<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->library(array('encrypt'),'',TRUE);		
	$this->load->model(array('m_content','m_kanal'),'',TRUE);	
	$this->load->helper(array('text_helper'),'',TRUE);		
}
	public function index($id='')
	{
		$data['title'] = 'Jelajah Putri - Detail';
		$data['menu_active'] = '';
		
		$data['detail'] = $this->m_content->listdata(array('id'=>$id));
		$id_category = $data['detail'][0]['id_category'];
		$data['listsContent'] = $this->m_kanal->listContent(array('id_category'=>$id_category));
		$this->load->view('detail',$data);
	}
}
