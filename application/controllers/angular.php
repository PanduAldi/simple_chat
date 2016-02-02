<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angular extends CI_Controller {

	public function index()
	{
		//show  belajar angular
		$this->load->view('angular');		
	}

	public function angularjs()
	{
		$this->load->view('angularjs');
	}

}

/* End of file angular.php */
/* Location: ./application/controllers/angular.php */