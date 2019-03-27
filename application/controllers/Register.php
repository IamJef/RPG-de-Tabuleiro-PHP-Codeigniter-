<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("Registro_model");

		//Verificando o dioma
        if($this->utilitarios_model->isIdioma() == false)
        {
        	redirect('/change-languages');
        }
		//Fundo de erro do bootstrap
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

        //Idioma dos erros
        $this->config->set_item('language', $this->session->userdata('idioma')); 
		
		//Idioma
		$this->lang->load('registro', $this->session->userdata('idioma'));

	}

	public function index()
	{
		//Header
		$this->load->view('layout/header_without_login');

		//Carregando os textos a partir do idioma
		
		$textos = array(
			'email' 	=> $this->lang->line('txt_email'),
			'senha' 	=> $this->lang->line('txt_senha'),
			'resenha' 	=> $this->lang->line('txt_resenha'),
			'registrar' => $this->lang->line('txt_registrar'),
			'cancelar' 	=> $this->lang->line('txt_cancelar')
		);
		//Passa os textos para a pagina
		$this->load->view('register', $textos);
		
		//Footer
		$this->load->view('layout/footer_without_login');
	}
	public function emailEmUso($email)
	{

	}
	public function registrar()
	{

        //Tratando o formulario de registro
        $this->form_validation->set_rules(
        	'email',
        	'lang:txt_email',
        	'required|is_unique[contas.email]'
        );
        $this->form_validation->set_rules(
        	'password',
        	'lang:txt_senha',
        	'required|min_length[4]|max_length[12]'
        );
        $this->form_validation->set_rules(
        	'resenha',
        	'lang:conf_senha',
        	'min_length[4]|max_length[12]|matches[password]'
        );

        //Verificando
        if ($this->form_validation->run() == FALSE)
        {
        	$this->lang->load('registro', $this->session->userdata('idioma'));
        	$textos = array(
				'email' 	=> $this->lang->line('txt_email'),
				'senha' 	=> $this->lang->line('txt_senha'),
				'resenha' 	=> $this->lang->line('txt_resenha'),
				'registrar' => $this->lang->line('txt_registrar'),
				'cancelar' 	=> $this->lang->line('txt_cancelar')
			);
        	$this->load->view('layout/header_without_login');
        	$this->load->view('register', $textos);
        	$this->load->view('layout/footer_without_login');
        }
        else
        {
        	$email = $this->input->post("email");
        	$senha = $this->input->post("password");

        	//textos
        	$textos = array(
        		'fazerLogin'	=> $this->lang->line('txt_fazer_login'),
        		'SucessoReg'	=> $this->lang->line('txt_sucesso')
        	);
        	$senha = md5($senha);
        	//Inserindo conta no banco de dados
        	$data = array(
				'email' => $email,
				'senha'  => $senha
			);
			
			$this->Registro_model->Registrando($data);

			$this->load->view('layout/header_without_login');
        	$this->load->view('register_sucess', $textos);
        	$this->load->view('layout/footer_without_login');
        }
	}
	public function liberar()
	{
		$this->session->sess_destroy();
	}


}