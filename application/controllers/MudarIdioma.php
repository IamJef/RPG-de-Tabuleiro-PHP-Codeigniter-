<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MudarIdioma extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('layout/header_without_login');
		
		$this->lang->load('login', 'english');
		//O texto
		$idioma = array(
			'select' => $this->lang->line('txt_selecione_o_idioma')
		);
		
		$this->load->view('Select_lang', $idioma);
		
		$this->load->view('layout/footer_without_login');
	}

	public function alterandoIdioma($idioma)
	{
		//Idioma disponiveis
		$idiomas = array("portugues", "espanol", "english");
		if(in_array($idioma, $idiomas)){
			$this->session->set_userdata('idioma', $idioma);
			redirect('/login');
		}else{
			return false;
		}
	}
}
