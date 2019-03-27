<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("usuarios_model");

		if($this->session->userdata('conta_id') != null)
		{
			redirect('/my-characters');
		}
	}
	public function index()
	{	
		$this->load->view('teste');
	}
}