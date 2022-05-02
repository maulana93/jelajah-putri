<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kanal extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_kanal','m_banner'),'',TRUE);
	$this->load->helper(array('text_helper'),'',TRUE);		
}
	public function index($slug = "")
	{
		$data['menu_active'] = $slug;
		$data['listsKanal'] = $this->m_kanal->listdata(array('slug'=>$slug));

		$id_category = isset($data['listsKanal'][0]['id'])?$data['listsKanal'][0]['id']:'';
		$title_category = isset($data['listsKanal'][0]['title'])?$data['listsKanal'][0]['title']:'';
		$data['listsContent'] = $this->m_kanal->listContent(array('id_category'=>$id_category,'limit'=>13));

		$data['title'] = 'Jelajah Putri - '.$title_category;
		$data['banner'] = $this->m_banner->listData();
		$this->load->view('kanal',$data);
	}
	function getAllDataNext(){
		$last_id = $this->input->post('last_id');
		$id_category = $this->input->post('id_category');

		$data['listsContent'] = $this->m_kanal->listContent(array('id_category'=>$id_category,'last_id'=>$last_id,'limit'=>10));
		$this->load->view('kanalnext',$data);
	}
}
