<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kanal extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	// $this->load->model(array('m_customer','m_laboratorium'),'',TRUE);	
}
	public function index($slug = "")
	{
		if (isset($slug) && $slug == "bekerja"){
			$data['title'] = 'Jelajah Putri - Bekerja';
			$data['title_kanal'] = 'BEKERJA';
			$data['description_kanal'] = 'Inspirasi, panduan, tips bagi para perempuan yang meniti karier.';
			$data['menu_active'] = 'bekerja';
		} elseif (isset($slug) && $slug == "bertualang"){
			$data['title'] = 'Jelajah Putri - Bertualang';
			$data['title_kanal'] = 'BERTUALANG';
			$data['description_kanal'] = 'Perjalanan, petualangan, dan cerita-cerita di antaranya.';
			$data['menu_active'] = 'bertualang';
		} elseif (isset($slug) && $slug == "berbakti"){
			$data['title'] = 'Jelajah Putri - Berbakti';
			$data['title_kanal'] = 'BERBAKTI';
			$data['description_kanal'] = 'Kisah-kisah inspiratif para perempuan yang berbakti lewat gerakan sosial';
			$data['menu_active'] = 'berbakti';
		} elseif (isset($slug) && $slug == "opini"){
			$data['title'] = 'Jelajah Putri - Berbakti';
			$data['title_kanal'] = 'OPINI';
			$data['description_kanal'] = 'Suara dan aspirasi dari para perempuan';
			$data['menu_active'] = 'opini';
		}
		$data['slug'] = $slug;
		$this->load->view('kanal',$data);
	}
}
