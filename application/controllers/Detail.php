<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_content'),'',TRUE);	
}
	public function index($id='')
	{
		$data['title'] = 'Jelajah Putri - Detail';
		$data['menu_active'] = '';
		
		$data['detail'] = $this->m_content->listdata(array('id'=>$id));
		$this->load->view('detail',$data);
	}
}
