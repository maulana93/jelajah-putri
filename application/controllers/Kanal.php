<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kanal extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_kanal'),'',TRUE);		
}
	public function index($slug = "")
	{
		$data['menu_active'] = $slug;
		$data['listsKanal'] = $this->m_kanal->listdata(array('slug'=>$slug));

		$id_category = $data['listsKanal'][0]['id'];
		$data['listsContent'] = $this->m_kanal->listContent(array('id_category'=>$id_category));
		$data['title'] = 'Jelajah Putri - '.$data['listsKanal'][0]['title'];
		// echo "<pre>";var_dump($data['listsKanal']);exit();
		$this->load->view('kanal',$data);
	}
}
