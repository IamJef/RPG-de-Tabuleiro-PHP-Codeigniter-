<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->view('layout/header_without_login');
		
		if(!$this->session->userdata('idioma')){
			$this->lang->load('login', 'english');
			//O texto
			$idioma = array(
				'select' => $this->lang->line('txt_selecione_o_idioma')
			);
			
			$this->load->view('Select_lang', $idioma);
		}else{
			$this->lang->load('login', $this->session->userdata('idioma'));
			$textos = array(
				'email' 	=> $this->lang->line('txt_email'),
				'senha' 	=> $this->lang->line('txt_senha'),
				'lembrar' 	=> $this->lang->line('txt_lembrar'),
				'entrar' 	=> $this->lang->line('txt_entrar'),
				'ou' 		=> $this->lang->line('txt_ou'),
				'registre' 	=> $this->lang->line('txt_registrar')
			);
			$this->load->view('login', $textos);
		}
		$this->load->view('layout/footer_without_login');
	}
	public function autenticar()
	{
		$email = $this->input->post("email");
        $senha = $this->input->post("password");
        $senha = md5($senha);

		//Recebendo os dados a partir da model
		$usuario = $this->usuarios_model->autenticarUsuario($email,$senha);

		if($usuario){
		//Caso retorne algum usuario
		$sessions = array(
			'conta_id'	=> $usuario["id"]
		);
		//Criando as sessoes
		$this->session->set_userdata($sessions);

		redirect('/my-characters');

		}else{
		//Caso não
			$this->lang->load('login', $this->session->userdata('idioma'));
			$textos = array(
				'email' 	=> $this->lang->line('txt_email'),
				'senha' 	=> $this->lang->line('txt_senha'),
				'lembrar' 	=> $this->lang->line('txt_lembrar'),
				'entrar' 	=> $this->lang->line('txt_entrar'),
				'ou' 		=> $this->lang->line('txt_ou'),
				'registre' 	=> $this->lang->line('txt_registrar'),
				'erro'		=> $this->lang->line('txt_erro_login')
			);
			$this->load->view('layout/header_without_login');
			$this->load->view('login', $textos);
			$this->load->view('layout/footer_without_login');
		}
	}
}
